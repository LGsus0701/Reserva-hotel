<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index() {
        $servicios = Servicio::all();
        return view('servicios.index', compact('servicios'));
    }

    public function create() {
        return view('servicios.create');
    }

    public function store(Request $request) {
        $request->validate([
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

        Servicio::create($request->all());
        return redirect()->route('servicios.index')->with('success', 'Servicio registrado correctamente.');
    }

    public function edit($id) {
        $servicio = Servicio::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $servicio = Servicio::findOrFail($id);
        $servicio->update($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy($id) {
        Servicio::findOrFail($id)->delete();
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado correctamente.');
    }
}
