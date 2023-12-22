<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Compra;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Detalle;
use App\Models\Product;
use Cart as CarPackage;
use App\Models\Marquesina;
use App\Models\Segmentacion;
use Illuminate\Http\Request;
use App\Mail\ConfirmacionCompra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class CartController extends Controller
{
public function shop()
{
    if (Auth::check()) {
        // return redirect()->route('login'); // Redirige a la página de inicio de sesión
    

    $cliente = Cliente::all();

    $cliente = Auth::user()->cliente;
    $segmentacion = Auth::user()->cliente->segmentacion->nameSegmentacion;
    $tipoentidad = Auth::user()->cliente->segmentacion->tipoentidad;

    // dd(c);

    $products = Product::all();

    $priceProductos = [];
    $newProductos = [];
    foreach($products as $i => $product)
    {
        $priceProductos[] = [
            'id' => $product->id,
            'Micro2' => $product->micro2,
            'Micro1' => $product->micro1,
            'Pequeñas' => $product->pequeñas,
            'Medianas' => $product->medianas,
            'Grandes' => $product->grandes,
            'Megas' => $product->megas,
            'Top' => $product->top,
        ];

        foreach( $priceProductos as $j => $priceProducto){
            if(isset($priceProducto[$segmentacion])){
                // dd($priceProducto[$segmentacion]);
                $newProductos[$i] = [
                    'id' => $product->id,
                    'price' => $priceProducto[$segmentacion],
                    'name' => $product->name,
                    'description' => $product->description,
                    'contenido' => $product->contenido,
                    'image_path' => $product->image_path,
                ];
            }
        }
    }
    // dd($newProductos);

    $Marquesina = Marquesina::all();
    $constantAssets = 2000000;
    $user = Auth::user();
    $rates = [];

    // Crea un array para rastrear si el usuario ha comprado cada producto
    $hasPurchased = [];

    // Verifica si el usuario ha iniciado sesión
    if (Auth::check()) {
        $user = Auth::user();

        foreach ($newProductos as $newProduct) {
            // Comprueba si existe una compra asociada al usuario y al producto
            $hasPurchased[$newProduct['id']] = $user->compras->contains('product_id', $newProduct['id']);
        }

    } else {
        // Si el usuario no ha iniciado sesión, establece todos los productos como no comprados
        foreach ($newProductos as $newProduct) {
            $hasPurchased[$newProduct['id']] = false;
        }
    }
    // Suponiendo que $nit es el NIT ingresado por el cliente al registrarse


    $marquesinaController = new MarquesinaController();
    $rates = $marquesinaController->index()->getData()['rates'];

    return view('shop', [
        'title' => 'E-COMMERCE STORE | SHOP',
        'products' => $products,
        'hasPurchased' => $hasPurchased,
        'Marquesina' => $Marquesina,
        'constantAssets' => $constantAssets,
        'user' => $user,
        'rates' => $rates,
        'newProductos' => $newProductos
    ]);
}
else {

    $Marquesina = Marquesina::all();
    $constantAssets = 2000000;

    $marquesinaController = new MarquesinaController();
    $rates = $marquesinaController->index()->getData()['rates'];

    // Lógica para obtener los productos (elimina la lógica de $newProductos, $hasPurchased, etc.)
    $products = Product::all();

    $priceProductos = [];
    $newProductos = [];
    foreach($products as $i => $product)
    {
        $priceProductos[] = [
            'id' => $product->id,
            'Micro2' => $product->micro2,
            'Micro1' => $product->micro1,
            'Pequeñas' => $product->pequeñas,
            'Medianas' => $product->medianas,
            'Grandes' => $product->grandes,
            'Megas' => $product->megas,
            'Top' => $product->top,
        ];

            if(!Auth::check()){
                // dd($priceProducto[$segmentacion]);
                $newProductos[$i] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' =>$product->price,
                    'description' => $product->description,
                    'contenido' => $product->contenido,
                    'image_path' => $product->image_path,
                ];
            }
    }
    $hasPurchased = [];

    // Verifica si el usuario ha iniciado sesión
    if (Auth::check()) {
        $user = Auth::user();

        foreach ($newProductos as $newProduct) {
            // Comprueba si existe una compra asociada al usuario y al producto
            $hasPurchased[$newProduct['id']] = $user->compras->contains('product_id', $newProduct['id']);
        }

    } else {
        // Si el usuario no ha iniciado sesión, establece todos los productos como no comprados
        foreach ($newProductos as $newProduct) {
            $hasPurchased[$newProduct['id']] = false;
        }
    }
    return view('shop', [
        'title' => 'E-COMMERCE STORE | SHOP',
        'products' => $products,
        'Marquesina' => $Marquesina,
        'constantAssets' => $constantAssets,
        'hasPurchased' => $hasPurchased,
        'rates' => $rates,
        'newProductos' => $newProductos
    ]);
}
}

    public function cart()
    {
        $cartCollection = CarPackage::getContent();
        return view('cart', ['title' => 'E-COMMERCE STORE | CART', 'cartCollection' => $cartCollection]);
    }

    public function remove(Request $request)
    {
        CarPackage::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request)
    {
        CarPackage::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $request->img
            ]
        ]);

        // No registres la compra aquí, ya que debe hacerse después de que el usuario complete el pago.

        return redirect()->route('cart.index')->with('success_msg', 'Servicio Agregado a su Carrito!');
    }


    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer', // La cantidad debe ser un número entero
        ]);

        $newQuantity = max(1, $request->quantity); // Asegura que la cantidad sea al menos 1

        CarPackage::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $newQuantity
            ]
        ]);

        return redirect()->route('cart.index')->with('success_msg', 'El carrito se ha actualizado correctamente.');
    }



    public function clear()
    {
        CarPackage::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Car is cleared!');
    }

    public function procesoPedido(Request $request)
    {
        \MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

        $products = []; // Arreglo para almacenar los productos

        foreach (CarPackage::getContent() as $item):
            $product = new \MercadoPago\Item(); // Crea un nuevo objeto para cada producto
            $product->title = $item->name;
            $product->quantity = $item->quantity;
            $product->unit_price = $item->price;
            $products[] = $product; // Agrega el producto al arreglo

            // No necesitas crear una nueva preferencia en cada iteración
        endforeach;

        $preference = new \MercadoPago\Preference();
        $preference->items = $products; // Asigna el arreglo de productos a la preferencia

        $preference->back_urls = [
            'success' => route('pedido.success'),
            'failure' => route('cart.index'),
        ];

        $preference->save();
        return redirect()->away($preference->init_point);
    }

