@if($testimonials && isset($testimonials['data'][0]))
<section class="testimonials section-wrap" id="testimonials">
  <div class="section-heading left reveal">
    <h2>{{ $testimonials['data'][0]['title'] }}</h2>
    {!! $testimonials['data'][0]['content'] !!}
  </div>
  <div class="testimonial-grid">
    @if(isset($testimonials['data'][0]['acf']['testimonial_list']))
      @foreach($testimonials['data'][0]['acf']['testimonial_list'] as $key => $testimonial)
      <article class="quote-card reveal">
        <div class="avatar">
          <img src="{{ $testimonial['testimonial_list_image'] ? $testimonial['testimonial_list_image']['url'] : asset('assets/images/aset-placeholder.png') }}" 
                alt="{{ $testimonial['testimonial_list_title'] }}" 
                loading="lazy" 
                onerror="this.src='{{ asset('assets/images/aset-placeholder.png') }}'">
        </div>
        <h3>{{ $testimonial['testimonial_list_title'] }}</h3>
        <p>{{ $testimonial['testimonial_list_description'] }}</p> 
        <strong>{{ $testimonial['testimonial_list_name'] }}</strong>
        <small>{{ $testimonial['testimonial_list_role'] }}</small>
      </article>
      @endforeach
    @endif
  </div>
</section>
@endif
