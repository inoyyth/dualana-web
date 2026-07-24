<header class="site-header" data-header>
  <a href="{{ request()->is('/') ? '#home' : url('/') }}" class="mobile-logo">
    <img src="{{asset('assets/images/aset-simbol.png')}}" alt="Dualana">
  </a>
  <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" data-menu-toggle>
    <span></span>
    <span></span>
  </button>
  <nav class="nav-links" data-nav>
    <a href="{{ request()->is('/') ? '#about' : url('/#about') }}">About</a>
    <a href="{{ request()->is('/') ? '#services' : url('/#services') }}">Services</a>
    <a href="{{ request()->is('/') ? '#scope' : url('/#scope') }}">Scope</a>
    <a href="{{ request()->is('/') ? '#projects' : url('/#projects') }}">Projects</a>
    <a href="{{ request()->is('/') ? '#testimonials' : url('/#testimonials') }}">Testimonial</a>
    <a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}">Contact</a>
  </nav>
</header>