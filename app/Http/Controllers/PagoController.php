<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaVenta;
use Carbon\Carbon;

class PagoController extends Controller
{
    function index(){
        $heads = [
            'paciente' => 'Paciente', 
            'metodoPago' => 'Método de Pago',
            'precio' => 'Precio',
            'descuento' => 'Descuento',
            'precioTotal' => 'Precio Total',
            'created_at' => 'Fecha',
         ['label' => 'Acciones', 'no-export' => true]
        ];
        $pagos = NotaVenta::all();
        return view('pagos.index', compact('pagos', 'heads'));
    }


    function indexCustom(Request $request){

        $heads = [];
        $pagos = new NotaVenta();

        if ($request->input('sel2Category') != null && $request->input('drPlaceholder') != null){
    
            $heads = $this->filtrarPorCategoria($request->input('sel2Category'));
            $pagos = $this->filtrarPorFecha($request->input('drPlaceholder'));

            return view('pagos.index', compact('heads', 'pagos'));

        }
        
        if ($request->input('sel2Category') != null && $request->input('drPlaceholder') == null) {
                
            $heads = $this->filtrarPorCategoria($request->input('sel2Category'));
            $pagos = NotaVenta::all();
            return view('pagos.index', compact('heads', 'pagos'));
        }

        
        if ($request->input('sel2Category') == null && $request->input('drPlaceholder') != null) {
            
            $pagos = $this->filtrarPorFecha($request->input('drPlaceholder'));
            $heads = [
                'paciente' => 'Paciente', 
                'metodoPago' => 'Método de Pago',
                'precio' => 'Precio',
                'descuento' => 'Descuento',
                'precioTotal' => 'Precio Total',
                'created_at' => 'Fecha',
             ['label' => 'Acciones', 'no-export' => true]
            ];
            return view('pagos.index', compact('heads', 'pagos'));
        }

        return redirect()->route('pagos.index');

    }


    public function filtrarPorFecha($drPlaceholder){
        
        $fechas = explode(' - ', $drPlaceholder);
        $fechaInicio = Carbon::createFromFormat('Y-m-d H:i', $fechas[0])->startOfDay();
        $fechaFin = Carbon::createFromFormat('Y-m-d H:i', $fechas[1])->endOfDay();

        $pagos = NotaVenta::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
        return $pagos;
    }


    public function filtrarPorCategoria($sel2Category){
        
        $headMap = [
            'paciente' => 'Paciente',
            'metodoPago' => 'Método de Pago',
            'precio' => 'Precio',
            'descuento' => 'Descuento',
            'precioTotal' => 'Precio Total',
            'created_at' => 'Fecha'
        ];

       // $sel2Category = $request->input('sel2Category');
        
        $heads = [];
        foreach ($sel2Category as $category) {
            if (array_key_exists($category, $headMap)) {
                $heads[] = $headMap[$category];
            }
        }
        $heads[] = ['label' => 'Acciones', 'no-export' => true];

        return $heads;
    }


    

    public function show(NotaVenta $pago){
        return view('pagos.show', compact('pago'));
    }


 

}
