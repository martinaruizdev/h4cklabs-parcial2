<x-layout>
    <x-slot:title>Usuario {{ $user->name }}</x-slot:title>

    <section class="section">
        <div class="container">


            <h1 class="title is-2 mb-5">Detalles de Usuario</h1>

            <div class="box">
                @if($user->avatar)
                <figure class="image is-128x128 mb-4">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar de {{ $user->name }}">
                </figure>
                @endif

                <p><strong>ID:</strong> {{ $user->id }}</p>
                <p><strong>Nombre:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Administrador:</strong>
                    @if($user->is_admin)
                    <span class="tag is-success">Sí</span>
                    @else
                    <span class="tag is-dark">No</span>
                    @endif
                </p>
                <p><strong>Bio:</strong> {{ $user->bio ?? 'No cargada' }}</p>

                <a href="{{ route('users.edit', $user->id) }}" class="button is-primary mt-4">Editar Usuario</a>
                <a href="{{ route('dashboard') }}" class="button is-light mt-4">Volver al Dashboard</a>
            </div>
        </div>
    </section>
</x-layout>