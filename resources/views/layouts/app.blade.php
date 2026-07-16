<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="icon" href="{{ asset('assets/aset-logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
    <x-header />

    <main id="home">
        @yield('content')
    </main>

    <x-footer>
        @yield('footer', '© ' . date('Y') . ' Dualana Web')
    </x-footer>

    <!-- Lightbox / Gallery Modal for Projects -->
    <div class="lightbox" id="lightbox" role="dialog" aria-modal="true">
      <div class="lightbox-header">
        <span class="gallery-title" id="galleryTitle"></span>
        <button class="close-btn" id="galleryClose" type="button" aria-label="Close">
          <span>Close <i class="fa-solid fa-xmark"></i></span>
        </button>
      </div>
      <div class="lightbox-body">
        <button class="nav-arrow prev" id="galleryPrev" type="button" aria-label="Previous">
          <i class="fa-solid fa-chevron-left"></i>
        </button>
        <div class="gallery-content">
          <div class="image-frame">
            <img id="galleryImage" src="" alt="">
          </div>
          <div class="gallery-info">
            <p id="galleryDescription"></p>
          </div>
        </div>
        <button class="nav-arrow next" id="galleryNext" type="button" aria-label="Next">
          <i class="fa-solid fa-chevron-right"></i>
        </button>
      </div>
      <div class="lightbox-footer">
        <span class="gallery-counter" id="galleryCounter"></span>
      </div>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
