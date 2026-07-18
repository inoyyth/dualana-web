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
        <a href="#contact">Contact</a>
    </nav>
    <div class="socials" aria-label="Social links">
        <a href="{{ $contact['acf']['contact_instagram'] ?? '#' }}" aria-label="Instagram">i</a>
        <a href="{{ $contact['acf']['contact_youtube'] ?? '#' }}" aria-label="YouTube">y</a>
        <a href="{{ $contact['acf']['contact_linkedin'] ?? '#' }}" aria-label="LinkedIn">in</a>
    </div>
</footer>
