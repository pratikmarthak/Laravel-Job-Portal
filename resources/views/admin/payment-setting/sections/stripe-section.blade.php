<div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
    <div class="card">

        <form action="{{ route('admin.stripe-setting.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Stripe Status</label>
                        <select name="stripe_status" class="form-control {{ hasError($errors, 'stripe_status') }}">
                            <option @selected(config('gatewaySettings.stripe_status') === 'active') value="active">Active</option>
                            <option @selected(config('gatewaySettings.stripe_status') === 'inactive') value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('stripe_status')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Stripe Country Name</label>
                        <select name="stripe_country_name"
                            class="form-control select2 {{ hasError($errors, 'stripe_country_name') }}">
                            <option value="">select</option>
                            @foreach (config('countries') as $key => $country)
                                <option @selected($key === config('gatewaySettings.stripe_country_name')) value="{{ $key }}">{{ $country }}
                                </option>
                            @endforeach

                        </select>
                        <x-input-error :messages="$errors->get('stripe_country_name')" class="mt-2" />
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Stripe Country Currency</label>
                        <select name="stripe_country_currency"
                            class="form-control select2 {{ hasError($errors, 'stripe_country_currency') }}">
                            <option value="">select</option>

                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option @selected($currency === config('gatewaySettings.stripe_country_currency')) value="{{ $currency }}">{{ $currency }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('stripe_country_currency')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Stripe Country Rate</label>
                        <input type="text" name="stripe_country_rate"
                            value="{{ config('gatewaySettings.stripe_country_rate') }}"
                            class="form-control {{ hasError($errors, 'stripe_country_rate') }}">
                        <x-input-error :messages="$errors->get('stripe_country_rate')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Stripe Publishable key</label>
                        <input type="text" name="stripe_publishable_key"
                            value="{{ config('gatewaySettings.stripe_publishable_key') }}"
                            class="form-control {{ hasError($errors, 'stripe_publishable_key') }}">
                        <x-input-error :messages="$errors->get('stripe_publishable_key')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Stripe Secret Id</label>
                        <input type="text" name="stipe_secret_id"
                            value="{{ config('gatewaySettings.stipe_secret_id') }}"
                            class="form-control {{ hasError($errors, 'stipe_secret_id') }}">
                        <x-input-error :messages="$errors->get('stipe_secret_id')" class="mt-2" />
                    </div>
                </div>


            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">update</button>
            </div>
        </form>

    </div>
</div>
