@if($services && isset($services['data'][0]))
<section class="services section-wrap" id="services">
  <div class="section-heading reveal">
    <h2>{{ $services['data'][0]['title'] }}</h2>
    {!! $services['data'][0]['content'] !!}
  </div>

  <div class="grid">
    @foreach($services['data'][0]['acf']['project_list'] as $key => $service)
      @php
        $gallery_data = array_map(function($image) {
          return $image['project_list_gallery_image']['url'];
        }, $service['project_list_gallery']);
      @endphp
    <div class="card" tabindex="0" data-index="{{ $key + 1 }}" data-gallery="{{ json_encode($gallery_data) }}" data-title="{{ $service['project_list_title'] }}" 
      data-body="{{ $service['project_list_gallery_deskripsi'] }}"
    >
      <img src="{{ $gallery_data[0] }}" alt="{{ $service['project_list_title'] }}">
      <div class="card-overlay">
        <h3 class="card-title">{{ $service['project_list_title'] }}</h3>
        <button class="card-btn" type="button" data-open="{{ $key }}">See the detail</button>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif

<!-- Fullscreen Modal for Services -->
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
  <button class="modal-close" id="modalClose" type="button" aria-label="Close"><i class="fa-solid fa-x"></i></button>
</div>