@extends('frontend.layouts.master')

@section('contents')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Company Profile</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Company Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box-2 ">
        <div class="container">
            <div class="banner-hero banner-image-single"><img style="height: 374px;object-fit: cover" src="{{ asset($company->banner) }}" alt="joblist"></div>
            <div class="box-company-profile">
                <div class="row mt-10">
                    <div class="col-lg-8 col-md-12">
                        <img style="height: 50px;width: 50px;object-fit: cover" src="{{ asset($company->logo) }}" alt="">
                        <h5 class="f-18">{{ $company->name }} <span class="card-location font-regular ml-20">{{ $company->companyCountry->name }}</span></h5>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-apply btn-apply-big"
                            href="javascript:;" onclick="document.getElementById('open-position').scrollIntoView()">Open Position</a></div>
                </div>
            </div>

            <div class="border-bottom pt-10 pb-10"></div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 mt-75">
                    <div class="content-single">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-about" role="tabpanel"
                                aria-labelledby="tab-about">
                                <h4>Abouth Us</h4>
                                <p>{!! $company->bio !!}</p>

                                <h4>Company Vision</h4>
                                <ul>
                                    {!! $company->vision !!}
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab-recruitments" role="tabpanel"
                                aria-labelledby="tab-recruitments">
                                <h4>Recruitments</h4>
                                <p>The AliStudio Design team has a vision to establish a trusted platform that enables
                                    productive and
                                    healthy enterprises in a world of digital and remote everything, constantly changing
                                    work patterns
                                    and norms, and the need for organizational resiliency.</p>
                                <p>The ideal candidate will have strong creative skills and a portfolio of work which
                                    demonstrates
                                    their passion for illustrative design and typography. This candidate will have
                                    experiences in
                                    working with numerous different design platforms such as digital and print forms.</p>
                            </div>
                            <div class="tab-pane fade" id="tab-people" role="tabpanel" aria-labelledby="tab-people">
                                <h4>People</h4>
                                <p>The AliStudio Design team has a vision to establish a trusted platform that enables
                                    productive and
                                    healthy enterprises in a world of digital and remote everything, constantly changing
                                    work patterns
                                    and norms, and the need for organizational resiliency.</p>
                                <p>The ideal candidate will have strong creative skills and a portfolio of work which
                                    demonstrates
                                    their passion for illustrative design and typography. This candidate will have
                                    experiences in
                                    working with numerous different design platforms such as digital and print forms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-related-job content-page" id="open-position">
                        <h5 class="mb-30">Latest Jobs</h5>
                        <div class="box-list-jobs display-list">
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up"><span class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-6.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job" href="">Quora
                                                        JSC</a><span class="location-small">New York, US</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                            <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                    href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                    href="#">Figma</a></div>
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h4><a href="job-details.html">Senior System Engineer</a></h4>
                                        <div class="mt-5"><span class="card-briefcase">Part time</span><span
                                                class="card-time"><span>5</span><span> mins ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$800</span><span
                                                        class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                        data-bs-target="#ModalApplyJobForm">
                                                        Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up"><span class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-7.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job"
                                                        href="">Nintendo</a><span class="location-small">New York,
                                                        US</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                            <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                    href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                    href="#">Figma</a></div>
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h4><a href="job-details.html">Products Manager</a></h4>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time"><span>6</span><span> mins ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span
                                                        class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                        data-bs-target="#ModalApplyJobForm">
                                                        Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-12">
                                <div class="card-grid-2 hover-up"><span class="flash"></span>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="card-grid-2-image-left">
                                                <div class="image-box"><img src="assets/imgs/brands/brand-8.png"
                                                        alt="joblist"></div>
                                                <div class="right-info"><a class="name-job"
                                                        href="">Periscope</a><span class="location-small">New York,
                                                        US</span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-start text-md-end pr-60 col-md-6 col-sm-12">
                                            <div class="pl-15 mb-15 mt-30"><a class="btn btn-grey-small mr-5"
                                                    href="#">Adobe XD</a><a class="btn btn-grey-small mr-5"
                                                    href="#">Figma</a></div>
                                        </div>
                                    </div>
                                    <div class="card-block-info">
                                        <h4><a href="job-details.html">Lead Quality Control QA</a></h4>
                                        <div class="mt-5"><span class="card-briefcase">Full time</span><span
                                                class="card-time"><span>6</span><span> mins ago</span></span></div>
                                        <p class="font-sm color-text-paragraph mt-10">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing
                                            elit. Recusandae architecto eveniet, dolor quo repellendus pariatur.</p>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-7"><span class="card-text-price">$250</span><span
                                                        class="text-muted">/Hour</span></div>
                                                <div class="col-lg-5 col-5 text-end">
                                                    <div class="btn btn-apply-now" data-bs-toggle="modal"
                                                        data-bs-target="#ModalApplyJobForm">
                                                        Apply now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paginations mt-60">
                            <ul class="pager">
                                <li><a class="pager-prev" href="#"><i class="fas fa-arrow-left"></i></a></li>
                                <li><a class="pager-number" href="#">1</a></li>
                                <li><a class="pager-number" href="#">2</a></li>
                                <li><a class="pager-number active" href="#">3</a></li>
                                <li><a class="pager-number" href="#">4</a></li>
                                <li><a class="pager-next" href="#"><i class="fas fa-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                    <div class="sidebar-border">
                        <div class="sidebar-heading">
                            <div class="avatar-sidebar">
                                <div class="sidebar-info pl-0"><span class="sidebar-company">{{ $company->name }}</span><span
                                        class="card-location">{{ $company->companyCountry->name }}</span></div>
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <div class="box-map">
                                {{-- <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.3150609575905!2d-87.6235655!3d41.886080899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2ca8b34afe61%3A0x6caeb5f721ca846!2s205%20N%20Michigan%20Ave%20Suit%20810%2C%20Chicago%2C%20IL%2060601%2C%20Hoa%20K%E1%BB%B3!5e0!3m2!1svi!2s!4v1658551322537!5m2!1svi!2s"
                                    allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29491.094960658775!2d70.13113546122719!3d22.489663691225424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395769fbfcdecd93%3A0xb0ccbc2b66879809!2sDhunvav%2C%20Gujarat%20361120!5e0!3m2!1sen!2sin!4v1749705691436!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                                    {!! $company->map_link !!}
                            </div>
                        </div>
                        <div class="sidebar-list-job">
                            <ul>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Industry Type</span><strong class="small-heading">
                                        {!! $company->industryType->name !!}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Organization Type</span><strong
                                            class="small-heading">{!! $company->organizationType->name !!}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi fi-rr-user"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Team Size</span><strong
                                            class="small-heading">{!! $company->teamSize->name !!}</strong></div>
                                </li>
                                <li>
                                    <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                    <div class="sidebar-text-info"><span class="text-description">Establishement Date</span><strong class="small-heading">
                                        {!! formatDate($company->establishement_date) !!}</strong></div>
                                </li>

                            </ul>
                        </div>
                        <div class="sidebar-list-job">
                            <ul class="ul-disc">
                                <li>{{ $company?->address }} {{ $company?->companyCity->name ? ',' .$company?->companyCity->name : '' }}
                                    {{ $company?->companyState->name ? ',' .$company?->companyState->name : '' }}
                                    {{ $company?->companyCountry->name ? ',' .$company?->companyCountry->name : '' }}
                                </li>
                                <li>Phone: {{ $company->phone }}</li>
                                <li>Email: <a href="{{ $company->email }}">{{ $company->email }}</a></li>
                                <li>Email: <a href="{{ $company->website }}">{{ $company->website }}</a></li>
                            </ul>
                            <div class="mt-30"><a class="btn btn-send-message" href="mailto: {{ $company->email }}">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
