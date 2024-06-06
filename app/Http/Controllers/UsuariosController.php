<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserMail; 
use Illuminate\Support\Facades\Mail;
use App\Models\User; 
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('usuarios.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');
        }
    
        return view('usuarios.edit', compact('user'));
    }
    
    
    public function mostrarFormulario()
    {
        $roles = Role::all();
        return view('usuarios.create', ['roles' => $roles]);
    }

    public function crearUsuario(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'celular' => 'nullable|string|max:10',
            'estatus' => 'nullable|in:Activo,Inactivo',
            'rol' => 'required|string',
            'password' => 'required|string|min:8' // Asegúrate de validar la contraseña
        ]);
    
        $user = new User; 
        $user->name = $request->name;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->email = $request->email;
        $user->celular = $request->celular;
        $user->estatus = $request->estatus;
        $user->empresa = $request->empresa;
        $user->password = Hash::make($request->password); // Hashea la contraseña
    
        // Guarda el usuario
        $user->save();
    
        // Asigna el rol al usuario
        $user->assignRole($request->rol);
    
        // Envía un correo electrónico al nuevo usuario (necesitas configurar esto)
        // Mail::to($user->email)->send(new UserMail($user));
    
        // Redirige con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito y se ha enviado un correo con detalles de inicio de sesión.');
    }

    public function update(Request $request, $id)
    {
        // Validación de datos (esto es un ejemplo básico, puedes agregar más reglas según lo necesites)
        $request->validate([
            'name' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'celular' => 'required|max:20',
            'empresa' => 'max:255',
            'estatus' => 'required|in:Activo,Inactivo',
        ]);

        // Busca el usuario por ID
        $user = User::find($id);

        // Si el usuario no se encuentra, redirige con un mensaje de error (puedes manejar esto de diferentes maneras)
        if (!$user) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado.');
        }

        // Actualiza el usuario con los datos del formulario
        $user->update([
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'celular' => $request->celular,
            'empresa' => $request->empresa,
            'estatus' => $request->estatus,
        ]);

        // Redirige de vuelta a la página de lista o a donde prefieras con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');
    }
}
