<x-layout>
  <x-slot:title>Listado de Máquinas</x-slot:title>

  <h1 class="title is-2 my-4 has-text-centered">Máquinas Disponibles</h1>

  @auth <!------------------- start auth-------------------------->
   @if(auth()->check() && auth()->user()->is_admin)
  <p><a href="{{ route('machines.create') }}" class="publicar">Crear una máquina</a></p>
 @endif
  <table class="table mt-6">
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
            <a href="{{ route('machines.view', [ 'machine' => $machine->machine_id ]) }}" class="button is-primary">Ver</a>
             @if(auth()->check() && auth()->user()->is_admin)
            <a href="{{ route('machines.edit', [ 'machine' => $machine->machine_id ]) }}" class="button is-secondary">Editar</a>
            <a href="{{ route('machines.delete', [ 'id' => $machine->machine_id ]) }}" class="button is-danger">Eliminar</a>
            @endif
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @else <!---------------------- end auth ------------------------->

  <h2 class="subtitle is-4 mt-5 mb-4 has-text-centered">Elige una máquina y pon a prueba tus habilidades</h2>

  <section class="section search-section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-8">
          <div class="box p-5">
            <h3 class="title is-4 has-text-white mb-4">Buscador</h3>

            <form action="{{ route('machines.index') }}" method="get">
              <div class="field is-grouped is-align-items-end">
                <div class="control is-expanded">
                  <label for="s-name" class="label has-text-primary">Nombre</label>
                  <input
                    type="search"
                    name="s-name"
                    id="s-name"
                    class="input"
                    value="{{ $searchParams['s-name'] }}"
                    placeholder="Buscar por nombre">
                  <div>
                    <label for="s-difficulty" class="label has-text-primary">Dificultad</label>
                    <select name="s-difficulty" id="s-difficulty" class="form-control">
                      <option value="">Todas</option>
                      @foreach ($difficulties as $difficulty)
                      <option value="{{ $difficulty->difficulty_id }}"
                      @selected($difficulty->difficulty_id == $searchParams['s-difficulty'])>
                        {{ $difficulty->name }}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="control">
                  <button type="submit" class="button is-primary is-fullwidth has-text-weight-semibold">
                    Buscar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if (!empty($searchParams['s-name']))
  <p class="mb-6 mt-3 has-text-gray has-text-centered">Mostrando los resultados para:
    <b>{{ $searchParams['s-name'] }}</b>
  </p>
  @endif

  @if ($machines->isNotEmpty())
  <div class="columns is-multiline my-3">
    @foreach ($machines as $machine)
    <div class="column is-4">
      <div class="card">
        <div class="card-content">
          <p class="title is-4 mb-2">{{ $machine->name }}</p>
          <p class="subtitle is-6 mb-2">{{ $machine->difficulty->name }} | @foreach ( $machine->attack_types as $attack_type )
            <span class="tag is-dark has-text-weight-semibold">{{ $attack_type->name }}</span>
            @endforeach | {{ $machine->os }}
          </p>
          <p class="mb-3"><strong>Estado:</strong> {{ strtoupper($machine->status) }}</p>
          <p class="mb-4">{{ Str::limit($machine->description, 100) }}</p>
          <a href="{{ route('machines.view', [ 'machine' => $machine->machine_id ]) }}" class="button is-primary is-fullwidth has-text-weight-semibold">Ver Más</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  @else
  <p class="mb-6 mt-3 has-text-gray has-text-centered">Lo sentimos, no se encontraron resultados para: <b>{{ $searchParams['s-name'] }}</b> </p>
  @endif

  @endauth
</x-layout>