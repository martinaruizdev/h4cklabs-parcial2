<x-layout>
  <x-slot:title>Editar la noticia {{ $new->title }}</x-slot:title>

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
            <h1 class="title has-text-white mb-5"><span class="has-text-hacklab-green">&gt;</span>Editar {{ $new->title }}</h1>
            <form action="{{ route('news.update', ['id' => $new->new_id]) }}" method="post">
              @csrf
              @method('PUT')
              <div class="field mb-5">
                <label for="title" class="form-label has-text-white label">Titulo</label>
                <input
                  type="text"
                  name="title"
                  id="title"
                  class="form-control @error('title') is-invalid @enderror input hacklab-input"
                  @error('title') aria-invalid="true" aria-errormessage="error-title"
                  @enderror
                  value="{{ old('title', $new->title) }}">
                @error('title')
                <div id="error-title" class="has-text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div>
                <label for="subtitle" class="form-label has-text-white label">subtitulo</label>
                <input
                  type="text"
                  name="subtitle"
                  id="subtitle"
                  class="form-control @error('subtitle') is-invalid @enderror input hacklab-input"
                  @error('subtitle') aria-invalid="true" aria-errormessage="error-subtitle"
                  @enderror
                  value="{{ old('subtitle', $new->subtitle) }}">
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
                  value="{{ old('author', $new->author) }}">
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
                  value="{{ old('release_date', $new->release_date) }}">
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
                  @enderror>{{ old('description', $new->description) }}</textarea>
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
                  value="{{ old('tag', $new->tag) }}">
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

              <button type="submit" class="button is-primary button is-hacklab-primary is-fullwidth mt-6">Aplicar Cambios</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>

</x-layout>