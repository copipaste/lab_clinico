<?php

namespace App\Http\Controllers;

use App\Models\TipoAnalisis;
use Illuminate\Http\Request;


class StripeController extends Controller
{
    public function checkout()
    {
        $tiposAnalisis = TipoAnalisis::all();
        return view('VistaCheckout.checkout', compact('tiposAnalisis'));
    }

    // public function session(Request $request)
    // {
    //     $ids_analisis = $request->input('analisis_id');
    //     $analisis = TipoAnalisis::whereIn('id', $ids_analisis)->get();

    //     $producto = 'producto1';
    //     $precio = 40;



    //     $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
    //     $response = $stripe->checkout->sessions->create([
    //         'line_items' => [
    //             [
    //                 'price_data' => [
    //                     'currency' => 'usd',
    //                     'product_data' => [
    //                         'name' => $producto,
    //                     ],
    //                     'unit_amount' => $precio * 100,
    //                 ],
    //                 'quantity' => 1,
    //             ],
    //         ],
    //         'mode' => 'payment',
    //         'success_url' => route('success'). '?session_id={CHECKOUT_SESSION_ID}',
    //         'cancel_url' => route('cancel'),
    //     ]);
    //     dd($response);

    //     return redirect();
    // }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $producto = 'producto1';
        $precio = 40;

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $producto,
                        ],
                        'unit_amount' => $precio * 100,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);


        // $lineItems = [];
        // foreach ($analisis as $item) {
        //     $lineItems[] = [
        //         'price_data' => [
        //             'currency' => 'USD',
        //             'product_data' => [
        //                 'name' => $item->nombre, // Nombre del análisis
        //             ],
        //             'unit_amount' => $item->precio * 100, // Convertir el precio a centavos (Stripe espera el precio en centavos)
        //         ],
        //         'quantity' => 1, // Puedes ajustar la cantidad según sea necesario
        //     ];
        // }

        // Crear la sesión de Stripe con los ítems de línea


        return redirect()->away($session->url);
    }


    // public function success(Request $request)
    // {
    // }

    // public function cancel()
    // {
    // }

    public function success()
    {
        return "Pago exitoso";
    }
}
