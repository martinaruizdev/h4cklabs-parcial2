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
          <li class="navbar-item">
            <form action="{{ route('auth.logout') }}" method="post">
              @csrf
              <button type="submit" class="navbar-item">
                {{ auth()->user()->email }} (Cerrar Sesion)
              </button>
            </form>
          
          </li>
        @else
        <x-nav-link route="auth.login" >Iniciar Sesión</x-nav-link>
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