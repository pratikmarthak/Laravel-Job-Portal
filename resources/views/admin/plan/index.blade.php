@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Pricing Plan</h1>
        </div>

        <div class="section-body">
        </div>
    </section>

    <div class="section-body">

        <div class="text-right mr-4 mb-4">
            <a href="{{ route('admin.plans.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                Create New
            </a>
        </div>

        <div class="row">
            @foreach ($plans as $plan)
                <div class="col-12 col-md-4 col-lg-4 mb-4">
                    <div class="pricing">
                        @if ($plan->recommended)
                            <div class="pricing-title">
                                Recommended
                            </div>
                        @endif

                        <div class="pricing-padding">
                            <div>
                                @if ($plan->frontend_show)
                                    <span class="badge bg-primary text-light">Showing at frontend</span>
                                @endif
                                @if ($plan->show_at_home)
                                    <span class="badge bg-success text-light">Showing at home</span>
                                @endif
                            </div>
                            <div>
                                <h4>{{ $plan->label }}</h4>
                            </div>
                            <div class="pricing-price">
                                <div>${{ $plan->price }}</div>
                            </div>
                            <div class="pricing-details">
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">{{ $plan->job_limit }} Job Limit</div>
                                </div>
                                <div class="pricing-item">
                                    @if ($plan->feature_job_limit == 0)
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @endif
                                    <div class="pricing-item-label">{{ $plan->feature_job_limit }} Feature Job Limit</div>
                                </div>
                                <div class="pricing-item">
                                    @if ($plan->highlight_job_limit == 0)
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @endif
                                    <div class="pricing-item-label">{{ $plan->highlight_job_limit }} Highlight Job Limit</div>
                                </div>
                                <div class="pricing-item">
                                    @if ($plan->profile_verify)
                                        <div class="pricing-item-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                    @else
                                        <div class="pricing-item-icon bg-danger text-white">
                                            <i class="fas fa-times"></i>
                                        </div>
                                    @endif
                                    <div class="pricing-item-label">Profile Vefify</div>
                                </div>
                            </div>
                        </div>

                        <div class="pricing-cta" style="display: flex; justify-content: space-between; width: 100%">
                            <a href="{{ route('admin.plans.edit', $plan->id) }}" class="bg-primary text-light w-100 mr-1">
                                Edit <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="#" class="bg-danger text-light w-100 delete-item ml-1"
                               data-url="{{ route('admin.plans.destroy', $plan->id) }}">
                                Delete <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
