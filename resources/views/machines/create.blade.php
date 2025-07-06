<x-layout>
  <x-slot:title>Crear una máquina</x-slot:title>

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
              <span class="has-text-hacklab-green">&gt;</span> Crear Máquina
            </h1>
            <form action="{{ route('machines.store') }}" method="post" enctype="multipart/form-data">
              @csrf

              <div class="field mb-5">
                <label for="name" class="form-label has-text-white label">Nombre</label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="form-control @error('name') is-invalid @enderror input hacklab-input"
                  value="{{ old('name') }}"
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
                  @error('description') aria-invalid="true" aria-errormessage="error-description" @enderror>{{ old('description') }}</textarea>
                @error('description')
                <div id="error-description" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="field mb-5">
                <label for="difficulty_fk" class="form-label has-text-white label">Dificultad</label>
                <select
                  name="difficulty_fk"
                  id="difficulty_fk"
                  class="form-control input hacklab-input">

                  @foreach ( $difficulties as $difficulty )
                  <option value="{{ $difficulty->difficulty_id }}" @selected($difficulty->difficulty_id == old('difficulty_fk')) >
                    {{ $difficulty->name }}
                  </option>
                  @endforeach

                </select>
                @error('difficulty_fk')
                <div id="error-difficulty" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <fieldset class="mb-5">
                <legend class="form-label has-text-white label">Tipo de Ataque</legend>
                @foreach ( $attack_types as $attack_type )
                <label class="form-label has-text-white label">
                  <input type="checkbox" name="attack_type_id[]" value="{{ $attack_type->attack_type_id }}" @checked(in_array($attack_type->attack_type_id, old('attack_type_id',[])))>
                  {{ $attack_type->name }}
                </label>
                @endforeach
              </fieldset>

              <div class="field mb-5">
                <label for="os" class="form-label has-text-white label">Sistema Operativo</label>
                <input
                  type="text"
                  name="os"
                  id="os"
                  class="form-control @error('os') is-invalid @enderror input hacklab-input"
                  value="{{ old('os') }}"
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
                  value="{{ old('status') }}"
                  @error('status') aria-invalid="true" aria-errormessage="error-status" @enderror>
                @error('status')
                <div id="error-status" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="field mb-5">
                <label for="image" class="form-label has-text-white label">Imagen</label>
                <input
                  type="file"
                  name="image"
                  id="image"
                  class="form-control input hacklab-input"
                  >
              </div>

              <button type="submit" class="button is-primary button is-hacklab-primary is-fullwidth mt-6">Crear Máquina</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>