@if($scope && isset($scope['data'][0]))
<section class="scope fullscreen-section" id="scope">
        <div class="section-wrap scope-inner">
          <div class="scope-heading reveal">
            <h2>{{ $scope['data'][0]['title'] }}</h2>
            {!! $scope['data'][0]['content'] !!}
          </div>
          @php
            $scopeRegionGroup = $scope['data'][0]['acf']['scope_region_group'] ?? null;
            $scopeLocations = $scope['data'][0]['acf']['scope_locations'] ?? [];
          @endphp
          @if($scopeRegionGroup)
          <div class="metrics reveal" aria-label="Coverage metrics">
            <strong><span>{{ $scopeRegionGroup['scope_region_group_provinces'] ?? 0 }}</span> Provinces</strong>
            <strong><span>{{ $scopeRegionGroup['scope_region_group_cities'] ?? 0 }}</span> Cities</strong>
            <strong><span>{{ $scopeRegionGroup['scope_region_group_districts'] ?? 0 }}</span> District</strong>
          </div>
          @endif
          
          <div class="scope-map">
            @foreach($scopeLocations as $location)
            <div>
              <div class="pin-point" 
                  style="left: {{ $location['scope_locations_coordinate']['scope_locations_x'] ?? 0 }}%;
                        top: {{ $location['scope_locations_coordinate']['scope_locations_y'] ?? 0 }}%">
                <span class="popover">
                  <strong>{{ $location['scope_locations_province'] ?? '' }}</strong>
                  <small>{{ $location['scope_locations_city'] ?? '' }}</small>
                </span>
              </div>
            </div>
            @endforeach
            <img src="{{ asset('assets/images/aset-peta.png') }}" alt="Indonesia Map" usemap="#indonesia-map" class="indonesia-map">
          </div>
        </div>
      </section>
@endif