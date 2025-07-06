<x-layout>

    <x-slot:title>Confirmación para eliminar la máquina {{ $machine->name }}</x-slot:title>

    <h1 class="title">Confirmación para eliminar {{ $machine->name }}</h1>
    <p>Estás a punto de eliminar la máquina <strong>{{ $machine->name }}</strong>.</p>
    <p>¿Estás seguro de que deseas eliminarla? Esta acción es <span class="has-text-danger has-text-weight-bold" >permanente y no se puede deshacer</span> (ni con el poderoso ctrl + z).</p>

    <form action="{{ route('machines.destroy', ['id' => $machine->machine_id]) }}"
          method="post"
          class="mb-3"
    >
        @csrf
        @method('DELETE')
        <button type="submit" class="button is-danger my-4">Sí, eliminar {{ $machine->name }}</button>
    </form>

    <dl class="mb-3">
        <dt class="has-text-weight-bold">Dificultad</dt>
        <dd>{{ $machine->difficulty->name }}</dd>

        <dt class="has-text-weight-bold">Tipo de Ataque</dt>
        <dd>{{ $machine->attack_type }}</dd>

        <dt class="has-text-weight-bold">Sistema Operativo</dt>
        <dd>{{ $machine->os }}</dd>

        <dt class="has-text-weight-bold">Estado</dt>
        <dd>{{ $machine->status }}</dd>
    </dl>

    <hr>

    <h2 class="title is-4">Descripción</h2>
    <div>{{ $machine->description }}</div>

</x-layout>
