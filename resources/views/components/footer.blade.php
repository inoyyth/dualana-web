@php
    $contact = $contactUs['data'][0] ?? null;
@endphp

<footer class="site-footer section-wrap">
    {{ $slot }}
    <p>Copyright © 2026 Dualana. All Rights Reserved</p>
    <nav aria-label="Footer navigation">
        <a href="#about">About</a>
        <a href="#services">Service</a>
        <a href="#scope">Scope</a>
        <a href="#projects">Projects</a>
        <a href="#testimonials">Testimonials</a>
        <a href="#contact">Contact</a>
    </nav>
    <div class="socials" aria-label="Social links">
        <a href="{{ $contact['acf']['contact_instagram'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="{{ $contact['acf']['contact_youtube'] ?? '#' }}" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
        <a href="{{ $contact['acf']['contact_linkedin'] ?? '#' }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
    </div>
</footer>
