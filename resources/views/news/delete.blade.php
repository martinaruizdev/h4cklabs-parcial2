<x-layout>

    <x-slot:title>Detalle de la noticia {{ $new->title }}</x-slot:title>

    <h1 class="title">Confirmacion para eliminar {{ $new->title }}</h1>
    <p>Estás a punto de eliminar la noticia {{ $new->title }}</p>
    <p>¿Estás seguro de que deseas eliminarla? Esta acción es <span class="has-text-danger has-text-weight-bold" >permanente y no se puede deshacer</span> (ni con el poderoso ctrl z). </p>

    <form action="{{ route('news.destroy', ['id' => $new->new_id]) }}"
    method="post"
    class="mb-3"
    >
    @csrf
    @method('DELETE')
    <button type="submit" class="button is-danger my-4">Si, eliminar {{ $new->title }}</button>
    </form>

    <dl class="mb-3">
        <dt class="has-text-weight-bold">Subtitulo</dt>
        <dd>{{ $new->subtitle }}</dd>

        <dt class="has-text-weight-bold">Autor</dt>
        <dd>{{ $new->author }}</dd>

        <dt class="has-text-weight-bold">Fecha de publicacion</dt>
        <dd>{{ $new->release_date }}</dd>
    </dl>

    <hr>

    <h2 class="title is-4">Descripcion</h2>
    <div>{{ $new->description }}</div>
</x-layout>