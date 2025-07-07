<x-layout>
    <x-slot:title>Confirmación de Nivel</x-slot:title>
    
    <section class="section level-verification-section">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-8">
                    <div class="terminal-window">
                        <div class="terminal-body">
                            <h1 class="title has-text-white">Se necesita la confirmación de nivel para continuar</h1>
                            
                            <p class="has-text-white">La máquina {{ $machine->name }} está marcada como nivel extremo.</p>
                            <p class="has-text-grey-light mt-2">¿Estás seguro que cuentas con el conocimiento requerido para capturar la bandera?</p>
                            
                            <form action="{{ route('machines.level-verification.save', ['id'=> $machine->machine_id]) }}" method="post">
                                @csrf
                                <div class="buttons-container mt-6">
                                    <button type="submit" class="button is-primary">Sí, soy experto</button>
                                    <a href="{{ route('machines.index') }}" class="button is-danger ml-3">No, aún no. Volver a las máquinas</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>