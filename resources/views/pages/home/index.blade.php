@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <section id="home">
        <section id="hero" class="mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="heading">
                        We Care About Your <span>Families</span>
                    </h1>
                </div>

                <div class="col-lg-6 position-relative">
                    <p class="desc position-absolute bottom-0">
                        Check how your families health is by professional team doctor
                        with complete and modern facilities services.
                    </p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-3 point-advantages">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="advantages">
                                Our Advantages
                            </h4>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2">Icon</div>
                        <div class="col-10">Make an apoointment</div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-2">Icon</div>
                        <div class="col-10">Digital x-ray on-site</div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-2">Icon</div>
                        <div class="col-10">Emergency Services</div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-2">Icon</div>
                        <div class="col-10">Immunizations</div>
                    </div>
                </div>

                <div class="col-lg-9 banner">
                    <img src="{{ asset('img/banner.jpg') }}" class="w-100" alt="banner">
                </div>
            </div>
        </section>

        <section id="benefits">
            @include('components.bwa.Benefits')
        </section>

        <section id="advantages">
            @include('components.bwa.Advantages')
        </section>
    </section>
@endsection
