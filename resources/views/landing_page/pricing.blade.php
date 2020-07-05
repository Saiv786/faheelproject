@extends('landing_page.layout')

@section('body-content')

<style type="text/css">
	.pricing-slider {
  max-width: 280px;
  margin: 0 auto;
}

.form-slider span {
  display: block;
  font-weight: 500;
  text-align: center;
  margin-bottom: 16px;
}

.pricing-slider {
  margin-bottom: 48px;
}

.pricing-slider {
  max-width: 280px;
  margin-left: auto;
  margin-right: auto;
  position: relative;
}
.pricing-slider input {
  width: 100%;
}
.pricing-slider .pricing-slider-value {
  position: absolute;
  font-size: 14px;
  line-height: 22px;
  font-weight: 500;
  color: #909cb5;
  margin-top: 8px;
  --thumb-size: 36px;
}
.pricing-items {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-right: -12px;
  margin-left: -12px;
  margin-top: -12px;
}
.pricing-item {
  flex-basis: 280px;
  max-width: 280px;
  box-sizing: content-box;
  padding: 12px;
}
.pricing-item-inner {
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  height: 100%;
  padding: 24px;
  box-shadow: 0 8px 16px rgba(46, 52, 88, 0.16);
}
.pricing-item-title {
  font-weight: 500;
}
.pricing-item-price {
  display: inline-flex;
  align-items: baseline;
  font-size: 20px;
}
.pricing-item-price-amount {
  font-size: 36px;
  line-height: 48px;
  font-weight: 500;
  color: #191e2a;
}
.pricing-item-features-list {
  list-style: none;
  padding: 0;
}
.pricing-item-features-list li {
  margin-bottom: 0;
  padding: 14px 0;
  position: relative;
  display: flex;
  align-items: center;
}
.pricing-item-features-list li::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  display: block;
  height: 1px;
  background: #e9ecf8;
}
.pricing-item-features-list li::after {
  content: "";
  display: block;
  width: 24px;
  height: 24px;
  margin-right: 12px;
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M5%2011h14v2H5z%22%20fill%3D%22%239298B8%22%20fill-rule%3D%22nonzero%22%2F%3E%3C%2Fsvg%3E");
  background-repeat: no-repeat;
  -webkit-box-ordinal-group: 0;
  order: -1;
}
.pricing-item-features-list li.is-checked::after {
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2224%22%20height%3D%2224%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill-rule%3D%22nonzero%22%20fill%3D%22none%22%3E%3Ccircle%20fill%3D%22%2300C2A9%22%20cx%3D%2212%22%20cy%3D%2212%22%20r%3D%2212%22%2F%3E%3Cpath%20fill%3D%22%23fff%22%20d%3D%22M10.5%2012.267l-2.5-1.6-1%201.066L10.5%2016%2017%209.067%2016%208z%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E");
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
      height: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
#subscription_pricing{
  /*display: none;*/
}

</style>

		<!-- Navigation area starts -->
        	@include('landing_page.nav_bar_2')
		    <!-- Navigation area ends -->
