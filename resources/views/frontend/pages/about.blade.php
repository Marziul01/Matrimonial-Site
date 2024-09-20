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
                        <p>At Link My Heart, we believe that every heart deserves a perfect match. As a dedicated matrimonial platform, we are committed to helping individuals find meaningful connections that lead to lifelong relationships. Our mission is to bring together like-minded souls based on shared values, interests, and aspirations, offering a safe and trusted space for those seeking companionship.
                            <br>
                            Founded on the principles of honesty, integrity, and respect, Link My Heart provides an easy-to-use interface for users to connect with potential life partners. We understand that marriage is one of the most important decisions in life, which is why we go the extra mile to ensure that your search for love is secure, reliable, and guided by your personal preferences.</p>

                        <p><a href="" class="clickHere">Click here to </a> Start you matrimony service now.</p>
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
                        <p> A trusted matrimonial platform dedicated to helping individuals find true love and meaningful relationships. We understand that marriage is not just about finding a partner, but about discovering someone who shares your values, dreams, and goals. That's why we've created a platform where love and commitment are built on strong foundations. <br> Our journey began with a simple mission: to connect hearts and create lasting bonds. At Link My Heart, we believe that every person deserves the chance to find their ideal partner. Our platform is designed with care to bring together individuals who are serious about finding a life companion, offering advanced matchmaking tools that prioritize compatibility.</p>

                        <p class="mb-0"><a href="" class="clickHere">Click here to </a> Start you matrimony service now.</p>

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
