<?php

namespace App\Http\Controllers;

use App\Models\TipoAnalisis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NotaVenta;
use App\Models\Orden;
use App\Models\OrdenAnalisis;



class StripeController extends Controller
{
    public function checkout()
    {
        $tiposAnalisis = TipoAnalisis::all();
        return view('VistaCheckout.checkout', compact('tiposAnalisis'));
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $ids_analisis = $request->input('analisis_id');
        $analisis = TipoAnalisis::whereIn('id', $ids_analisis)->get();

        // Construir los ítems de línea para la sesión de Stripe
        $lineItems = [];
        foreach ($analisis as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'BOB',
                    'product_data' => [
                        'name' => $item->nombre, // Nombre del análisis
                    ],
                    'unit_amount' => $item->precio * 100, // Convertir el precio a centavos (Stripe espera el precio en centavos)
                ],
                'quantity' => 1, // Puedes ajustar la cantidad según sea necesario
            ];
        }

        // Crear la sesión de Stripe con los ítems de línea
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success', ['ids' => implode(',', $ids_analisis)]),
            //'success_url' => route('success'),
            'cancel_url' => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }


    public function stripeWebhook(Request $request)
    {
        $payload = $request->all();

        $sig_header = $request->header('Stripe-Signature');
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                config('stripe.webhook_secret')
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            $correo_cliente = $session->customer_email;
        }
        http_response_code(200);
    }

    public function success(Request $request)
    {
        $ids_analisis = explode(',', $request->query('ids'));
        $analisis = TipoAnalisis::whereIn('id', $ids_analisis)->get();

        DB::transaction(function () use ($analisis) {
            // Crear nota de venta
            $precioTotal = $analisis->sum('precio');
            $notaVenta = NotaVenta::create([
                'metodoPago' => 'stripe',
                'precio' => $precioTotal,
                'descuento' => 0, // Ajusta según sea necesario
                'precioTotal' => $precioTotal,
            ]);

            // Crear orden
            $orden = Orden::create([
                'idNotaVenta' => $notaVenta->id,
                'nroOrden' => uniqid(),
                'estado' => 'pagado',
                'idPaciente' => auth()->user()->id, // Asumiendo que el paciente está autenticado
            ]);

            // Crear orden_analisis
            foreach ($analisis as $tipoAnalisis) {
                OrdenAnalisis::create([
                    'orden_id' => $orden->id,
                    'tipo_analisis_id' => $tipoAnalisis->id,
                ]);
            }
        });

        return redirect()->route('checkout')->with('success', 'Pago completado con éxito');
    }
}
