<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Detail;
use App\Models\Notification;
use App\Models\User;
use App\Models\Product;

class ReportsController extends Controller
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

     public function reportes()
    {
       $proveedores = User::where('level', 2)->where('status', 1)->get();
       $clientes = User::where('level', 3)->where('status', 1)->get();
       $notificaciones = Notification::all();
        return view('reports.reportes', compact('notificaciones','proveedores', 'clientes'));
    }

    public function usuarios()
    {
       $users = User::where('level', 1)->where('status', 1)->get();
       
       $notificaciones = Notification::all();
        return view('reports.usuarios', compact('notificaciones', 'users'));
    }

    public function prove()
    {
       $providers = User::where('level', 2)->where('status', 1)->get();
       
       $notificaciones = Notification::all();
        return view('reports.proveedores', compact('notificaciones', 'providers'));
    }

    public function clie()
    {
       $clients = User::where('level', 3)->where('status', 1)->get();
       
       $notificaciones = Notification::all();
        return view('reports.clientes', compact('notificaciones', 'clients'));
    }

    public function prod()
    {
       $products = Product::where('status', 1)->get();
       
       $notificaciones = Notification::all();
        return view('reports.productos', compact('notificaciones', 'products'));
    }

    public function ven()
    {
       $sales = Sale::all();
       $Details = Detail::all();
       $notificaciones = Notification::all();
        return view('reports.productos', compact('notificaciones', 'sales', 'Details'));
    }
}
