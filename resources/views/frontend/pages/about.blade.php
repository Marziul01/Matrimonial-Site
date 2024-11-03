@extends('frontend.master')

@section('title')
    | About Us
@endsection

@section('content')
@php $showLoggedOutHeader = true; @endphp
    <div class="bg-about">
        <div class="section position-relative">
            <hr class="top-Header-bottom-border">
            <div>
                <div class="aboutbg py-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <div>
                            <h1 class="mainHeading text-center">About Us</h1>
                            <p class="subHeading text-center">Have any questions? We're here to assist you.</p>
                        </div>
                    </div>
                </div>
                <div class="row aboutTexts">
                    <div class="col-md-6 paRight">
                        <h1>WELCOME TO</h1>
                        <h3>WEDDING MATRIMONY</h3>
                        <p>{{$about->desc}}</p>

                        <p><a href="" data-bs-toggle="modal" data-bs-target="#registerModal" class="clickHere">Click here to </a> Start you matrimony service now.</p>
                    </div>
                    <div class="col-md-6 paddingLefts">
                        <div class="sideImagebg">
                            <div class="imageInnerBorder"></div>
                        </div>
                    </div>
                </div>

                <div class="row aboutTexts">
                    <div class="col-md-6 paRight">
                        <div class="aboutImages position-relative">
                            <img class="aboutImg3" src="{{ asset('frontend-assets/imgs/About-Us-pdf.jpg') }}">
                            <img class="aboutImg4" src="{{ asset('frontend-assets/imgs/Rectangle-8772.png') }}">
                        </div>
                    </div>
                    <div class="col-md-6 paddingLefts">
                        <p> {{$about->desc2}}</p>

                        <p class="mb-0"><a href="" data-bs-toggle="modal" data-bs-target="#registerModal"  class="clickHere">Click here to </a> Start you matrimony service now.</p>

                    </div>
                    <div class="col-md-12 d-flex justify-content-end mb-5">
                        <div class="d-flex justify-content-between align-items-center w-50 column-gap-4 mt-5 paddingLefts">
                            <div class="d-flex w-50 align-items-start column-gap-3 enquiry">
                                <i class="fa-solid fa-phone"></i>
                                <div>
                                    <h4>Enquiry</h4>
                                    <p>+880 1947-782635<p>
                                </div>
                            </div>
                            <div class="d-flex w-50 align-items-start column-gap-3 enquiry">
                                <i class="fa-regular fa-envelope"></i>
                                <div>
                                    <h4>Get Support</h4>
                                    <p>info@linkmyheart.com<p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('customJs')


@endsection
