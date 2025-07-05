<?php
/** @var string $route */
?>

<a class="navbar-item {{ request()->routeIs($route) ? 'is-active' : '' }}" 
{!! request()->routeIs($route) ? 'aria-current="page"' : '' !!}
href="{{ route($route) }}"

>{{ $slot }}</a>