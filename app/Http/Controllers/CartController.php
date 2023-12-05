<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Compra;
use App\Models\Pedido;
use App\Models\Detalle;
use App\Models\Product;
use Cart as CarPackage;
use App\Models\Marquesina;
use Illuminate\Http\Request;
use App\Mail\ConfirmacionCompra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class CartController extends Controller
{
    //EXIGE INICIAR SESION PARA VER LO QUE PUEDE COMPRAR
//     public function shop()
// {
//     if (Auth::check()) {
//         $user = Auth::user(); // Obtén el usuario autenticado
//         $products = Product::all();

//         // Crea un array para rastrear si el usuario ha comprado cada producto
//         $hasPurchased = [];

//         foreach ($products as $product) {
//             // Comprueba si existe una compra asociada al usuario y al producto
//             $hasPurchased[$product->id] = $user->compras->contains('product_id', $product->id);
//         }

//         return view('shop', ['title' => 'E-COMMERCE STORE | SHOP', 'products' => $products, 'hasPurchased' => $hasPurchased]);
//     } else {
//         // El usuario no está autenticado, puedes manejar esta situación de acuerdo a tus necesidades
//         // Por ejemplo, redirigir al usuario a la página de inicio de sesión.
//         return redirect()->route('login');
//     }
// }
public function shop()
{
    $products = Product::all();
    $Marquesina = Marquesina::all();
    $constantAssets = 2000000;
    $user = Auth::user();
    $rates = [];

    // Crea un array para rastrear si el usuario ha comprado cada producto
    $hasPurchased = [];

    // Verifica si el usuario ha iniciado sesión
    if (Auth::check()) {
        $user = Auth::user();

        foreach ($products as $product) {
            // Comprueba si existe una compra asociada al usuario y al producto
            $hasPurchased[$product->id] = $user->compras->contains('product_id', $product->id);
        }
        
    } else {
        // Si el usuario no ha iniciado sesión, establece todos los productos como no comprados
        foreach ($products as $product) {
            $hasPurchased[$product->id] = false;
        }
    }

    $marquesinaController = new MarquesinaController();
    $rates = $marquesinaController->index()->getData()['rates'];

    return view('shop', ['title' => 'E-COMMERCE STORE | SHOP', 'products' => $products, 'hasPurchased' => $hasPurchased, 'Marquesina' => $Marquesina,'constantAssets' => $constantAssets,'user' => $user, 'rates' => $rates,]);
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

    // public function procesoPedido(Request $request){
        
    //     \MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    //     $products=[];

    //     foreach (CarPackage::getContent() as $r):

    //         $preference=new \MercadoPago\Preference();
    //         $item=new \MercadoPago\Item();
    //         $item->title = $r->name;
    //         $item->quantity = 1;
    //         $item->unit_price = CarPackage::getSubTotal();
    //         $products[]=$item;
    //         $preference->items=$products;

    //         $preference->back_urls=[
    //             'success' =>route('pedido.success'),
    //             'failure' =>route('cart.index'),
    //         ];
    //         $preference->save();
    //         return redirect()->away($preference->init_point);
    //     endforeach;
    // }
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
    

//     public function success()
// {
//     $user_id = Auth::user()->id;
//     $pedido = new Pedido();
//     $pedido->codigo = uniqid();
//     $pedido->total = CarPackage::getSubtotal();
//     $pedido->user_id = $user_id;
//     $pedido->save();

//     foreach (CarPackage::getContent() as $item):
//         $detalle = new Detalle();
//         $detalle->cantidad = $item->quantity;
//         $detalle->producto = $item->name;
//         $detalle->precio = $item->price;
//         $detalle->pedido_id = $pedido->id;
//         $detalle->save();
        
//         // Después de completar el pago, registra la compra en Compra
//         Compra::create([
//             'user_id' => $user_id,
//             'product_id' => $item->id,
//             'purchased' => true,
//         ]);
//     endforeach;
//     $userEmail = Auth::user()->email;
//     Mail::to($userEmail)->send(new ConfirmacionCompra($pedido));

//     CarPackage::clear();

//     return view('front.confirmacion')->with(['pedido' => $pedido->codigo, 'total' => $pedido->total]);
// }
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
        
        // Si el producto especial (ID 999) se encuentra en el carrito, desbloquear todos los informes
        if ($item->id == 999) {
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
    // public function checkIfUserHasPurchasedProduct($productId) {
    //     // Verifica si el usuario ha iniciado sesión
    //     if (auth()->check()) {
    //         $user = auth()->user();
    
    //         // Obtiene el producto por su ID
    //         $product = Product::find($productId);
    
    //         // Verifica si el usuario ha comprado el producto o si el precio es igual a 0
    //         $hasPurchased = $user->Compra()->where('product_id', $productId)->exists() || $product->price == 0 ;
    
    //         return $hasPurchased;
    //     }else if(auth()->check()) {
    //         $user = auth()->user();
    
    //         // Obtiene el producto por su ID
    //         $product = Product::find($productId);

    //         $hasPurchased = $product->price == 0 ;

    //         return $hasPurchased;

    //     }
    
    //     return false; // Si el usuario no ha iniciado sesión, asumimos que no ha comprado el producto.
    // }
    
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


}
