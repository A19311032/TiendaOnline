<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Layaway;
use App\Models\Notification;
use App\Models\User;

class LayawaysController extends Controller
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
    public function apartados()
    {
        $layaways = Layaway::all();
        $users = User::where('level', 3)->where('status', 1)->get();
        $notificaciones = Notification::all();
        $products = Product::where('status', 1)->get();
        return view('layaways.apartados', compact('layaways', 'notificaciones','users', 'products'));
    }

    public function create(Request $request)
    {
        Layaway::create([
            'user_id' =>$request['user_id'],
            'product_id' =>$request['product_id'],
            'customer_id' =>$request['customer_id'],
            'downpayment' =>$request['downpayment'],
        ]);
        return back()->with('correcto', 'Apartado agegado correctamente.');


    }

    public function delete($id)
    {
        $layaways = Layaway::find($id);
        
        if ($layaways) {
            // Delete the user record
            $layaways->delete();
    
            // Redirect or return a success message
            return redirect()->back()->with('bien', 'Apartado cancelado');
        } else {
            // Redirect or return an error message
            return redirect()->back()->with('mal', 'Error.');
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
