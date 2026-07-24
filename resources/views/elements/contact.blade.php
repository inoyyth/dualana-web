@php
  $contact = $contactUs['data'][0] ?? null;
@endphp

@if($contact)
<section class="contact-band" id="contact">
  <div class="section-wrap contact-inner">
    <div> 
      <h2>{{ $contact['title'] ?? '' }}</h2>
      {!! $contact['content'] ?? '' !!}
    </div>
    <a class="support-button" href="mailto:{{ $contact['acf']['contact_email'] ?? 'hello@dualana.id' }}">
      {{ $contact['acf']['contact_cta_label'] ?? 'Contact Our Support' }} <span><i class="fa-brands fa-whatsapp"></i></span>
    </a>
  </div>
</section>
@endif
