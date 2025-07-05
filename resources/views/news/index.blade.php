<x-layout>
    <x-slot:title>Listado</x-slot:title>

    <h1 class="title is-2 my-4 has-text-centered">Últimas Noticias</h1>

    @auth
    <p><a href="{{ route('news.create') }}" class="publicar">Publicar una noticia</a></p>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Número</th>
                <th>Titulo</th>
                <th>Subtitulo</th>
                <th>Autor</th>
                <th>Fecha</th>
                <th>Descripcion</th>
                <th>Tags</th>
                <th>Acciones</th>
            </tr>
            @foreach ($news as $new)
            <tr>
                <td>{{ $new->new_id }}</td>
                <td>{{ $new->title }}</td>
                <td>{{ $new->subtitle }}</td>
                <td>{{ $new->author }}</td>
                <td>{{ $new->release_date }}</td>
                <td>{{ Str::limit($new->description, 80) }}</td>
                <td>{{ $new->tag }}</td>
                <td>
                    <div class="is-flex">
                        <a href="{{ route('news.view', [ 'id' => $new->new_id ]) }}" class="button is-primary">Ver</a>
                        <a href="{{ route('news.edit', [ 'id' => $new->new_id ]) }}" class="button is-secondary">Editar</a>
                        <a href="{{ route('news.delete', [ 'id' => $new->new_id ]) }}" class="button is-danger">Eliminar</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </thead>
    </table>

    @else
    <h2 class="subtitle is-4 my-6 has-text-centered">Descubre las últimas noticias en el mundo de la ciberseguridad</h2>

    <div class="columns is-multiline my-3">
        @foreach ($news as $new)
        <div class="column is-4">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <p class="title is-4 mb-4">{{ $new->title }}</p>
                            <p class="subtitle is-6">{{ $new->subtitle }}</p>
                        </div>
                    </div>

                    <div class="content">
                        <p>{{ $new->release_date }}</p>
                        <p class="has-text-weight-medium">Tags: {{ $new->tag }} </p>
                        <a href="{{ route('news.view', [ 'id' => $new->new_id ]) }}" class="button is-primary has-text-weight-semibold">Ver Más</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endauth
</x-layout>