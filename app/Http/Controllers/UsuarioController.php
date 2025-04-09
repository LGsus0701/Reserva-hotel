<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('empleado')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('usuarios.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_empleado' => 'required',
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario',
            'contrasena' => 'required',
            'rol' => 'required',
        ]);

        Usuario::create([
            'id_empleado' => $request->id_empleado,
            'nombre_usuario' => $request->nombre_usuario,
            'contrasena' => bcrypt($request->contrasena),
            'rol' => $request->rol,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit(Usuario $usuario)
    {
        $empleados = Empleado::all();
        return view('usuarios.edit', compact('usuario', 'empleados'));
    }

    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'id_empleado' => 'required',
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario,' . $usuario->id_usuario . ',id_usuario',
            'rol' => 'required',
        ]);

        $usuario->update([
            'id_empleado' => $request->id_empleado,
            'nombre_usuario' => $request->nombre_usuario,
            'rol' => $request->rol,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
