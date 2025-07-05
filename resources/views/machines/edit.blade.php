<x-layout>
  <x-slot:title>Editar la máquina {{ $machine->name }}</x-slot:title>

  @if ($errors->any())
  <div class="notification is-danger">
    <button class="delete"></button>
    La información ingresada contiene errores. Por favor, <strong>revisa los campos e intenta otra vez.</strong>
  </div>
  @endif

  <section class="section hacklab-form-section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-8 m-auto">
          <div class="form-container">
            <h1 class="title has-text-white mb-5">
              <span class="has-text-hacklab-green">&gt;</span>Editar {{ $machine->name }}
            </h1>
            <form action="{{ route('machines.update', ['id' => $machine->machine_id]) }}" method="post">
              @csrf
              @method('PUT')

              <div class="field mb-5">
                <label for="name" class="form-label has-text-white label">Nombre</label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="form-control @error('name') is-invalid @enderror input hacklab-input"
                  value="{{ old('name', $machine->name) }}"
                  @error('name') aria-invalid="true" aria-errormessage="error-name" @enderror>
                @error('name')
                <div id="error-name" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="field mb-5">
                <label for="description" class="form-label has-text-white label">Descripción</label>
                <textarea
                  name="description"
                  id="description"
                  class="form-control @error('description') is-invalid @enderror input hacklab-input"
                  @error('description') aria-invalid="true" aria-errormessage="error-description" @enderror>{{ old('description', $machine->description) }}</textarea>
                @error('description')
                <div id="error-description" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="field mb-5">
                <label for="difficulty" class="form-label has-text-white label">Dificultad</label>
                <input
                  type="text"
                  name="difficulty"
                  id="difficulty"
                  class="form-control @error('difficulty') is-invalid @enderror input hacklab-input"
                  value="{{ old('difficulty', $machine->difficulty) }}"
                  @error('difficulty') aria-invalid="true" aria-errormessage="error-difficulty" @enderror>
                @error('difficulty')
                <div id="error-difficulty" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="field mb-5">
                <label for="attack_type" class="form-label has-text-white label">Tipo de Ataque</label>
                <input
                  type="text"
                  name="attack_type"
                  id="attack_type"
                  class="form-control @error('attack_type') is-invalid @enderror input hacklab-input"
                  value="{{ old('attack_type', $machine->attack_type) }}"
                  @error('attack_type') aria-invalid="true" aria-errormessage="error-attack_type" @enderror>
                @error('attack_type')
                <div id="error-attack_type" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="field mb-5">
                <label for="os" class="form-label has-text-white label">Sistema Operativo</label>
                <input
                  type="text"
                  name="os"
                  id="os"
                  class="form-control @error('os') is-invalid @enderror input hacklab-input"
                  value="{{ old('os', $machine->os) }}"
                  @error('os') aria-invalid="true" aria-errormessage="error-os" @enderror>
                @error('os')
                <div id="error-os" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="field mb-5">
                <label for="status" class="form-label has-text-white label">Estado</label>
                <input
                  type="text"
                  name="status"
                  id="status"
                  class="form-control @error('status') is-invalid @enderror input hacklab-input"
                  value="{{ old('status', $machine->status) }}"
                  @error('status') aria-invalid="true" aria-errormessage="error-status" @enderror>
                @error('status')
                <div id="error-status" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <button type="submit" class="button is-primary button is-hacklab-primary is-fullwidth mt-6">Aplicar Cambios</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
