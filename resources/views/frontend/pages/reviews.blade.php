@extends('frontend.master')

@section('title')
    | Contact
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
                            <h1 class="mainHeading text-center">Customer Reviews</h1>
                            <p class="subHeading text-center">Our Customer feedback and success stories . </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <div class="Testimonialwrapper reviews">
                            <ul class="Testimonialcarousel">
                                @foreach ($testimonials as $testimonial )
                                <li class="Testimonialcard p-2 h-100">
                                    <div class="TestimonialcardInner h-100">
                                        <div class="testimonial-item w-100">
                                            <div class="img">
                                                <img src="{{ asset($testimonial->image) }}" class="d-block" alt="Testimonial Image">
            
                                            </div>
                                            <div class="w-100 text-left mainTestiText">
                                                <p class="mb-0">{{$testimonial->desc}}</p>
                                                <p class="textDesc">{{$testimonial->name}}</p>
                                                <p class="lcation">{{$testimonial->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="spanSquare"></span>
                                </li>  
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection


@section('customJs')

@endsection
