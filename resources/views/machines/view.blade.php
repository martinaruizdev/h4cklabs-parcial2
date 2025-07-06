<x-layout>
  <x-slot:title>Detalle de la máquina {{ $machine->name }}</x-slot:title>

  <section class="section machine-detail-section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-10">
          <div class="terminal-window">
            <div class="terminal-body">
              <h1 class="title has-text-white">
                <span class="terminal-chevron">&gt;</span>{{ $machine->name }}
              </h1>

              <dl class="machine-details-list">
                <dt class="has-text-weight-bold has-text-hacklab-green">Dificultad:</dt>
                <dd class="has-text-white">{{ $machine->difficulty->name }}</dd>

                <dt class="has-text-weight-bold has-text-hacklab-green">Tipo de Ataque:</dt>
                <dd class="has-text-white">{{ $machine->attack_type }}</dd>

                <dt class="has-text-weight-bold has-text-hacklab-green">Sistema Operativo:</dt>
                <dd class="has-text-white">{{ $machine->os }}</dd>

                <dt class="has-text-weight-bold has-text-hacklab-green">Estado:</dt>
                <dd class="has-text-white">{{ ucfirst($machine->status) }}</dd>

                <dt class="has-text-weight-bold has-text-hacklab-green">Fecha de creación:</dt>
                <dd class="has-text-white">{{ $machine->created_at ? $machine->created_at->format('d/m/Y') : now()->format('d/m/Y') }}</dd>
              </dl>

              <hr class="hacklab-divider">

              <h2 class="title is-4 has-text-white">Descripción</h2>
              <div class="machine-description has-text-grey-light">
                {{ $machine->description }}

              <figure class="image mt-3" >
                <img class="mt-3" src="{{ \Illuminate\Support\Facades\Storage::url($machine->image) }}" alt="{{ $machine->name }}" >
              </figure>
              </div>

              <div class="buttons-container mt-6">
                <a href="{{ route('auth.login') }}" class="button is-hacklab-primary">
                  Empieza a Hackear
                </a>
                <a href="{{ route('machines.index') }}" class="button is-light ml-3 mt-2">
                  <span>Volver Atrás</span>
                </a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>