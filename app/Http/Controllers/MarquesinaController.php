<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marquesina;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MarquesinaController extends Controller
{
    //
    public function formularioCargaMarquesina()
    {
        return view('ADMIN.subir-marquesina');
    }

    public function guardarMarquesina(Request $request)
    {
        
        $Marquesina = new Marquesina();
        $Marquesina->datoIndicador = $request->input('datoIndicador');
        $Marquesina->valor = $request->input('valor');
        $Marquesina->save();
    
        return redirect('marquesina')->with('success', 'indicador subido con éxito');
    }
    public function mostrarMarquesina()
    {
        $Marquesina = Marquesina::all(); // Obtén todos los productos desde la base de datos
        return view('ADMIN/viewss.marquesina', ['Marquesina' => $Marquesina]);
    }
    public function editarMarquesina($id)
{
    // Aquí debes recuperar el producto con el ID proporcionado y pasarlos a la vista de edición
    $Marquesina = Marquesina::find($id);
    return view('ADMIN.editar-marquesina', ['Marquesina' => $Marquesina]);
}

public function actualizarMarquesina(Request $request, $id)
{
    // Recupera el producto con el ID proporcionado
    $Marquesina = Marquesina::find($id);
    $Marquesina->datoIndicador = $request->input('datoIndicador');
    $Marquesina->valor = $request->input('valor');

    // Actualiza otros campos según sea necesario.
    $Marquesina->save();

    // Redirige de nuevo a la lista de productos con un mensaje de éxito.
    return redirect()->route('marquesina')->with('success', 'Indicador actualizado con éxito');
}

public function eliminarMarquesina($id)
{
    try {
        // Busca el producto por ID y elimínalo
        $Marquesina = Marquesina::find($id);
        $Marquesina->delete();

        return redirect()->route('marquesina')->with('success', 'indicador eliminado con éxito');
    } catch (\Exception $e) {
        return redirect()->route('marquesina')->with('error', 'No se puede eliminar el indicador debido a restricciones de clave externa.');
    }
}
public function index()
    {
        $fromCurrency = 'USD';
        $toCurrencies = ['EUR', 'JPY', 'GBP', 'AUD', 'COP'];
        $rates = [];

        foreach ($toCurrencies as $currency) {
            $rate = $this->getExchangeRate($fromCurrency, $currency);
            $rates[$currency] = $rate;
        }


        // return view('currency.index', ['rates' => $rates]);
        return view('currency.index', compact('rates'));
    }

    private function getExchangeRate($fromCurrency, $toCurrency)
    {
        $cacheKey = "exchange_rate_{$fromCurrency}_{$toCurrency}";
        $cachedRate = Cache::get($cacheKey);

        if ($cachedRate) {
            return $cachedRate;
        }

        $apiKey = 'R4FODY1WJFVUIAM6';
        $endpoint = 'https://www.alphavantage.co/query';

        $response = Http::get($endpoint, [
            'function' => 'CURRENCY_EXCHANGE_RATE',
            'from_currency' => $fromCurrency,
            'to_currency' => $toCurrency,
            'apikey' => $apiKey
        ]);

        $data = $response->json();

        if (isset($data['Realtime Currency Exchange Rate'])) {
            $exchangeRateData = $data['Realtime Currency Exchange Rate'];
            $exchangeRate = $exchangeRateData['5. Exchange Rate'] ?? 'No disponible';

            Cache::put($cacheKey, $exchangeRate, now()->addHours(1)); // Cache for 1 hour

            return $exchangeRate;
        } else {
            return 'No disponible';
        }
    }
    

}
