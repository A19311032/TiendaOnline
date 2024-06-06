<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::orderBy('created_at', 'desc')->paginate(10);
        return view('ventas.index', compact('ventas'));
    }

    public function registrar(Request $request)
{
    // Verificar si $request->ventas es null antes de intentar iterar sobre él
    if ($request->ventas !== null) {
        foreach ($request->ventas as $productoId => $cantidad) {
            $producto = Producto::find($productoId);
            if ($producto) {
                $producto->cantidad -= $cantidad;
                $producto->save();
            }
        }
        return redirect()->route('ventas.index')->with('success', 'Ventas registradas correctamente.');
    } else {
        // Manejar el caso donde $request->ventas es null
        return redirect()->route('ventas.index')->with('error', 'No se recibieron datos de ventas.');
    }
}

    public function edit($id)
    {
        $venta = Venta::find($id);
        
        if (!$venta) {
            return redirect()->route('ventas.index')->with('error', 'Venta no encontrado');
        }
    
        return view('ventas.edit', compact('venta'));
    }
    
    
    public function mostrarFormulario()
    {
        $productos = Producto::all(); // Obtener todos los productos disponibles
        return view('ventas.create', compact('productos'));
    }
    
    
   public function registrarVenta(Request $request)
    {
        // Validar el formulario de venta, asegúrate de que los campos requeridos estén presentes y sean válidos
        
        $ventas = $request->ventas;

        try {
            // Iniciar una transacción para garantizar que todas las operaciones se realicen o ninguna
            DB::beginTransaction();

            foreach ($ventas as $producto_id => $cantidad) {
                // Deduce la cantidad vendida del inventario
                $producto = Producto::findOrFail($producto_id);
                $producto->cantidad -= $cantidad;
                $producto->save();

                // Crea un nuevo registro de venta
                Venta::create([
                    'producto_id' => $producto_id,
                    'cantidad' => $cantidad,
                    'created_at' => now(),
                ]);
            }

            // Commit de la transacción si todas las operaciones fueron exitosas
            DB::commit();

            // Redirige con un mensaje de éxito
            return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
        } catch (\Exception $e) {
            // Si hay algún error, rollback de la transacción para deshacer todas las operaciones
            DB::rollBack();

            // Redirige con un mensaje de error
            return redirect()->route('ventas.index')->with('error', 'Error al registrar la venta. Por favor, inténtalo de nuevo.');
        }
    }
}
