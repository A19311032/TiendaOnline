<?php

namespace App\Http\Controllers;

use App\Models\Layaway;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;

class UsersController extends Controller
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
    public function usuarios()
    {
        $users = User::where('status', 1)->paginate(20);
        $notificaciones = Notification::all();  
        return view('users.usuarios', compact('users', 'notificaciones'));
    }

    public function inactivos()
    {
        $users = User::where('status', 0)->paginate(20);
        $notificaciones = Notification::all();  
        return view('users.inactivos', compact('users','notificaciones'));
    }


    public function proveedores()
    {
        $users = User::where('level', 2)->where('status', 1)->paginate(20);
        $notificaciones = Notification::all();  
        return view('providers.proveedores', compact('users', 'notificaciones'));
    }

    public function clientes()
    {
        $users = User::where('level', 3)->where('status', 1)->paginate(20);
        $notificaciones = Notification::all();  
        return view('clients.clientes', compact('users', 'notificaciones'));
    }

    

    public function create(Request $request)
    {
        User::create([
            'name' =>$request['name'],
            'email' =>$request['email'],
            'phone' =>$request['phone'],
            'brand' =>$request['brand'],
            'social' =>$request['social'],
            'level' =>$request['level'],
            'status' =>'1',
            'password' =>bcrypt('12345678'),
        ]);
        return back()->with('success', 'Usuario agegado correctamente.');


    }

    public function createlayaway(Request $request)
    {
        User::create([
            'name' =>$request['name'],
            'email' =>$request['email'],
            'phone' =>$request['phone'],
            'brand' =>$request['brand'],
            'social' =>$request['social'],
            'level' =>$request['level'],
            'status' =>'1',
            'password' =>bcrypt('12345678'),
        ]);
        return redirect()->route('apartado')->with('success', 'Usuario agegado correctamente.');


    }
   
    public function update(Request $request, $id)
    {
        $users = User::find($id);

        if ($users) {
            
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->brand = $request->brand;
            $users->social = $request->social;
            $users->level = $request->level;
            //$users->password = $request->password;
            
            $users->save();

            
            return redirect()->back()->with('correcto', 'Registro actualizado correctamente.');
        } else {
        
            return redirect()->back()->with('incorrecto', 'error.');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $users = User::find($id);

        if ($users) {
            
            $users->status = 0;
            $users->save();

            
            return redirect()->back()->with('correcto', 'Usuario eliminado correctamente.');
        } else {
        
            return redirect()->back()->with('incorrecto', 'error.');
        }
    }
    

    public function delete($id)
    {
        $users = User::find($id);
        
        if ($users) {
            // Delete the user record
            $users->delete();
    
            // Redirect or return a success message
            return redirect()->back()->with('correcto', 'Usuario eliminado correctamente.');
        } else {
            // Redirect or return an error message
            return redirect()->back()->with('incorrecto', 'Usuario no encontrado.');
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