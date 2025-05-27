@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Countries</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Countries</h4>
            </div>
            <div class="card-body p-0">
                <form action="{{ route('admin.country.update',compact("country")) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control {{ hasError($errors,'name') }}" name="name" value="{{ old('name',$country->name) }}">
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
