@extends('layouts.app')

@php
  $jsServices = [];
  if (isset($services) && !empty($services['data'])) {
      foreach ($services['data'] as $index => $service) {
          $jsServices[$index] = [
              'index' => sprintf("%02d", $index + 1),
              'image' => $service['featured_media'][0]['source_url'],
              'title' => $service['title'],
              'body' => html_entity_decode(strip_tags($service['content']), ENT_QUOTES, 'UTF-8'),
          ];
      }
  }
@endphp

@section('title', $title ?? 'Layered Architecture')

@section('content')

  
    @if($error)
    <section class="section-wrap" style="color: red; text-align: center; margin-top: 100px; padding: 10px; border: 1px solid red;">
      <pre>{{ print_r($error) }}</pre>
    </section>
    @endif

  <section class="hero section-wrap">
      <div class="hero-copy reveal">
        <img class="hero-logo" src="{{asset('assets/images/aset-logo.png')}}" alt="Dualana">
        <div class="pill-row" aria-label="Capabilities">
          @if ($banner && !empty($banner['data'][0]['acf']['banner_tag']))
            @foreach (explode(',', $banner['data'][0]['acf']['banner_tag']) as $item)   
              <span>{{ $item }}</span>
            @endforeach
          @endif
        </div>
        <div class="hero-actions">
          <a class="button primary" href="#projects">Our Credential <span aria-hidden="true">+</span></a>
          <a class="button secondary" href="#about">Learn More <span aria-hidden="true">○</span></a>
        </div>
      </div>
      <div class="hero-art reveal" aria-hidden="true">
        <img src="{{ $banner['acf']['banner_image']['url'] ?? asset('assets/images/aset-hero.png') }}" alt="">
      </div>
  </section>

  <section class="trust-band" aria-label="Trusted by industry leaders">
    <p>Trusted by industry leaders</p>
    <div class="partner-carousel" aria-label="Industry leader logos">
      <div class="partner-row">
        @if($clients && isset($clients['data']))
          @foreach($clients['data'] as $client)
            <span>{{ $client['title'] }}</span>
          @endforeach
        @endif
      </div>
    </div>
  </section>

  <section class="about section-wrap" id="about">
    <div class="about-copy reveal">
      @if($profile)
        {!! $profile['data'][0]['content'] !!}
      @endif
    </div>
    <div class="about-media reveal">
        <img class="photo-main" src="{{ $profile['data'][0]['acf']['about_image_1']['url'] ?? asset('assets/images/img-about1.png')}}" alt="Dualana planning session">
        <img class="photo-tall" src="{{ $profile['data'][0]['acf']['about_image_2']['url'] ?? asset('assets/images/img-about2.png')}}" alt="Dualana credential material">
    </div>
  </section>

  <section class="services section-wrap" id="services">
    
    <div class="section-heading reveal">
      <h2>Services</h2>
      <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
    </div>

    <div class="grid">
      @if ($services && !empty($services['data']))
        @foreach ($services['data'] as $index => $service)
        @if($service['featured_media'][0]['source_url'])
        <div class="card" tabindex="0" data-service="{{ $index }}">
          <img src="{{ $service['featured_media'][0]['source_url'] }}" alt="{{ $service['title'] }}">
          <div class="card-overlay">
            <h3 class="card-title">{{ $service['title'] }}</h3>
            <button class="card-btn" type="button" data-open="{{ $index }}">See the detail</button>
          </div>
        </div>
        @endif
        @endforeach
      @endif
    </div>

  </section>

  <section class="scope fullscreen-section" id="scope">
    <div class="section-wrap scope-inner">
      <div class="scope-heading reveal">
        <h2>Scope</h2>
        <p>We have a professional team and partner network across all regions of Indonesia.</p>
      </div>
      <div class="metrics reveal" aria-label="Coverage metrics">
        <strong><span>20</span> Provinces</strong>
        <strong><span>100</span> Cities</strong>
        <strong><span>500</span> District</strong>
      </div>
      <div class="map-wrap reveal">
        <img src="{{ asset('assets/images/aset-peta.png') }}" alt="Indonesia coverage map">
        <span class="pin pin-one"></span>
        <span class="pin pin-two"></span>
        <span class="pin pin-three"></span>
        <span class="pin pin-four"></span>
        <span class="map-label">Makassar, Sulawesi Selatan</span>
      </div>
    </div>
  </section>

  <section class="projects section-wrap" id="projects">
    <div class="section-heading left reveal">
      <h2>Projects</h2>
      <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
    </div>
    <div class="project-grid">
      <article class="project-tile project-1 reveal">
        <img src="{{ asset('assets/images/imgprojects2.png') }}" alt="Exhibition booth project">
        <div class="project-overlay">
          <h3>Indocomtech</h3>
          <p>Portable Booth • Backwall • Entrance Gate</p>
          <a href="#" class="project-btn"> View Project</a>
        </div>
      </article>
      <article class="project-tile project-2 reveal">
        <img src="{{ asset('assets/images/imgprojects1.png') }}" alt="Indocomtech exhibition project">
        <div class="project-overlay">
          <h3>Indocomtech</h3>
          <p>Portable Booth • Backwall • Entrance Gate</p>
          <a href="#" class="project-btn"> View Project</a>
        </div>
      </article>
      <article class="project-tile project-3 reveal">
        <img src="{{ asset('assets/images/imgprojects3.png') }}" alt="Audience event project">
        <div class="project-overlay">
          <h3>Indocomtech</h3>
          <p>Portable Booth • Backwall • Entrance Gate</p>
          <a href="#" class="project-btn"> View Project</a>
        </div>
      </article>
      <article class="project-tile project-4 reveal">
        <img src="{{ asset('assets/images/imgprojects4.png') }}" alt="Red brand booth display">
        <div class="project-overlay">
          <h3>Indocomtech</h3>
          <p>Portable Booth • Backwall • Entrance Gate</p>
          <a href="#" class="project-btn"> View Project</a>
        </div>
      </article>
      <article class="project-tile project-5 reveal">
        <img src="{{ asset('assets/images/imgprojects5.png') }}" alt="Yellow activation props">
        <div class="project-overlay">
          <h3>Indocomtech</h3>
          <p>Portable Booth • Backwall • Entrance Gate</p>
          <a href="#" class="project-btn"> View Project</a>
        </div>
      </article>
    </div>
  </section>

  <section class="testimonials section-wrap">
    <div class="section-heading left reveal">
      <h2>Testimonial</h2>
      <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
    </div>
    <div class="testimonial-grid">
      <article class="quote-card reveal">
        <span class="avatar" aria-hidden="true">◎</span>
        <h3>Lorem Ipsum Dolor Sit Amet</h3>
        <p>Lorem ipsum dolor sit amet consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis.</p>
        <strong>Stephanie Powell</strong>
        <small>VP of Sales at Salesforce</small>
      </article>
      <article class="quote-card reveal">
        <span class="avatar" aria-hidden="true">◎</span>
        <h3>Lorem Ipsum Dolor Sit Amet</h3>
        <p>Lorem ipsum dolor sit amet consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis.</p>
        <strong>Stephanie Powell</strong>
        <small>VP of Sales at Salesforce</small>
      </article>
      <article class="quote-card reveal">
        <span class="avatar" aria-hidden="true">◎</span>
        <h3>Lorem Ipsum Dolor Sit Amet</h3>
        <p>Lorem ipsum dolor sit amet consectetur eget maecenas sapien fusce egestas risus purus suspendisse turpis.</p>
        <strong>Stephanie Powell</strong>
        <small>VP of Sales at Salesforce</small>
      </article>
    </div>
  </section>

  <section class="contact-band" id="contact">
    <div class="section-wrap contact-inner">
      <div>
        <h2>Contact Us</h2>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      </div>
      <a class="support-button" href="mailto:hello@dualana.id">Contact Our Support <span aria-hidden="true">◔</span></a>
    </div>
