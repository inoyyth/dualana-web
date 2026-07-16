<section class="trust-band" aria-label="Trusted by industry leaders">
  <p>Trusted by industry leaders</p>
  <div class="partner-carousel" aria-label="Industry leader logos">
    <div class="partner-row">
      @if($clients && isset($clients['data']))
        @foreach($clients['data'] as $client)
          <img src="{{ $client['acf']['client_image_1']['url'] }}" alt="{{ $client['acf']['client_image_1']['alt'] }}"/>
        @endforeach
      @endif
    </div>
  </div>
</section>
