 <section class="projects section-wrap" id="projects">
  <div class="section-heading left reveal">
    <h2>{{ $projects['data'][0]['title'] }}</h2>
    {!! $projects['data'][0]['content'] !!}
  </div>
  <div class="project-grid">
    @foreach($projects['data'][0]['acf']['project_list'] as $key => $project)
      @php
        $gallery_data = array_map(function($image) {
          return $image['project_list_gallery_image']['url'];
        }, $project['project_list_gallery']);
        $gallery_description = array_map(function($desc) {
          return $desc['project_list_gallery_caption'];
        }, $project['project_list_gallery']);
      @endphp
    <article class="project-tile project-{{ $key + 1 }} reveal"
      data-title="{{ $project['project_list_title'] }}" 
      data-description="{{ json_encode($gallery_description) }}"
      data-gallery='{{ json_encode($gallery_data) }}'>
      <img src="{{ $gallery_data[0] }}" alt="{{ $project['project_list_title'] }}">
      <div class="project-overlay">
        <h3>{{ $project['project_list_title'] }}</h3>
        <p>{{ $project['project_list_gallery_deskripsi'] }}</p>
        <button class="project-btn" type="button"> View Project</button>
      </div>
    </article>
    @endforeach
  </div>
</section>

<!-- Fullscreen Modal for Projects -->
<div id="lightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Project Gallery">
  <div class="lightbox-body">
    <button class="nav-arrow prev" id="galleryPrev" type="button" aria-label="Previous image"><i class="fa-solid fa-chevron-left"></i></button>
    <div class="gallery-content">
      <div class="lightbox-header">
        <button class="close-btn" id="galleryClose">
          <span><i class="fa-solid fa-x"></i></span><span>Close</span>
        </button>
        <div class="gallery-counter" id="galleryCounter">1 / 12</div>
      </div>
      <div class="image-frame">
        <img id="galleryImage" src="" alt="">
      </div>
      <div class="gallery-info">
        <h2 id="galleryTitle"></h2>
        <p id="galleryDescription"></p>
      </div>
    </div>
    <button class="nav-arrow next" id="galleryNext" type="button" aria-label="Next image"><i class="fa-solid fa-chevron-right"></i></button>
  </div>
</div>