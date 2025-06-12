@extends('frontend.candidate-dashboard.dashboard')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Blog</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">

                @include('frontend.candidate-dashboard.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">


                    <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Basic</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-experience" type="button" role="tab"
                                    aria-controls="pills-experience" aria-selected="false">Education & Experince</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-account-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-account" type="button" role="tab"
                                    aria-controls="pills-account" aria-selected="false">Account Setting</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">

                            @include('frontend.candidate-dashboard.profile.sections.basic-section')

                            @include('frontend.candidate-dashboard.profile.sections.profile-section')

                            @include('frontend.candidate-dashboard.profile.sections.experience-section')

                            @include('frontend.candidate-dashboard.profile.sections.account-section')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Experience Modal -->
    <div class="modal fade" id="experienceModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Experience</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Experience Form --}}
                    <form action="" id="ExperienceForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Company *</label>
                                    <input type="text" class="form-control" required="" name="company" id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Department *</label>
                                    <input type="text" class="form-control" required="" name="department"
                                        id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Designation *</label>
                                    <input type="text" class="form-control" required="" name="designation"
                                        id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Start Date *</label>
                                    <input type="text" class="form-control datetimepicker" required=""
                                        name="start" id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">End Date *</label>
                                    <input type="text" class="form-control datetimepicker" required=""
                                        name="end" id="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-check form-group form-check-inline">
                                    <input type="checkbox" name="currently_working" value="1"
                                        id="currently_working" class="form-check-input" style="margin-right: 10px">
                                    <label for="currently_working" class="form-check-label">I am currently working</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Responsibities</label>
                                    <textarea name="responsibility" id="" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Experience</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!--Education Modal -->
    <div class="modal fade" id="educationModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Education</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- Education Form --}}
                    <form action="" id="EducationForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Level *</label>
                                    <input type="text" class="form-control" required="" name="level"
                                        id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Degree *</label>
                                    <input type="text" class="form-control" required="" name="degree"
                                        id="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Year *</label>
                                    <input type="text" class="form-control yearpicker" required="" name="year"
                                        id="">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Notes</label>
                                    <textarea name="notes" id="" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Education</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var editId = "";
        var editMode = false;

        //Fetch Experience
        function fetchExperience() {
            $.ajax({
                method: 'GET',
                url: "{{ route('candidate.experience.index') }}",
                data: {},
                success: function(response) {
                    $('.experience-tbody').html(response);
                },
                error: function(xhr, status, error) {

                }
            })
        }

        // Save Experience
        $('#ExperienceForm').on('submit', function(event) {
            event.preventDefault();
            const formData = $(this).serialize();

            if (editMode) {
                //console.log(editId);

                $.ajax({
                    method: 'PUT',
                    url: "{{ route('candidate.experience.update', ':id') }}".replace(':id',
                        editId),
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        fetchExperience();
                        hideLoader();
                        $('#ExperienceForm').trigger("reset");
                        $('#experienceModel').modal("hide");
                        editId = "";
                        editMode = false;

                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        console.error('Error status:', status);
                        console.error('Error message:', error);
                        console.error('Full response:', xhr.responseText);
                    }
                });

            } else {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('candidate.experience.store') }}",
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        fetchExperience();
                        $('#ExperienceForm').trigger("reset");
                        $('#experienceModel').modal("hide");
                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        console.error('Error status:', status);
                        console.error('Error message:', error);
                        console.error('Full response:', xhr.responseText);
                    }
                });
            }

        });

        // Edit Experience
        $('body').on('click', '.edit-experience', function() {
            //e.preventDefault();
            $('#ExperienceForm').trigger("reset");
            let url = $(this).attr('href');

            $.ajax({
                method: 'GET',
                url: url,
                data: {},
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    editId = response.id;
                    editMode = true;

                    $.each(response, function(index, value) {
                        $(`input[name="${index}"]:text`).val(value);
                        if (index === 'currently_working' && value == 1) {
                            $(`input[name="${index}"]:checkbox`).prop('checked',
                                true);
                        }
                        if (index === 'responsibility') {
                            $(`textarea[name="${index}"]`).val(value);
                        }
                    })
                    hideLoader();
                    //$('#experienceModel').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        // Delete Experience Item
        $('body').on('click', '.delete-experience', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response) {
                            fetchExperience();
                            hideLoader();
                            notyf.success(response.message);
                        },
                        error: function(xhr) {
                            console.error('Delete error:', xhr.responseText);
                            Swal.fire("An error occurred!",
                                "Could not delete item.", "error");
                            hideLoader();
                        }
                    });
                }
            });
        });



        //Fetch Education
        function fetchEducation() {
            $.ajax({
                method: 'GET',
                url: "{{ route('candidate.education.index') }}",
                data: {},
                success: function(response) {
                    $('.education-tbody').html(response);
                },
                error: function(xhr, status, error) {

                }
            })
        }

        // Save Eduaction
        $('#EducationForm').on('submit', function(event) {
            event.preventDefault();
            const formData = $(this).serialize();

            if (editMode) {
                //console.log(editId);

                $.ajax({
                    method: 'PUT',
                    url: "{{ route('candidate.education.update', ':id') }}".replace(':id',
                        editId),
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        fetchEducation();
                        hideLoader();
                        $('#EducationForm').trigger("reset");
                        $('#educationModel').modal("hide");
                        editId = "";
                        editMode = false;

                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        console.error('Error status:', status);
                        console.error('Error message:', error);
                        console.error('Full response:', xhr.responseText);
                    }
                });

            } else {
                $.ajax({
                    method: 'POST',
                    url: "{{ route('candidate.education.store') }}",
                    data: formData,
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        fetchEducation();
                        $('#EduactionForm').trigger("reset");
                        $('#educationModel').modal("hide");
                        hideLoader();
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        console.error('Error status:', status);
                        console.error('Error message:', error);
                        console.error('Full response:', xhr.responseText);
                    }
                });
            }

        });

        // Edit Eduaction
        $('body').on('click', '.edit-education', function() {
            //e.preventDefault();
            $('#EducationForm').trigger("reset");
            let url = $(this).attr('href');

            $.ajax({
                method: 'GET',
                url: url,
                data: {},
                beforeSend: function() {
                    showLoader();
                },
                success: function(response) {
                    editId = response.id;
                    editMode = true;

                    $.each(response, function(index, value) {
                        $(`input[name="${index}"]:text`).val(value);
                        if (index === 'notes') {
                            $(`textarea[name="${index}"]`).val(value);
                        }
                    })
                    hideLoader();
                    //$('#experienceModel').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        // Delete Item
        $('body').on('click', '.delete-education', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(response) {
                            fetchEducation();
                            hideLoader();
                            notyf.success(response.message);
                        },
                        error: function(xhr) {
                            console.error('Delete error:', xhr.responseText);
                            Swal.fire("An error occurred!",
                                "Could not delete item.", "error");
                            hideLoader();
                        }
                    });
                }
            });
        });
    </script>
@endpush