<section id="about-1" class="wide-60 about-section division">
	<div class="container">
    <div style="display: flex; margin-bottom: 10%">
      <span style="margin-right: 2%;"><b>Switch to Subscription Pricing</b></span>
      <label class="switch">
        <input id="sub_switcher" type="checkbox">
        <span class="slider round"></span>
      </label>
    </div>
    <div style="display: flex">
  		<div id="regular_pricing" class="pricing" style="flex: 1">
  		      <div class="pricing-slider">
  		        <label class="form-slider">
  		          <span>How many E-mails do you want?</span>
  		          <input
  		            type="range"
  		            value="1"
  		            data-price-input='{
  		                "0": "30000",
  		                "1": "50000",
  		                "2": "75000",
  		                "3": "100000",
  		                "4": "150000",
  		                "5": "200000",
  		                "6": "400000",
  		                "7": "600000",
  		                "8": "800000",
  		                "9": "1000000",
                      "10": "1500000",
                      "11": "2000000",
                      "12": "2500000",
                      "13": "3000000",
                      "14": "3500000",
                      "15": "4000000",
                      "16": "4500000",
                      "17": "5000000"                      
  		              }'
  		          />
  		        </label>
  		        <div class="pricing-slider-value"></div>
  		      </div>
  		      <div class="pricing-items">
  		        <div class="pricing-item">
  		          <div class="pricing-item-inner">
  		            <div class="pricing-item-content">
  		              <div class="pricing-item-header">
  		                <div class="pricing-item-title">Regular Pricing</div>
  		                <div
  		                  class="pricing-item-price"
  		                  data-price-output='{
  		                    "0": ["$", "10", "/m"],
  		                    "1": ["$", "14", "/m"],
  		                    "2": ["$", "22", "/m"],
  		                    "3": ["$", "30", "/m"],
  		                    "4": ["$", "42", "/m"],
  		                    "5": ["$", "50", "/m"],
  		                    "6": ["$", "100", "/m"],
  		                    "7": ["$", "140", "/m"],
  		                    "8": ["$", "180", "/m"],
  		                    "9": ["$", "220", "/m"],
                          "10": ["$", "300", "/m"],
                          "11": ["$", "380", "/m"],
                          "12": ["$", "460", "/m"],
                          "13": ["$", "530", "/m"],
                          "14": ["$", "580", "/m"],
                          "15": ["$", "670", "/m"],
                          "16": ["$", "740", "/m"],
                          "17": ["$", "810", "/m"]
  		                  }'
  		                >
  		                  <span class="pricing-item-price-currency"></span>
  		                  <span class="pricing-item-price-amount"></span>
  		                  <span class="pricing-item-price-after"></span>
  		                </div>
  		              </div>
  		              <div class="pricing-item-features">
  		                <ul class="pricing-item-features-list">
  		                  <li class="is-checked">Excepteur sint occaecat</li>
  		                  <li>Excepteur sint occaecat</li>
  		                </ul>
  		              </div>
  		            </div>
  		            <div class="pricing-item-cta">
  		              <a class="button" href="#">Buy Now</a>
  		            </div>
  		          </div>
  		        </div>
  		      </div>
  		</div>
      <div id="subscription_pricing" class="pricing" style="flex: 1">
            <div class="pricing-slider">
              <label class="form-slider">
                <span>How many E-mails do you want?</span>
                <input
                  type="range"
                  value="1"
                  data-price-input='{
                      "0": "5000",
                      "1": "10000",
                      "2": "20000",
                      "3": "30000",
                      "4": "40000",
                      "5": "50000",
                      "6": "75000",
                      "7": "100000",
                      "8": "125000",
                      "9": "150000",
                      "10": "175000",
                      "11": "200000",
                      "12": "250000",
                      "13": "300000",
                      "14": "400000",
                      "15": "500000",
                      "16": "600000",
                      "17": "700000",
                      "18": "800000",                      
                      "19": "900000",                      
                      "20": "1000000"                     
                    }'
                />
              </label>
              <div class="pricing-slider-value"></div>
            </div>
            <div class="pricing-items">
              <div class="pricing-item">
                <div class="pricing-item-inner">
                  <div class="pricing-item-content">
                    <div class="pricing-item-header">
                      <div class="pricing-item-title">Subscription Pricing</div>
                      <div
                        class="pricing-item-price"
                        data-price-output='{
                          "0": ["$", "15", "/m"],
                          "1": ["$", "30", "/m"],
                          "2": ["$", "45", "/m"],
                          "3": ["$", "60", "/m"],
                          "4": ["$", "75", "/m"],
                          "5": ["$", "90", "/m"],
                          "6": ["$", "105", "/m"],
                          "7": ["$", "130", "/m"],
                          "8": ["$", "160", "/m"],
                          "9": ["$", "190", "/m"],
                          "10": ["$", "240", "/m"],
                          "11": ["$", "270", "/m"],
                          "12": ["$", "310", "/m"],
                          "13": ["$", "350", "/m"],
                          "14": ["$", "470", "/m"],
                          "15": ["$", "590", "/m"],
                          "16": ["$", "700", "/m"],
                          "17": ["$", "810", "/m"],
                          "18": ["$", "930", "/m"],
                          "19": ["$", "1050", "/m"],
                          "20": ["$", "1200", "/m"]
                        }'
                      >
                        <span class="pricing-item-price-currency"></span>
                        <span class="pricing-item-price-amount"></span>
                        <span class="pricing-item-price-after"></span>
                      </div>
                    </div>
                    <div class="pricing-item-features">
                      <ul class="pricing-item-features-list">
                        <li class="is-checked">Excepteur sint occaecat</li>
                        <li>Excepteur sint occaecat</li>
                      </ul>
                    </div>
                  </div>
                  <div class="pricing-item-cta">
                    <a class="button" href="#">Buy Now</a>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
	</div>
