<x-layout>

    <x-slot:title>Detalle de la noticia {{ $new->title }}</x-slot:title>

    <h1 class="title">{{ $new->title }}</h1>

    <dl>
        <dt class="has-text-weight-bold">Subtitulo:</dt>
        <dd>{{ $new->subtitle }}</dd>

        <dt class="has-text-weight-bold">Autor:</dt>
        <dd>{{ $new->author }}</dd>

        <dt class="has-text-weight-bold">Fecha de publicacion:</dt>
        <dd>{{ $new->release_date }}</dd>
    </dl>

    <hr>

    <h2 class="title is-4">Descripcion</h2>
    <div>{{ $new->description }}</div>

    <hr>

    <p class="title is-5">Tags</p>
    <div>{{ $new->tag }}</div>
</x-layout>