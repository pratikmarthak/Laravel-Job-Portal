<div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
    <div class="card">

        <form action="{{ route('admin.razorpay-setting.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Razorpay Status</label>
                        <select name="razorpay_status" class="form-control {{ hasError($errors, 'razorpay_status') }}">
                            <option @selected(config('gatewaySettings.razorpay_status') === 'active') value="active">Active</option>
                            <option @selected(config('gatewaySettings.razorpay_status') === 'inactive') value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('razorpay_status')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Razorpay Country Name</label>
                        <select name="razorpay_country_name"
                            class="form-control select2 {{ hasError($errors, 'razorpay_country_name') }}">
                            <option value="">select</option>
                            @foreach (config('countries') as $key => $country)
                                <option @selected($key === config('gatewaySettings.razorpay_country_name')) value="{{ $key }}">{{ $country }}
                                </option>
                            @endforeach

                        </select>
                        <x-input-error :messages="$errors->get('razorpay_country_name')" class="mt-2" />
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Razorpay Country Currency</label>
                        <select name="razorpay_country_currency"
                            class="form-control select2 {{ hasError($errors, 'razorpay_country_currency') }}">
                            <option value="">select</option>

                            @foreach (config('currencies.currency_list') as $key => $currency)
                                <option @selected($currency === config('gatewaySettings.razorpay_country_currency')) value="{{ $currency }}">{{ $currency }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('razorpay_country_currency')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Razorpay Country Rate</label>
                        <input type="text" name="razorpay_country_rate"
                            value="{{ config('gatewaySettings.razorpay_country_rate') }}"
                            class="form-control {{ hasError($errors, 'razorpay_country_rate') }}">
                        <x-input-error :messages="$errors->get('razorpay_country_rate')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Razorpay key</label>
                        <input type="text" name="razorpay_key"
                            value="{{ config('gatewaySettings.razorpay_key') }}"
                            class="form-control {{ hasError($errors, 'razorpay_key') }}">
                        <x-input-error :messages="$errors->get('razorpay_key')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Razorpay Secret Id</label>
                        <input type="text" name="razorpay_secret_id"
                            value="{{ config('gatewaySettings.razorpay_secret_id') }}"
                            class="form-control {{ hasError($errors, 'razorpay_secret_id') }}">
                        <x-input-error :messages="$errors->get('razorpay_secret_id')" class="mt-2" />
                    </div>
                </div>


            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">update</button>
            </div>
        </form>

    </div>
</div>
