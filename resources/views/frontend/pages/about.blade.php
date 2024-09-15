@extends('frontend.master')

@section('title')
    | About Us
@endsection

@section('content')

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
                        <p>Best wedding matrimony it is a long established fact that a reader will be
                            distracted by the readable content of a page when looking at it’s
                            layout.Best wedding matrimony it is a long established fact that a reader
                            will be distracted by the readable content of a page when looking at it’s
                            layout.Best wedding matrimony it is a long established fact that a reader
                            will be distracted by the readable content of a page when looking at it’s
                            layout.Best wedding matrimony it is a long established fact that a reader
                            will be distracted by the readable content of a page when looking at it’s
                            layout.Best wedding matrimony it is a long established fact that a reader
                            will be distracted by the readable content of a page when looking at it’s
                            layout.Best wedding matrimony it is a long established fact that a reader
                            will be distracted by the readable content of a page when looking at it’s
                            layout.</p>

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
                        <p>Lorem ipsum dolor sit amet consectetur. Ut fringilla ullamcorper mauris
                            mauris integer ac nunc. Risus viverra et amet vitae. Augue vestibulum
                            ornare quam pellentesque diam eget parturient. Suscipit dui leo lobortis
                            duis in. At semper faucibus sed lorem. Vel ultrices adipiscing aliquam
                            aliquet metus pretium senectus. Vitae tempus facilisis sapien nam.

                            Cras ac elit sed aliquet eget orci est diam. Nunc pretium in ac id nisi. Quis
                            aenean eros euismod suscipit integer aliquet mi magna. Ultrices non
                            tincidunt in semper arcu tellus lorem risus amet. Risus non at elementum
                            ornare ullamcorper adipiscing viverra pellentesque.

                            Pharetra neque lectus sit elementum. Porttitor donec dui gravida placerat
                            orci fringilla ut pellentesque posuere. Quam consectetur et malesuada
                            amet aenean sit sed mattis. Integer vitae scelerisque aliquam sit risus sit
                            quis at. Faucibus elit tristique ut et pellentesque nullam. Eget sed viverra.</p>

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