</section>

@endsection

@section('footer')
<div class="modal" id="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
  <div class="modal-backdrop"></div>
  <div class="modal-inner">
    <div class="modal-media">
      <img id="modalImage" src="" alt="">
    </div>
    <div class="modal-text">
      <span class="modal-index" id="modalIndex"></span>
      <h2 class="modal-title" id="modalTitle"></h2>
      <!-- 
        -->
      <p class="modal-body" id="modalBody"></p>
    </div>
  </div>
  <button class="modal-close" id="modalClose" type="button" aria-label="Close">&times;</button>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const services = @json($jsServices);
    const modal = document.getElementById("modal");
    const modalImage = document.getElementById("modalImage");
    const modalIndex = document.getElementById("modalIndex");
    const modalTitle = document.getElementById("modalTitle");
    const modalBody = document.getElementById("modalBody");
    const modalClose = document.getElementById("modalClose");

    let lastFocused = null;

    function openModal(i) {
        const data = services[i];
        if (!data || !modal || !modalImage || !modalIndex || !modalTitle || !modalBody || !modalClose) return;
        modalImage.src = data.image;
        modalImage.alt = data.title;
        modalIndex.textContent = data.index;
        modalTitle.textContent = data.title;
        modalBody.textContent = data.body;

        lastFocused = document.activeElement;
        document.body.classList.add("modal-open");
        modal.classList.add("is-open");
        modalClose.focus();
    }

    function closeModal() {
        if (!modal) return;
        modal.classList.remove("is-open");
        document.body.classList.remove("modal-open");
        if (lastFocused) lastFocused.focus();
    }

    document.querySelectorAll("[data-open]").forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.stopPropagation();
            openModal(Number(btn.dataset.open));
        });
    });

    // Clicking the card itself (outside the button) also opens its modal
    document.querySelectorAll(".card").forEach((card) => {
        card.addEventListener("click", () =>
            openModal(Number(card.dataset.service)),
        );
        card.addEventListener("keydown", (e) => {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                openModal(Number(card.dataset.service));
            }
        });
    });

    if (modal && modalClose) {
        modalClose.addEventListener("click", closeModal);
        const backdrop = modal.querySelector(".modal-backdrop");
        if (backdrop) {
            backdrop.addEventListener("click", closeModal);
        }
    }

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && modal && modal.classList.contains("is-open")) {
            closeModal();
        }
    });
});
</script>
@endsection
