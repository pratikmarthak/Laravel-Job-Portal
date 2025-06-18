<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">

        <form action="{{ route('admin.paypal-setting.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Status</label>
                        <select name="paypal_status" class="form-control {{ hasError($errors, 'paypal_status') }}">
                            <option @selected(config('gatewaySettings.paypal_status') === 'active') value="active">Active</option>
                            <option @selected(config('gatewaySettings.paypal_status') === 'inactive') value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('paypal_status')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Account mode</label>
                        <select name="paypal_account_mode"
                            class="form-control {{ hasError($errors, 'paypal_account_mode') }}">
                            <option @selected(config('gatewaySettings.paypal_account_mode') === 'sandbox') value="sandbox">Sandbox</option>
                            <option @selected(config('gatewaySettings.paypal_account_mode') === 'live') value="live">Live</option>
                        </select>
                        <x-input-error :messages="$errors->get('paypal_account_mode')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Country Name</label>
                        <select name="paypal_country_name"
                            class="form-control select2 {{ hasError($errors, 'paypal_country_name') }}">
                            <option value="">select</option>
                            @foreach (config('countries') as $key => $country)
                                <option @selected($key === config('gatewaySettings.paypal_country_name')) value="{{ $key }}">{{ $country }}</option>
                            @endforeach

                        </select>
                        <x-input-error :messages="$errors->get('paypal_country_name')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Paypal Country Currency</label>
                        <select name="paypal_country_currency"
                            class="form-control select2 {{ hasError($errors, 'paypal_country_currency') }}">
                            <option value="">select</option>
                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option @selected($key === config('gatewaySettings.paypal_country_currency')) value="{{ $key }}">{{ $currency }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('paypal_country_currency')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Paypal Country Rate</label>
                        <input type="text" name="paypal_country_rate" value="{{ config('gatewaySettings.paypal_country_rate') }}"
                            class="form-control {{ hasError($errors, 'paypal_country_rate') }}">
                        <x-input-error :messages="$errors->get('paypal_country_rate')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Paypal Client Id</label>
                        <input type="text" name="paypal_client_id" value="{{ config('gatewaySettings.paypal_client_id') }}"
                            class="form-control {{ hasError($errors, 'paypal_client_id') }}">
                        <x-input-error :messages="$errors->get('paypal_client_id')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Paypal Secret Id</label>
                        <input type="text" name="paypal_client_secret" value="{{ config('gatewaySettings.paypal_client_secret') }}"
                            class="form-control {{ hasError($errors, 'paypal_client_secret') }}">
                        <x-input-error :messages="$errors->get('paypal_client_secret')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Paypal App Id</label>
                        <input type="text" name="paypal_app_id" value="{{ config('gatewaySettings.paypal_app_id') }}"
                            class="form-control {{ hasError($errors, 'paypal_app_id') }}">
                        <x-input-error :messages="$errors->get('paypal_app_id')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">update</button>
            </div>
        </form>

    </div>
</div>
