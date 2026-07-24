@php
    $contact = $contactUs['data'][0] ?? null;
@endphp

<footer class="site-footer section-wrap">
    {{ $slot }}
    <p>Copyright © 2026 Dualana. All Rights Reserved</p>
    <nav aria-label="Footer navigation">
        <a href="{{ request()->is('/') ? '#about' : url('/#about') }}">About</a>
        <a href="{{ request()->is('/') ? '#services' : url('/#services') }}">Service</a>
        <a href="{{ request()->is('/') ? '#scope' : url('/#scope') }}">Scope</a>
        <a href="{{ request()->is('/') ? '#projects' : url('/#projects') }}">Projects</a>
        <a href="{{ request()->is('/') ? '#testimonials' : url('/#testimonials') }}">Testimonials</a>
        <a href="{{ request()->is('/') ? '#contact' : url('/#contact') }}">Contact</a>
    </nav>
    <div class="socials" aria-label="Social links">
        @if(isset($contact['acf']['contact_email']))
        <a href="{{ $contact['acf']['contact_email'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
        @endif
        @if(isset($contact['acf']['contact_whatsapp']))
        <a href="{{ $contact['acf']['contact_whatsapp'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Whatsapp"><i class="fa-brands fa-whatsapp"></i></a>
        @endif
        @if(isset($contact['acf']['contact_instagram']))
        <a href="{{ $contact['acf']['contact_instagram'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        @endif
        @if(isset($contact['acf']['contact_youtube']))
        <a href="{{ $contact['acf']['contact_youtube'] ?? '#' }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
        @endif
        @if(isset($contact['acf']['contact_linkedin']))
        <a href="{{ $contact['acf']['contact_linkedin'] ?? '#' }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
        @endif
        @if(isset($contact['acf']['contact_facebook']))
        <a href="{{ $contact['acf']['contact_facebook'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        @endif
        @if(isset($contact['acf']['contact_twitter']))
        <a href="{{ $contact['acf']['contact_twitter'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Twitter"><i class="fa-brands fa-x-twitter"></i></a>
        @endif
    </div>
</footer>
