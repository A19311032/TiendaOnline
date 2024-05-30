<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Notification;
use App\Models\Layaway;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' =>
        [
            'index'
        ]]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        return view('index');
    }

    public function admin(){
        $userCount = User::all()->count();
        $productCount = Product::all()->count();
        $saleCount = Sale::all()->count();
        $providerCount = User::where('level', 2)->get()->count();
        $clientCount = User::where('level', 3)->get()->count();
        $layawayCount = Layaway::all()->count();
        $notificaciones = Notification::all();   

        return view('admin.home', compact('userCount', 'productCount','saleCount','providerCount','clientCount', 'notificaciones', 'layawayCount'));
    }

    public function busqueda(Request $request){
        $proveedores = User::where('level', 2)->where('status', 1)->where('name', 'like', '%' . $request['search'] . '%')->get();
        $productos = Product::where('status', 1)->where('name', 'like', '%' . $request['search'] . '%')->get();
        $clientes = User::where('level', 3)->where('status', 1)->where('name', 'like', '%' . $request['search'] . '%')->get();
        $notificaciones = Notification::all();
        return view('busqueda', compact('proveedores', 'productos', 'clientes', 'notificaciones'));
    }

    public function perfil(){
        $user = Auth::user();
        $notificaciones = Notification::all();
    
        return view('perfil', compact('notificaciones', 'user'));
    }
    

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validar los datos del formulario
        $request->validate([
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Actualizar los datos del usuario
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }


    public function sitio()
    {
        $notificaciones = Notification::all(); 
        return view('sites/sitio', compact('notificaciones'));
    }

    public function reportes()
    {
        $notificaciones = Notification::all();
        return view('reports/reportes', compact('notificaciones'));
    }

    public function notificaciones(){
        //funcion de lista de elementos por usuario loggeado 
        //parametro auth user_id
    }

    public function marcarNotificacion(Request $request){

        $notification = Notification::find($request['id']);

        if ($notification) {
            
            $notification->status = $request->status;
            
            
            $notification->save();
        }
            
        return redirect()->back();
    }

    public function contarNotificaciones(){

    }

    

}