<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Notification;
use App\Models\User;

class ProductsController extends Controller
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
    public function productos()
    {
        $products = Product::where('status', 1)->paginate(20);
        $users = User::where('level', 2)->where('status', 1)->get();
        $notificaciones = Notification::all();
        return view('products.productos', compact('products','users','notificaciones'));
    }

    public function categorias() {
        $products = Product::where('category_id', 1)->paginate(20);
        $notificaciones = Notification::all();

        return view('categories.categories', compact('products','notificaciones'));
    }

    public function cuidadopersonal()
    {
        $products = Product::where('category_id', 2)->paginate(20);
        $notificaciones = Notification::all();  
        return view('categories.cuidadopersonal', compact('products','notificaciones'));
    }

    public function Bolsos()
    {
        $products = Product::where('category_id', 3)->paginate(20);
        $notificaciones = Notification::all();  
        return view('categories.bolsos', compact('products','notificaciones'));
    }
    public function Accesorios()
    {
        $products = Product::where('category_id', 4)->paginate(20);
        $notificaciones = Notification::all();  
        return view('categories.accesorios', compact('products','notificaciones'));
    }

    public function create(Request $request)
    {
        Product::create([
            'name' =>$request['name'],
            'description' =>$request['description'],
            'picture' =>$request['picture'],
            'stock' =>$request['stock'],
            'category_id' =>$request['category_id'],
            'user_id' =>$request['user_id'],
            'price' =>$request['price'],
            'status' =>'1',
        ]);
        return back()->with('success', 'Producto agegado correctamente.');
    }

    public function updateStatus(Request $request, $id)
    {
        $products = Product::find($id);

        if ($products) {
            
            $products->status = 0;
            $products->save();

            
            return redirect()->back()->with('correcto', 'Producto eliminado correctamente.');
        } else {
        
            return redirect()->back()->with('incorrecto', 'error.');
        }
    }

    public function delete($id)
    {
        $products = Product::find($id);
        
        if ($products) {
            // Delete the user record
            $products->delete();
    
            // Redirect or return a success message
            return redirect()->back()->with('correcto', 'Producto eliminado correctamente.');
        } else {
            // Redirect or return an error message
            return redirect()->back()->with('incorrecto', 'producto no encontrado.');
        }
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        if ($products) {
            
            $products->name = $request->name;
            $products->description = $request->description;
            $products->picture = $request->picture;
            $products->stock = $request->stock;
            $products->category_id = $request->category_id;
            $products->user_id = $request->user_id;
            $products->price = $request->price;
            
            $products->save();

            
            return redirect()->back()->with('correcto', 'Producto actualizado correctamente.');
        } else {
        
            return redirect()->back()->with('incorrecto', 'error.');
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
