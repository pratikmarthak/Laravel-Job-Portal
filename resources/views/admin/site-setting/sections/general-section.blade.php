<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <div class="card">

        <form action="{{ route('admin.site-setting.update') }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Site Name</label>
                        <input type="text" name="site_name" value="{{ config('Setting.site_name') }}"
                            class="form-control {{ hasError($errors, 'site_name') }}">
                        <x-input-error :messages="$errors->get('site_name')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Email</label>
                        <input type="text" name="site_email" value="{{ config('Setting.site_email') }}"
                            class="form-control {{ hasError($errors, 'site_email') }}">
                        <x-input-error :messages="$errors->get('site_email')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Phone</label>
                        <input type="text" name="site_phone" value="{{ config('Setting.site_phone') }}"
                            class="form-control {{ hasError($errors, 'site_phone') }}">
                        <x-input-error :messages="$errors->get('site_phone')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Default Currency</label>
                        <select name="site_default_currency" class="form-control select2 {{ hasError($errors, 'site_default_currency') }}">
                            <option value="">Select</option>
                            @foreach (config('currencies.currency_list') as $key => $value)
                                <option @selected($value === config('Setting.site_default_currency')) value="{{ $value }}">{{ $value }}</option>
                            @endforeach

                        </select>
                        <x-input-error :messages="$errors->get('site_default_currency')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Site Currency Icon</label>
                        <input type="text" name="site_currency_icon" value="{{ config('Setting.site_currency_icon') }}"
                            class="form-control {{ hasError($errors, 'site_currency_icon') }}">
                        <x-input-error :messages="$errors->get('site_currency_icon')" class="mt-2" />
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-3">update</button>
            </div>
        </form>

    </div>
</div>
