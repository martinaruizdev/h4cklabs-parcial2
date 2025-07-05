<x-layout>
  <x-slot:title>Publicar una noticia</x-slot:title>

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
              <span class="has-text-hacklab-green">&gt;</span> Publicar una Noticia
            </h1>
            <form action="{{ route('news.store') }}" method="post">
              @csrf
              <div class="field mb-5">
                <label for="title" class="form-label has-text-white label">Titulo</label>
                <input
                  type="text"
                  name="title"
                  id="title"
                  class="form-control @error('title') is-invalid @enderror input hacklab-input"
                  @error('title') aria-invalid="true" aria-errormessage="error-title"
                  @enderror
                  value="{{ old('title') }}">
                @error('title')
                <div id="error-title" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="field mb-5">
                <label for="subtitle" class="form-label has-text-white label">Subtitulo</label>
                <input
                  type="text"
                  name="subtitle"
                  id="subtitle"
                  class="form-control @error('subtitle') is-invalid @enderror input hacklab-input"
                  @error('subtitle') aria-invalid="true" aria-errormessage="error-subtitle"
                  @enderror
                  value="{{ old('subtitle') }}">
                @error('subtitle')
                <div id="error-subtitle" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <label for="author" class="form-label has-text-white label">Autor</label>
                <input
                  type="text"
                  name="author"
                  id="author"
                  class="form-control @error('author') is-invalid @enderror input hacklab-input"
                  @error('author') aria-invalid="true" aria-errormessage="error-author"
                  @enderror
                  value="{{ old('author') }}">
                @error('author')
                <div id="error-author" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <label for="release_date" class="form-label has-text-white label">Fecha de publicacion</label>
                <input
                  type="date"
                  name="release_date"
                  id="release_date"
                  class="form-control @error('release_date') is-invalid @enderror input hacklab-input"
                  @error('release_date') aria-invalid="true" aria-errormessage="error-release_date"
                  @enderror
                  value="{{ old('release_date') }}">
                @error('release_date')
                <div id="error-release_date" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <label for="description" class="form-label has-text-white label">Descripcion</label>
                <textarea
                  name="description"
                  id="description"
                  class="form-control @error('description') is-invalid @enderror input hacklab-input"
                  @error('description') aria-invalid="true" aria-errormessage="error-description"
                  @enderror>{{ old('description') }}</textarea>
                @error('description')
                <div id="description" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <label for="tag" class="form-label has-text-white label">Tags</label>
                <input
                  type="text"
                  name="tag"
                  id="tag"
                  class="form-control @error('tag') is-invalid @enderror input hacklab-input"
                  @error('tag') aria-invalid="true" aria-errormessage="error-tag"
                  @enderror
                  value="{{ old('tag') }}">
                @error('tag')
                <div id="error-tag" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div>
                <label for="cover" class="form-label has-text-white label">Portada <span>(Opcional)</span></label>
                <input type="file" name="cover" id="cover" class="form-control input hacklab-input">
              </div>
              <div>
                <label for="cover_description" class="form-label has-text-white label">Portada <span>(Opcional)</span></label>
                <input type="file" name="cover_description" id="cover_description" class="form-control input hacklab-input">
              </div>

              <button type="submit" class="button is-primary button is-hacklab-primary is-fullwidth mt-6">Publicar Noticia</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </section>

</x-layout>
