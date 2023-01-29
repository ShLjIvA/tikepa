<!DOCTYPE html>
<html lang="en" class="no-js">

@include('fixed.head')

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">TikePa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item @if(request()->routeIs('articles') || request()->routeIs('admin')) active @endif">
        <a class="nav-link" href="/admin/articles">Articles @if(request()->routeIs('articles') || request()->routeIs('admin')) <span class="sr-only">(current)</span> @endif</a>
      </li>
      <li class="nav-item @if(request()->routeIs('categories')) active @endif">
        <a class="nav-link" href="/admin/categories">Categories @if(request()->routeIs('categories')) <span class="sr-only">(current)</span> @endif</a>
      </li>
      <li class="nav-item @if(request()->routeIs('brands')) active @endif">
        <a class="nav-link" href="/admin/brands">Brands @if(request()->routeIs('brands')) <span class="sr-only">(current)</span> @endif</a>
      </li>
      <li class="nav-item @if(request()->routeIs('genders')) active @endif">
        <a class="nav-link" href="/admin/genders">Genders @if(request()->routeIs('genders')) <span class="sr-only">(current)</span> @endif</a>
      </li>
      <li class="nav-item @if(request()->routeIs('users')) active @endif">
        <a class="nav-link" href="/admin/users">Users @if(request()->routeIs('users')) <span class="sr-only">(current)</span> @endif</a>
      </li>
      <li class="nav-item @if(request()->routeIs('links')) active @endif">
        <a class="nav-link" href="/admin/links">Links @if(request()->routeIs('links')) <span class="sr-only">(current)</span> @endif</a>
      </li>
      <li class="nav-item @if(request()->routeIs('orders')) active @endif">
        <a class="nav-link" href="/admin/orders">Orders @if(request()->routeIs('orders')) <span class="sr-only">(current)</span> @endif</a>
      </li>
      <li class="nav-item @if(request()->routeIs('logs')) active @endif">
        <a class="nav-link" href="/admin/logs">Logs @if(request()->routeIs('logs')) <span class="sr-only">(current)</span> @endif</a>
      </li>
    </ul>
  </div>
</nav>

<div>
@yield('content')
</div>

@include('fixed.scripts')
</body>

</html>
