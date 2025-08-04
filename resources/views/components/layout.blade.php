<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}">
    <title>{{ $title ?? '' }} - Ha4ckLabs</title>
</head>
<body>
        <!-- Navbar --> 
<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
  <div class="container">

    <div class="navbar-brand">
      <a class="navbar-item" href="/">H4ckLabs</a>
      <div class="navbar-burger" data-target="navbar-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div class="navbar-menu" id="navbar-menu">
      <div class="navbar-end">
        <x-nav-link route="home" >Home</x-nav-link>
        <x-nav-link route="about" >Quienes somos</x-nav-link>
        <x-nav-link route="machines.index" >Máquinas</x-nav-link>
        <x-nav-link route="news.index" >Noticias</x-nav-link>
        @auth
         @if(auth()->user()->is_admin)
        <x-nav-link route="dashboard" >Dashboard</x-nav-link>
        @endif
  <li class="navbar-item has-dropdown is-hoverable">
    <a class="navbar-link" href="#">
      {{ auth()->user()->name }}
    </a>

    <div class="navbar-dropdown">
      <a href="{{ route('profile.show') }}" class="navbar-item">
        Mi Perfil
      </a>

      <hr class="navbar-divider">

      <form action="{{ route('auth.logout') }}" method="post" class="navbar-item p-0">
        @csrf
        <button type="submit" class="button is-white is-fullwidth has-text-left">
          Cerrar Sesión
        </button>
      </form>
    </div>
  </li>
        @else
        <x-nav-link route="auth.login" >Iniciar Sesión</x-nav-link>
        <x-nav-link route="auth.register" >Registrarse</x-nav-link>
        @endauth
      </div>

    </div>
  </div>
</nav>

    <main>
        <section class="section">
        <div class="container">
          @if (session()->has('feedback.message'))
          <div class="notification is-primary {{ session()->get('feedback.type', 'success') }}">
            <button class="delete"></button>
            {!! session()->get('feedback.message') !!}
          </div>
          @endif
        {{ $slot }}
        </div>
        </section>
    </main>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>© 2025 H4ckLabs | Martina Ruiz ACT3AP</p>
        </div>
    </footer>

    <script src="{{ url('js/cdn.min.js') }}" ></script>
</body>
</html>