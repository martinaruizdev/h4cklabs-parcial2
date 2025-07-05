<x-layout>

    <x-slot:title>Inicio</x-slot:title>

    <section class="hero hacklab-hero">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-7">
                    <div class="terminal-text mb-4">
                        <span class="terminal-prompt">[h4ck@labs]—[~]</span>
                        <span class="terminal-cursor">$</span>
                    </div>
                    
                        <h1 class="hero-title mb-5">
                            <span class="terminal-chevron">&gt;</span>La academia favorita
                            de los Hackers
                        </h1>
                    
                    <p class="hero-subtitle mb-6">
                        Aprende ciberseguridad y hacking ético en un entorno controlado con
                        H4ckLabs. Cursos, CTF, certificados y mucho más.
                    </p>
                    
                    <div class="buttons-container">
                        <a href="#" class="button is-hacklab-primary">
                            Empieza a Hackear
                        </a>
                        <a href="{{ route('about') }}" class="button is-hacklab-secondary ml-4">
                            Más Información
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</x-layout>