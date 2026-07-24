<section class="hero section-wrap">
    <div class="hero-copy reveal">
      <img class="hero-logo" src="{{asset('assets/images/aset-logo.png')}}" alt="Dualana">
      @if($banner && isset($banner['data'][0]))
        {!! $banner['data'][0]['content'] ?? '' !!}
        <div class="hero-actions">
          @if(isset($banner['data'][0]['acf']['banner_cta_1_link']))
            <a class="button primary" href="{{$banner['data'][0]['acf']['banner_cta_1_link']}}">  {{$banner['data'][0]['acf']['banner_cta_1_label'] ?? 'CTA 1'}} <span><i class="fa-regular fa-circle-check"></i></span></a>
          @endif
          @if(isset($banner['data'][0]['acf']['banner_cta_2_link']))
            <a class="button secondary" href="{{$banner['data'][0]['acf']['banner_cta_2_link']}}">{{$banner['data'][0]['acf']['banner_cta_2_label'] ?? 'CTA 2'}} <span><i class="fa-regular fa-circle-question"></i></span></a>
          @endif
        </div>
      @endif
    </div>
    <div class="hero-art reveal" aria-hidden="true">
      <img src="{{ ($banner && isset($banner['data'][0]['acf']['banner_image']['url'])) ? $banner['data'][0]['acf']['banner_image']['url'] : asset('assets/images/aset-hero.png') }}" alt="">
    </div>
</section>
