<div class="tab-pane fade show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
    {{-- Basic --}}
    <form action="{{ route('candidate.profile.account-info.update') }}" method="POST" class="form-group mt-4"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h4>Location</h4>

                <div class="row mt-3">

                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Country *</label>
                            <select name="country" id=""
                                class="form-control country form-icons select-active {{ $errors->has('country') ? 'is-invalid' : '' }}">
                                <option value="">Select</option>
                                @foreach ($countries as $country)
                                    <option @selected($country->id == $candidate?->country) value="{{ $country->id }}">
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">State</label>
                            <select name="state" id=""
                                class="form-control state form-icons select-active {{ $errors->has('state') ? 'is-invalid' : '' }}">
                                <option value="">Select</option>
                                @foreach ($states as $state)
                                    <option @selected($state->id == $candidate?->state) value="{{ $state->id }}">{{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">City</label>
                            <select name="city" id=""
                                class="form-control city form-icons select-active {{ $errors->has('city') ? 'is-invalid' : '' }}">
                                <option value="">Select</option>
                                @foreach ($cities as $city)
                                    <option @selected($city->id == $candidate?->city) value="{{ $city->id }}">{{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Address *</label>
                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                type="text" value="{{ $candidate?->address }}" name="address">

                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h4>Your Contact Information</h4>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Phone *</label>
                            <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->phone_one }}" name="phone">

                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Secondary Phone *</label>
                            <input class="form-control {{ $errors->has('secondary_phone') ? 'is-invalid' : '' }}"
                                type="text" value="{{ $candidate?->phone_two }}" name="secondary_phone">

                            <x-input-error :messages="$errors->get('secondary_phone')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->email }}" name="email">

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-15">
                <button class="btn btn-primary" name="save">Save All Changes</button>
            </div>

        </div>
    </form>

    {{-- Account Email Update --}}
    <hr>
    <div class="mt-4">
        <h4>Change Account Email Address</h4>
        <form action="{{ route('candidate.profile.account-email.update') }}" method="POST">
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Email *</label>
                    <input class="form-control {{ $errors->has('account_email') ? 'is-invalid' : '' }}" type="text"
                        value="{{ auth('web')->user()->email }}" name="account_email">

                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save All</button>
        </form>
    </div>

    {{-- Account Password Update --}}

    <hr>
    <div class="mt-4">
        <h4>Change Account Password</h4>
        <form action="{{ route('candidate.profile.account-password.update') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Password *</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            type="password" value="" name="password">

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Confirm Password *</label>
                        <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                            type="password" value="" name="password_confirmation">

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save All</button>
                </div>

            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.country').on('change', function() {
                let country_id = $(this).val();
                $('.city').html("");
                $.ajax({
                    method: 'GET',
                    url: '{{ route('get-states', ':id') }}'.replace(":id", country_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, value) {
                            html +=
                                `<option value="${value.id}"> ${value.name}</option>`
                        });

                        $('.state').html(html);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })

            $('.state').on('change', function() {
                let state_id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: '{{ route('get-cities', ':id') }}'.replace(":id", state_id),
                    data: {},
                    success: function(response) {
                        let html = '';

                        $.each(response, function(index, value) {
                            html +=
                                `<option value="${value.id}"> ${value.name}</option>`
                        });

                        $('.city').html(html);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })
        })
    </script>
@endpush