</section>



<script type="text/javascript">
	(function() {
  const pricingSliders = document.querySelectorAll(".pricing-slider");

  if (pricingSliders.length > 0) {
    for (let i = 0; i < pricingSliders.length; i++) {
      const pricingSlider = pricingSliders[i];

      // Build the input object
      const pricingInput = {
        el: pricingSlider.querySelector("input")
      };
      pricingInput.data = JSON.parse(
        pricingInput.el.getAttribute("data-price-input")
      );
      pricingInput.currentValEl = pricingSlider.querySelector(
        ".pricing-slider-value"
      );
      pricingInput.thumbSize = parseInt(
        window
          .getComputedStyle(pricingInput.currentValEl)
          .getPropertyValue("--thumb-size"),
        10
      );

      // Build the output array
      const pricingOutputEls = pricingSlider.parentNode.querySelectorAll(
        ".pricing-item-price"
      );
      const pricingOutput = [];
      for (let i = 0; i < pricingOutputEls.length; i++) {
        const pricingOutputEl = pricingOutputEls[i];
        const pricingOutputObj = {};
        pricingOutputObj.currency = pricingOutputEl.querySelector(
          ".pricing-item-price-currency"
        );
        pricingOutputObj.amount = pricingOutputEl.querySelector(
          ".pricing-item-price-amount"
        );
        pricingOutputObj.after = pricingOutputEl.querySelector(
          ".pricing-item-price-after"
        );
        pricingOutputObj.data = JSON.parse(
          pricingOutputEl.getAttribute("data-price-output")
        );
        pricingOutput.push(pricingOutputObj);
      }

      pricingInput.el.setAttribute("min", 0);
      pricingInput.el.setAttribute(
        "max",
        Object.keys(pricingInput.data).length - 1
      );
      !pricingInput.el.getAttribute("value") &&
        pricingInput.el.setAttribute("value", 0);

      handlePricingSlider(pricingInput, pricingOutput);
      window.addEventListener("input", function() {
        handlePricingSlider(pricingInput, pricingOutput);
      });
    }
  }

  function handlePricingSlider(input, output) {
    // output the current slider value
    if (input.currentValEl)
      input.currentValEl.innerHTML = input.data[input.el.value];
    // update prices
    for (let i = 0; i < output.length; i++) {
      const outputObj = output[i];
      if (outputObj.currency)
        outputObj.currency.innerHTML = outputObj.data[input.el.value][0];
      if (outputObj.amount)
        outputObj.amount.innerHTML = outputObj.data[input.el.value][1];
      if (outputObj.after)
        outputObj.after.innerHTML = outputObj.data[input.el.value][2];
    }
    handleSliderValuePosition(input);
  }

  function handleSliderValuePosition(input) {
    const multiplier = input.el.value / input.el.max;
    const thumbOffset = input.thumbSize * multiplier;
    const priceInputOffset =
      (input.thumbSize - input.currentValEl.clientWidth) / 2;
    input.currentValEl.style.left =
      input.el.clientWidth * multiplier - thumbOffset + priceInputOffset + "px";
  }
})();

document.getElementById("sub_switcher").addEventListener("checked", function(){

  if(document.getElementById("sub_switcher").checked = true)
  {
    document.getElementById("subscription_pricing").style.display = block;
    document.getElementById("regular_pricing").style.display = none;
  }
});

document.getElementById("sub_switcher").addEventListener("unchecked", function(){

  if(document.getElementById("sub_switcher").unchecked = true)
  {
    document.getElementById("subscription_pricing").style.display = none;
    document.getElementById("regular_pricing").style.display = block;
  }
});

</script>
@endsection