public function success()
{
    $user_id = Auth::user()->id;
    $pedido = new Pedido();
    $pedido->codigo = uniqid();
    $pedido->total = CarPackage::getSubtotal();
    $pedido->user_id = $user_id;
    $pedido->save();

    foreach (CarPackage::getContent() as $item):
        $detalle = new Detalle();
        $detalle->cantidad = $item->quantity;
        $detalle->producto = $item->name;
        $detalle->precio = $item->price;
        $detalle->pedido_id = $pedido->id;
        $detalle->save();

        // Si el producto especial (ID 1) se encuentra en el carrito, desbloquear todos los informes
        if ($item->id == 1) {
            $user = Auth::user();
            $informes = Product::all(); // Obtén todos los informes
            foreach ($informes as $informe) {
                // Registra cada informe como comprado para el usuario actual
                Compra::create([
                    'user_id' => $user_id,
                    'product_id' => $informe->id,
                    'purchased' => true,
                ]);
            }
        } else {
            // Para otros productos, registra la compra normalmente
            Compra::create([
                'user_id' => $user_id,
                'product_id' => $item->id,
                'purchased' => true,
            ]);
        }
    endforeach;
    $userEmail = Auth::user()->email;
    Mail::to($userEmail)->send(new ConfirmacionCompra($pedido));

    CarPackage::clear();

    return view('front.confirmacion')->with(['pedido' => $pedido->codigo, 'total' => $pedido->total]);
}



    public function checkIfUserHasPurchasedProduct($productId) {
        // Verifica si el usuario ha iniciado sesión
        if (auth()->check()) {
            $user = auth()->user();
            // Aquí implementa la lógica para verificar si el usuario ha comprado el producto con el ID $productId.
            // Puedes utilizar Eloquent u otras consultas de Laravel.

            // Por ejemplo, asumiendo que los productos comprados se almacenan en la tabla "compras" con el ID del producto.
            $hasPurchased = $user->Compra()->where('product_id', $productId)->exists();

            return $hasPurchased;
        }

        return false; // Si el usuario no ha iniciado sesión, asumimos que no ha comprado el producto.
    }

    // En el controlador después de completar la compra
public function purchaseProduct($productId) {
    // Lógica para procesar la compra y guardar los detalles

    // Luego, marca el producto como comprado
    $product = Product::find($productId);
    $product->purchased = true;
    $product->save();

    // Redirige al usuario a la página de confirmación o a donde sea necesario
    return redirect()->route('confirmation');
}
public function misCompras()
{
    if (Auth::check()) {
        $user = Auth::user();
        $compras = Compra::where('user_id', $user->id)->get();
        return view('mis-compras', ['title' => 'Tus Compras', 'compras' => $compras]);
    }
}

public function mostrarInforme($id)
{
    $product = Product::find($id); // Suponiendo que tengas un modelo llamado Noticia

    return view('verinforme', compact('product'));
}

public function categorizarCliente(Request $request)
    {
        $nit = $request->input('nit');

        $cliente = Cliente::where('nitEmpresa', $nit)->first();

        if ($cliente) {
            $tipoEntidadId = $cliente->segmentacion_id;
            $activos = $cliente->activos;

            $segmentacion = Segmentacion::where('tipo_entidad_id', $tipoEntidadId)
                ->where('mayor', '>=', $activos)
                ->where(function ($query) use ($activos) {
                    $query->where('menor', '<=', $activos)
                        ->orWhere('menor', null);
                })
                ->first();

            if ($segmentacion) {
                $nameSegmentacion = $segmentacion->nameSegmentacion;
                $precio = Product::where('nameSegmentacion', $nameSegmentacion)->first()->precio;

                $nameSegmentacion = 'AlgunNombre';
                $precio = 100;

                dump($nameSegmentacion);
                dump($precio);

                return view('shop')->with([
                    'title' => 'E-COMMERCE STORE | SHOP',
                    'nameSegmentacion' => $nameSegmentacion,
                    'precio' => $precio,
                    // ... (otras variables que necesites pasar)
                ]);
            } else {
                return view('shop')->with('error', 'No se encontró una segmentación para estos activos y tipo de entidad.');
            }
        } else {
            return view('shop')->with('error', 'No se encontró un cliente con el NIT proporcionado.');
        }
    }



}
