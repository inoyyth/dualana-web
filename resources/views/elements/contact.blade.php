@php
  $contact = $contactUs['data'][0] ?? null;
@endphp

<section class="contact-band" id="contact">
  <div class="section-wrap contact-inner">
    <div> 
      <h2>{{ $contactUs['data'][0]['title'] }}</h2>
      {!! $contactUs['data'][0]['content'] !!}
    </div>
    <a class="support-button" href="mailto:{{ $contactUs['data'][0]['acf']['contact_email'] ?? 'hello@dualana.id' }}">
      {{ $contactUs['data'][0]['acf']['contact_cta_label'] ?? 'Contact Our Support' }} <span aria-hidden="true">◔</span>
    </a>
  </div>
</section>
