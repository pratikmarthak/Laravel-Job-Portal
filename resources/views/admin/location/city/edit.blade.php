@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Cities</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Update City</h4>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('admin.cities.update', $city->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Country</label>
                                <select name="country" class="form-control select2 country {{ hasError($errors, 'country') }}">
                                    <option value="">Select</option>
                                    @foreach ($countries as $country)
                                        <option @selected($country->id === $city->country_id) value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">States</label>
                                <select name="state" class="form-control select2 state {{ hasError($errors, 'state') }}">
                                    <option value="">Select</option>
                                    @foreach ($states as $state)
                                        <option @selected($state->id === $city->state_id) value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('state')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-">
                            <div class="form-group">
                                <label for="">City Name</label>
                                <input type="text" class="form-control {{ hasError($errors, 'city') }}" name="city"
                                    value="{{ old('city',$city->name) }}">

                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.country').on('change',function(){
                let country_id = $(this).val();

                $.ajax({
                    method: 'GET',
                    url: '{{ route("admin.get-states",":id") }}'.replace(":id", country_id),
                    data: {},
                    success: function(response){
                        let html = '';

                        $.each(response, function(index,value){
                            html += `<option value="${value.id}"> ${value.name}</option>`
                        });

                        $('.state').html(html);
                    },
                    error:function(xhr, status, error){

                    }
                })
            })
        })
    </script>
@endpush
