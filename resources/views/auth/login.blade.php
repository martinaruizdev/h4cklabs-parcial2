<x-layout>
    <x-slot:title>Iniciar Sesion | H4ckLbas </x-slot:title>
    <section class="section hacklab-login">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-5-tablet is-4-desktop">
                    <div class="terminal-window">
                        <div class="terminal-header">
                            <div class="terminal-title">
                                <span class="terminal-prompt">[h4ck@labs]—[~]</span>
                                <span class="terminal-command">$ ./login.sh</span>
                            </div>
                        </div>

                        <div class="terminal-body">
                            <div class="terminal-output mb-4">
                                <span class="terminal-chevron">&gt;</span>
                                <span class="terminal-text">Autenticación requerida</span>
                            </div>

                            <h1 class="login-title mb-5">Iniciar Sesión</h1>

                            <form action="{{ route('auth.authenticate') }}" method="post">
                                @csrf
                                <div class="field mb-5">
                                    <label for="email" class="form-label has-text-white">Email</label>
                                    <input type="email" id="email" name="email" class="form-control input hacklab-input" placeholder="usuario@ejemplo.com">
                                </div>

                                <div class="field mb-4">
                                    <label for="password" class="form-label has-text-white">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control input hacklab-input" placeholder="********">
                                </div>

                                <button type="submit" class="button is-hacklab-primary is-fullwidth mt-6">Acceder al Sistema</button>

                            </form>

                            @if ($errors->any())
                            <div class="notification is-danger is-light">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="has-text-centered mt-5">
                                <p class="has-text-grey-light">¿No tienes una cuenta?</p>
                                <a href="/" class="a-reg">Regístrate aquí</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-layout>
