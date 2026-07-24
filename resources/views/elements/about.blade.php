@if($profile && isset($profile['data'][0]))
<section class="about section-wrap" id="about" style="background-image: url(../assets/images/bg-people.png);">
  <div class="about-copy reveal">
    {!! $profile['data'][0]['content'] ?? '' !!}
  </div>
  <div class="about-media reveal">
      <img class="photo-main" src="{{ $profile['data'][0]['acf']['about_image_1']['url'] ?? asset('assets/images/img-about1.png')}}" alt="Dualana planning session">
      <img class="photo-tall" src="{{ $profile['data'][0]['acf']['about_image_2']['url'] ?? asset('assets/images/img-about2.png')}}" alt="Dualana credential material">
  </div>
</section>
@endif
