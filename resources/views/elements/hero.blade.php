<section class="hero section-wrap">
    <div class="hero-copy reveal">
      <img class="hero-logo" src="{{asset('assets/images/aset-logo.png')}}" alt="Dualana">
      @if($banner && $banner['data'][0]['content'])
        {!! $banner['data'][0]['content'] !!}
      @endif
      <div class="hero-actions">
        <a class="button primary" href="{{$banner['data'][0]['acf']['banner_cta_1_link']}}">  {{$banner['data'][0]['acf']['banner_cta_1_label']}} <span><i class="fa-regular fa-circle-check"></i></span></a>
        <a class="button secondary" href="{{$banner['data'][0]['acf']['banner_cta_2_link']}}">{{$banner['data'][0]['acf']['banner_cta_2_label']}} <span><i class="fa-regular fa-circle-question"></i></span></a>
      </div>
    </div>
    <div class="hero-art reveal" aria-hidden="true">
      <img src="{{ $banner['data'][0]['acf']['banner_image']['url'] ?? asset('assets/images/aset-hero.png') }}" alt="">
    </div>
</section>
