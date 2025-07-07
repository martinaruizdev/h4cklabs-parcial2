<x-layout>
    <x-slot:title>Registrarse | H4ckLabs</x-slot:title>
    <section class="section hacklab-login">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop">
                    <div class="terminal-window">
                        <div class="terminal-header">
                            <div class="terminal-title">
                                <span class="terminal-prompt">[h4ck@labs]—[~]</span>
                                <span class="terminal-command">$ ./register.sh</span>
                            </div>
                        </div>

                        <div class="terminal-body">
                            <div class="terminal-output mb-4">
                                <span class="terminal-chevron">&gt;</span>
                                <span class="terminal-text">Formulario de registro</span>
                            </div>

                            <h1 class="login-title mb-5">Crear una Cuenta</h1>

                            <form action="{{ route('auth.register.store') }}" method="POST">
                                @csrf

                                <div class="field mb-5">
                                    <label for="name" class="form-label has-text-white">Nombre de Usuario</label>
                                    <input type="text" id="name" name="name" class="form-control input hacklab-input" value="{{ old('name') }}" placeholder="Nombre completo">
                                </div>

                                <div class="field mb-5">
                                    <label for="email" class="form-label has-text-white">Email</label>
                                    <input type="email" id="email" name="email" class="form-control input hacklab-input" value="{{ old('email') }}" placeholder="usuario@ejemplo.com">
                                </div>

                                <div class="field mb-4">
                                    <label for="password" class="form-label has-text-white">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control input hacklab-input" placeholder="********">
                                </div>

                                <div class="field mb-4">
                                    <label for="password_confirmation" class="form-label has-text-white">Confirmar Contraseña</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control input hacklab-input" placeholder="********">
                                </div>

                                <button type="submit" class="button is-hacklab-primary is-fullwidth mt-6">Registrarse</button>
                            </form>

                            @if ($errors->any())
                            <div class="notification is-danger is-light mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="has-text-centered mt-5">
                                <p class="has-text-grey-light">¿Ya tienes una cuenta?</p>
                                <a href="{{ route('auth.login') }}" class="a-reg">Iniciar sesión</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
