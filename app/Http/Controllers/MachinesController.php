<?php

namespace App\Http\Controllers;

use App\Models\AttackType;
use App\Models\Difficulty;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MachinesController extends Controller
{
    public function index(Request $request)
    {
        $machinesQuery = Machine::with(['difficulty', 'attack_types']);

        $searchParams = [
            's-name' => $request->query('s-name'),
            's-difficulty' => $request->query('s-difficulty'),
        ];

        if($searchParams['s-name']){
            $machinesQuery->where('name', 'like', '%'.$searchParams['s-name'].'%');
        };
        if($searchParams['s-difficulty']){
            $machinesQuery->where('difficulty_fk', '=', $searchParams['s-difficulty']);
        }

        $allMachines = $machinesQuery->get();

        return view('machines.index', [
            'machines' => $allMachines,
            'difficulties' => Difficulty::all(),
            'searchParams' => $searchParams,
        ]);
    }

    public function view(Machine $machine)
    {
        return view('machines.view', [
            'machine' => $machine
        ]);
    }

    public function create()
    {
        return view('machines.create', [
            'difficulties' => Difficulty::all(),
            'attack_types' => AttackType::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'attack_type_id' => 'required',
            'os' => 'required|min:2',
            'status' => 'required|min:3',
        ], [
            'name.required' => 'Debe ingresar un nombre para la máquina',
            'name.min' => 'El nombre debe tener al menos :min caracteres',
            'description.required' => 'La descripción no puede estar vacía',
            'description.min' => 'La descripción debe tener al menos :min caracteres',
            'attack_type_id.required' => 'Debe ingresar el tipo de ataque',
            'os.required' => 'Debe ingresar el sistema operativo',
            'os.min' => 'El sistema operativo debe tener al menos :min caracteres',
            'status.required' => 'Debe ingresar el estado',
            'status.min' => 'El estado debe tener al menos :min caracteres',
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('images', 'public');
        }

        $machine = Machine::create($input);
        $machine->attack_types()->attach($input['attack_type_id'] ?? []);

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
        $machine->attack_types()->detach();
        $machine->delete();

        return redirect()
            ->route('machines.index')
            ->with('feedback.message', '¡La máquina <b>' . e($machine->name) . '</b> se eliminó correctamente!');
    }

    public function edit(Machine $machine)
    {



        return view('machines.edit', [
            'machine' => $machine,
            'attack_types' => AttackType::orderBy('name')->get(),
            'difficulties' => Difficulty::all()
        ]);
    }

    public function update(Request $request, int $machine_id)
    {

        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
            'attack_type_id' => 'required',
            'os' => 'required|min:2',
            'status' => 'required|min:3',
        ], [
            'name.required' => 'Debe ingresar un nombre para la máquina',
            'name.min' => 'El nombre debe tener al menos :min caracteres',
            'description.required' => 'La descripción no puede estar vacía',
            'description.min' => 'La descripción debe tener al menos :min caracteres',
            'attack_type_id.required' => 'Debe ingresar el tipo de ataque',
            'os.required' => 'Debe ingresar el sistema operativo',
            'os.min' => 'El sistema operativo debe tener al menos :min caracteres',
            'status.required' => 'Debe ingresar el estado',
            'status.min' => 'El estado debe tener al menos :min caracteres',
        ]);

        $machine = Machine::findOrFail($machine_id);

        $input = $request->except('_token', '_method');
        $oldImg = $machine->image;

        if ($request->hasFile('image') && $oldImg) {
            Storage::delete($oldImg);
        }

        if ($request->hasFile('image')) {
            $input['image'] = $request->file('image')->store('images', 'public');
        }

        $machine->update($input);
        $machine->attack_types()->sync($request->input('attack_type_id', []));

        return redirect()
            ->route('machines.index')
            ->with('feedback.message', '¡La máquina <b>' . e($request->name) . '</b> se actualizó correctamente!');
    }
}
