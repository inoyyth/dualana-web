<section class="scope fullscreen-section" id="scope">
        <div class="section-wrap scope-inner">
          <div class="scope-heading reveal">
            <h2>Scope</h2>
            <p>We have a professional team and partner network across all regions of Indonesia.</p>
          </div>
          <div class="metrics reveal" aria-label="Coverage metrics">
            <strong><span>20</span> Provinces</strong>
            <strong><span>100</span> Cities</strong>
            <strong><span>500</span> District</strong>
          </div>
          
          <div class="scope-map">
            <span class="pin pin-medan"></span>
            <span class="pin pin-jakarta"></span>
            <span class="pin pin-balikpapan"></span>
            <span class="pin pin-makasar"></span>
            <span class="pin pin-surabaya"></span>
            <span class="pin pin-denpasar"></span>
            <span class="pin pin-jayapura"></span>

            <img src="{{ asset('assets/images/aset-peta.png') }}" alt="Indonesia Map" usemap="#indonesia-map" class="indonesia-map">

            <map name="indonesia-map">
              <area shape="circle"
                coords="89,53,10"
                href="#"
                alt="Medan"
                data-city="Medan"
                data-region="Sumatera Utara">
              <area shape="circle"
                coords="308,316,10"
                href="#"
                alt="Jakarta"
                data-city="Jakarta"
                data-region="DKI Jakarta">
              <area shape="circle"
                coords="476,356,10"
                href="#"
                alt="Surabaya"
                data-city="Surabaya"
                data-region="Jawa Timur">
              <area shape="circle"
                coords="569,188,10"
                href="#"
                alt="Balikpapan"
                data-city="Balikpapan"
                data-region="Kalimantan Timur">
              <area shape="circle"
                coords="652,286,10"
                href="#"
                alt="Makassar"
                data-city="Makassar"
                data-region="Sulawesi Selatan">
              <area shape="circle"
                coords="529,373,10"
                href="#"
                alt="Denpasar"
                data-city="Denpasar"
                data-region="Bali">
              <area shape="circle"
                coords="1198,218,10"
                href="#"
                alt="Jayapura"
                data-city="Jayapura"
                data-region="Papua">
            </map>

            <div id="mapPopup" class="map-popup">
              <h4 id="popupCity"></h4>
              <p id="popupRegion"></p>
            </div>

          </div>
        </div>
      </section>