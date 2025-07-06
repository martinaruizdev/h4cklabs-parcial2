<x-layout>
    <x-slot:title>Listado de Máquinas</x-slot:title>

    <h1 class="title is-2 my-4 has-text-centered">Máquinas Disponibles</h1>

    @auth     <!------------------- start auth-------------------------->
    <p><a href="{{ route('machines.create') }}" class="publicar">Crear una máquina</a></p>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dificultad</th>
                <th>Tipo de Ataque</th>
                <th>OS</th>
                <th>Estado</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
            <tr>
                <td>{{ $machine->machine_id }}</td>
                <td>{{ $machine->name }}</td>
                <td>{{ $machine->difficulty->name }}</td>
                <td>
                    @foreach ( $machine->attack_types as $attack_type )
                        <span class="tag is-dark has-text-weight-semibold">{{ $attack_type->name }}</span>
                    @endforeach
                </td>
                <td>{{ $machine->os }}</td>
                <td>{{ $machine->status }}</td>
                <td>{{ Str::limit($machine->description, 80) }}</td>
                <td>
                    <div class="is-flex">
                        <a href="{{ route('machines.view', [ 'id' => $machine->machine_id ]) }}" class="button is-primary">Ver</a>
                        <a href="{{ route('machines.edit', [ 'id' => $machine->machine_id ]) }}" class="button is-secondary">Editar</a>
                        <a href="{{ route('machines.delete', [ 'id' => $machine->machine_id ]) }}" class="button is-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else  <!---------------------- end auth ------------------------->

    <h2 class="subtitle is-4 my-6 has-text-centered">Elige una máquina y pon a prueba tus habilidades</h2>

    <div class="columns is-multiline my-3">
        @foreach ($machines as $machine)
        <div class="column is-4">
            <div class="card">
                <div class="card-content">
                    <p class="title is-4 mb-2">{{ $machine->name }}</p>
                    <p class="subtitle is-6 mb-2">{{  $machine->difficulty->name }} |  @foreach ( $machine->attack_types as $attack_type )
                        <span class="tag is-dark has-text-weight-semibold">{{ $attack_type->name }}</span>
                    @endforeach | {{ $machine->os }}</p>
                    <p class="mb-3"><strong>Estado:</strong> {{ strtoupper($machine->status) }}</p>
                    <p class="mb-4">{{ Str::limit($machine->description, 100) }}</p>
                    <a href="{{ route('machines.view', [ 'id' => $machine->machine_id ]) }}" class="button is-primary is-fullwidth has-text-weight-semibold">Ver Más</a> 
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endauth
</x-layout>
