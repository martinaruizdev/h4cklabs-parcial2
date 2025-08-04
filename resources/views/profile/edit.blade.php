<x-layout>
  <x-slot:title>Editar perfil</x-slot:title>

  <section class="section">
    <div class="container">
      <h1 class="title is-2 mb-5">Editar perfil</h1>

      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="box">
        @csrf
        @method('PUT')

        <div class="field">
          <label for="name" class="label">Nombre</label>
          <div class="control">
            <input
              type="text"
              name="name"
              id="name"
              value="{{ old('name', $user->name) }}"
              class="input @error('name') is-danger @enderror"
              required
              maxlength="255"
            >
          </div>
          @error('name')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label for="bio" class="label">Bio</label>
          <div class="control">
            <textarea
              name="bio"
              id="bio"
              rows="4"
              class="textarea @error('bio') is-danger @enderror"
              maxlength="1000"
            >{{ old('bio', $user->bio) }}</textarea>
          </div>
          @error('bio')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label for="avatar" class="label">Avatar</label>
          <div class="control">
            <input
              type="file"
              name="avatar"
              id="avatar"
              class="input @error('avatar') is-danger @enderror"
              accept="image/jpeg,image/png"
            >
          </div>
          @error('avatar')
            <p class="help is-danger">{{ $message }}</p>
          @enderror

          @if($user->avatar)
            <figure class="image is-128x128 mt-3">
              <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar actual">
            </figure>
          @endif
        </div>

        <div class="field mt-5">
          <div class="control">
            <button type="submit" class="button is-primary has-text-weight-semibold">Guardar cambios</button>
            <a href="{{ route('profile.show') }}" class="button is-light">Cancelar</a>
          </div>
        </div>

      </form>

    </div>
  </section>
</x-layout>
