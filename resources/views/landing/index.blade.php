@extends('layouts.startbootstrap')

@section('content')
    <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Dream Wedding</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Creating Perfect Moments for Your Special Day</h2>
                        <a class="btn btn-primary" href="#about">Discover Our Services</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Your Dream Wedding Awaits</h2>
                        <p class="text-white-50">
                            We are passionate wedding organizers dedicated to turning your dream wedding into reality.
                            From intimate ceremonies to grand celebrations, we handle every detail with care and precision.
                            Let us create unforgettable memories that will last a lifetime.
                        </p>
                    </div>
                </div>
                <img class="img-fluid" src="{{ asset('/startbootstrap/assets/img/wedding-couple.jpg') }}" alt="Happy Wedding Couple" />
            </div>
        </section>

        <!-- Wedding Packages-->
        <section class="projects-section bg-light" id="packages">
            <div class="container px-4 px-lg-5">
                <div class="text-center mb-5">
                    <h2 class="mb-4">Our Wedding Packages</h2>
                    <p class="text-muted">Choose from our carefully crafted wedding packages</p>
                </div>

                <!-- Featured Package -->
                @if($catalogues->count() > 0)
                    <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                        <div class="col-xl-8 col-lg-7">
                            <img class="img-fluid mb-3 mb-lg-0"
                                 src="{{ asset('uploads/catalogues/'.$catalogues[0]->image) }}"
                                 alt="{{ $catalogues[0]->package_name }}" />
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="featured-text text-center text-lg-left">
                                <h4 class="text-primary">{{ $catalogues[0]->package_name }}</h4>
                                <p class="text-black-50 mb-0">{!! Str::limit(strip_tags($catalogues[0]->description), 120) !!}</p>
                                <a href="{{ route('catalogues.detail', $catalogues[0]->catalogue_id) }}" class="btn btn-primary mt-3">View Details</a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Other Packages -->
                @foreach($catalogues->skip(1) as $key => $catalogue)
                    <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                        <div class="col-lg-6 {{ $key % 2 == 0 ? '' : 'order-lg-first' }}">
                            <img class="img-fluid" src="{{ asset('uploads/catalogues/'.$catalogue->image) }}" alt="{{ $catalogue->package_name }}" />
                        </div>
                        <div class="col-lg-6 {{ $key % 2 == 0 ? '' : 'order-lg-first' }}">
                            <div class="bg-black text-center h-100 project">
                                <div class="d-flex h-100">
                                    <div class="project-text w-100 my-auto {{ $key % 2 == 0 ? 'text-center text-lg-left' : 'text-center text-lg-right' }}">
                                        <h4 class="text-white">{{ $catalogue->package_name }}</h4>
                                        <p class="mb-0 text-white-50">{!! Str::limit(strip_tags($catalogue->description), 100) !!}</p>
                                        <a href="{{ route('catalogues.detail', $catalogue->catalogue_id) }}" class="btn btn-light mt-3">View Package</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Newsletter/Consultation-->
        <section class="signup-section" id="consultation">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <i class="fas fa-heart fa-2x mb-2 text-white"></i>
                        <h2 class="text-white mb-5">Get Your Free Wedding Consultation!</h2>
                        <p class="text-white-50 mb-4">Start planning your perfect wedding today. Leave your email and we'll contact you within 24 hours.</p>

                        <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                                <div class="col">
                                    <input class="form-control" id="emailAddress" type="email"
                                           placeholder="Enter your email address..."
                                           aria-label="Enter email address..."
                                           data-sb-validations="required,email" />
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary disabled" id="submitButton" type="submit">
                                        Get Free Consultation!
                                    </button>
                                </div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">Email is required.</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Please enter a valid email.</div>

                            <!-- Submit success message-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder">Thank you for your interest!</div>
                                    We'll contact you within 24 hours to schedule your free consultation.
                                </div>
                            </div>

                            <!-- Submit error message-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3 mt-2">Error sending message!</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">Jl. Wedding Boulevard No. 123<br>Jakarta, Indonesia</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="mailto:info@dreamwedding.com"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">+62 21 1234 5678<br>+62 812 3456 7890</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="social d-flex justify-content-center mt-4">
                    <a class="mx-2" href="{{ $setting }}" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a class="mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a class="mx-2" href="#!" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </section>
@endsection
