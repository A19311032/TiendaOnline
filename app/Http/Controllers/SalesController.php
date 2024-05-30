<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Detail;
use App\Models\Notification;
use App\Models\User;
use App\Models\Product;

class SalesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ventas()
    {
        //$sales = Sale::with('detail')->get();
        $sales = Sale::orderBy('id', 'DESC')->get();
        $notificaciones = Notification::all();
        $Details = Detail::all();
        return view('sales.ventas', compact('sales', 'notificaciones', 'Details'));
    }

    public function nuevaventa(){
        $nventa = Sale::all();
        $products = Product::where('status', 1)->get();
        $users = User::where('level', 3)->where('status', 1)->get();
        $notificaciones = Notification::all();
        return view('sales.nuevaventa', compact('nventa', 'notificaciones', 'products', 'users'));
    }

    public function create(Request $request)
{
    // Create the saledd
    $sale = Sale::create([
        'customer_id' => $request['customer_id'],
        'method' => $request['method'],
    ]);

    // Get the selected product IDs
    $selectedProductIds = array_keys($request->input('selected_products', []));

    // Loop through selected products to create details
    foreach ($selectedProductIds as $productId) {
        Detail::create([
            'sale_id' => $sale->id,
            'product_id' => $request['product_id'][$productId],
            'amount' => $request['amount'][$productId],
            'price' => $request['price'][$productId],
        ]);
    }

    return redirect(route('venta'))->with('correcto', 'Apartado agregado correctamente.');
}

    

   

    public function getCustomerInfo($id)
    {
        $customer = User::find($id); // Obtener el cliente por su ID

        if ($customer) {
            return response()->json([
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->phone,
            ]);
        } else {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
    }



 

    
    public function marcarNotificacion(Request $request){

        $notification = Notification::find($request['id']);

        if ($notification) {
            
            $notification->status = $request->status;
            
            
            $notification->save();
        }
            
        return redirect()->back();
    }
}