<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachinesController extends Controller
{
    public function index()
    {
        $machines = Machine::all();

        return view('machines.index', [
            'machines' => $machines
        ]);
    }

    public function view(int $machine_id)
    {
        return view('machines.view', [
            'machine' => Machine::findOrFail($machine_id)
        ]);
    }

    public function create()
    {
        return view('machines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'difficulty' => 'required|min:3',
            'attack_type' => 'required|min:3',
            'os' => 'required|min:2',
            'status' => 'required|min:3',
        ], [
            'name.required' => 'Debe ingresar un nombre para la máquina',
            'name.min' => 'El nombre debe tener al menos :min caracteres',
            'description.required' => 'La descripción no puede estar vacía',
            'description.min' => 'La descripción debe tener al menos :min caracteres',
            'difficulty.required' => 'Debe ingresar la dificultad',
            'difficulty.min' => 'La dificultad debe tener al menos :min caracteres',
            'attack_type.required' => 'Debe ingresar el tipo de ataque',
            'attack_type.min' => 'El tipo de ataque debe tener al menos :min caracteres',
            'os.required' => 'Debe ingresar el sistema operativo',
            'os.min' => 'El sistema operativo debe tener al menos :min caracteres',
            'status.required' => 'Debe ingresar el estado',
            'status.min' => 'El estado debe tener al menos :min caracteres',
        ]);

        Machine::create($request->all());

        return redirect()
            ->route('machines.index')
            ->with('feedback.message', '¡La máquina <b>' . e($request->name) . '</b> se creó correctamente!');
    }

    public function delete(int $machine_id)
    {
        return view('machines.delete', [
            'machine' => Machine::findOrFail($machine_id)
        ]);
    }

    public function destroy(int $machine_id)
    {
        $machine = Machine::findOrFail($machine_id);
        $machine->delete();

        return redirect()
            ->route('machines.index')
            ->with('feedback.message', '¡La máquina <b>' . e($machine->name) . '</b> se eliminó correctamente!');
    }

    public function edit(int $machine_id)
    {
        return view('machines.edit', [
            'machine' => Machine::findOrFail($machine_id)
        ]);
    }

    public function update(Request $request, int $machine_id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'difficulty' => 'required|min:3',
            'attack_type' => 'required|min:3',
            'os' => 'required|min:2',
            'status' => 'required|min:3',
        ], [
            'name.required' => 'Debe ingresar un nombre para la máquina',
            'name.min' => 'El nombre debe tener al menos :min caracteres',
            'description.required' => 'La descripción no puede estar vacía',
            'description.min' => 'La descripción debe tener al menos :min caracteres',
            'difficulty.required' => 'Debe ingresar la dificultad',
            'difficulty.min' => 'La dificultad debe tener al menos :min caracteres',
            'attack_type.required' => 'Debe ingresar el tipo de ataque',
            'attack_type.min' => 'El tipo de ataque debe tener al menos :min caracteres',
            'os.required' => 'Debe ingresar el sistema operativo',
            'os.min' => 'El sistema operativo debe tener al menos :min caracteres',
            'status.required' => 'Debe ingresar el estado',
            'status.min' => 'El estado debe tener al menos :min caracteres',
        ]);

        $machine = Machine::findOrFail($machine_id);

        $machine->update($request->all());

        return redirect()
            ->route('machines.index')
            ->with('feedback.message', '¡La máquina <b>' . e($request->name) . '</b> se actualizó correctamente!');
    }
}
