@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Create Plan</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="col-12">
        <div class="card">

            <div class="card-body p-0">
                <form action="{{ route('admin.plans.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Label</label>
                                <input type="text" class="form-control {{ hasError($errors, 'label') }}" name="label"
                                    value="{{ old('label') }}">
                                <x-input-error :messages="$errors->get('label')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control {{ hasError($errors, 'price') }}" name="price"
                                    value="{{ old('price') }}">
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Job Limit</label>
                                <input type="text" class="form-control {{ hasError($errors, 'job_limit') }}" name="job_limit"
                                    value="{{ old('job_limit') }}">
                                <x-input-error :messages="$errors->get('job_limit')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Feature Job Limit</label>
                                <input type="text" class="form-control {{ hasError($errors, 'feature_job_limit') }}" name="feature_job_limit"
                                    value="{{ old('feature_job_limit') }}">
                                <x-input-error :messages="$errors->get('feature_job_limit')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Highlight Job Limit</label>
                                <input type="text" class="form-control {{ hasError($errors, 'highlight_job_limit') }}" name="highlight_job_limit"
                                    value="{{ old('highlight_job_limit') }}">
                                <x-input-error :messages="$errors->get('highlight_job_limit')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Profile Verify</label>
                                <select class="form-control {{ hasError($errors, 'profile_verify') }}" name="profile_verify" id="">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <x-input-error :messages="$errors->get('profile_verify')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Recommended</label>
                                <select class="form-control {{ hasError($errors, 'recommended') }}" name="recommended" id="">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <x-input-error :messages="$errors->get('recommended')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Show this package in frontend</label>
                                <select class="form-control {{ hasError($errors, 'frontend_show') }}" name="frontend_show" id="">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <x-input-error :messages="$errors->get('frontend_show')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Show this package in Home</label>
                                <select class="form-control {{ hasError($errors, 'show_at_home') }}" name="show_at_home" id="">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <x-input-error :messages="$errors->get('show_at_home')" class="mt-2" />
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
