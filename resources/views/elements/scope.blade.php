<section class="scope fullscreen-section" id="scope">
        <div class="section-wrap scope-inner">
          <div class="scope-heading reveal">
            <h2>{{ $scope['data'][0]['title'] }}</h2>
            {!! $scope['data'][0]['content'] !!}
          </div>
          @php
            $scopeRegionGroup = $scope['data'][0]['acf']['scope_region_group'];
            $scopeLocations = $scope['data'][0]['acf']['scope_locations'];
          @endphp
          <div class="metrics reveal" aria-label="Coverage metrics">
            <strong><span>{{ $scopeRegionGroup['scope_region_group_provinces'] }}</span> Provinces</strong>
            <strong><span>{{ $scopeRegionGroup['scope_region_group_cities'] }}</span> Cities</strong>
            <strong><span>{{ $scopeRegionGroup['scope_region_group_districts'] }}</span> District</strong>
          </div>
          
          <div class="scope-map">
            @foreach($scopeLocations as $location)
            <div>
              <div class="pin-point" 
                  style="left: {{ $location['scope_locations_coordinate']['scope_locations_x'] }}%;
                        top: {{ $location['scope_locations_coordinate']['scope_locations_y'] }}%">
                <span class="popover">
                  <strong>{{ $location['scope_locations_province'] }}</strong>
                  <small>{{ $location['scope_locations_city'] }}</small>
                </span>
              </div>
            </div>
            @endforeach
            <img src="{{ asset('assets/images/aset-peta.png') }}" alt="Indonesia Map" usemap="#indonesia-map" class="indonesia-map">
          </div>
        </div>
      </section>