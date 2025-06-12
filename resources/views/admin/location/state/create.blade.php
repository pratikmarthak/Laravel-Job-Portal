@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>States</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create State</h4>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('admin.states.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Country</label>
                                <select name="country" class="form-control select2 {{ hasError($errors, 'country') }}">
                                    <option value="">Select</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">State Name</label>
                                    <input type="text" class="form-control {{ hasError($errors, 'name') }}"
                                        name="name" value="{{ old('name') }}">

                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
