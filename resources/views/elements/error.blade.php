@if($error)
<section class="section-wrap" style="color: red; text-align: center; margin-top: 100px; padding: 10px; border: 1px solid red;">
  <pre>{{ print_r($error) }}</pre>
</section>
@endif
