<section id="payment-section" class="payment-section section conf-bg-light">
    <div class="container">
        <h3 class="section-heading text-center mb-3">Organisation fee </h3>
        <div class="section-intro single-col-max mx-auto mb-4">{{ __('main.payment_includes')}}
<p class="mt-2">
  <p>To conclude a contract, go to the <a href="{{ route('agreement') }}" target="_blank">Agreement for the provision of services page</a>  and follow the attached instructions.</p>
</p>

        </div>
        

        <ul class="list-group mx-auto">
          <li class="list-group-item p-3  conf-bg-primary text-white">
            <div class="row">
              <div class="col-4">{{ __('main.pay_category') }}</div>
              <div class="col-4 text-end">{{ __('main.pay_early') }}</div>
              <div class="col-4 text-end">{{ __('main.pay_late') }}</div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-4">{{ __('main.full-time') }}</div>
              <div class="col-4 text-end">6000</div>
              <div class="col-4 text-end">7000</div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-4">{{ __('main.full-time_young') }}</div>
              <div class="col-4 text-end">4000</div>
              <div class="col-4 text-end">5000</div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-4">{{ __('main.remote') }}</div>
              <div class="col-4 text-end">2000</div>
              <div class="col-4 text-end"></div>
            </div>
          </li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-4">{{ __('main.accompanying') }}</div>
              <div class="col-4 text-end">4000</div>
              <div class="col-4 text-end">5000</div>
            </div>
          </li>
        </ul>
      


    </div><!--//container-->
</section><!--//payment-section-->