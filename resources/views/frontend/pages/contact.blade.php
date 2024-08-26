@extends('frontend.master')

@section('title')
    | Contact
@endsection

@section('content')

    <div class="section">
        <div class="contact-bg">
            <div>
                <div class="">
                    <h1 class="text-center contactTitle">Contact our team</h1>
                    <p class="text-center contactSubTitle">Got any question about our platform ? We're here to help.<br> Chat to our friendly team 24/7 and get onboard in less then 5 minutes</p>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <form>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input class="form-control" name="first_name" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input class="form-control" name="last_name" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number</label>
                                    <input class="form-control" name="number" type="number" placeholder="Phone Number">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Subject</label>
                                    <input class="form-control" name="subject" type="text" placeholder="Subject">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Location</label>
                                    <input class="form-control" name="location" type="text" placeholder="Location">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" name="message" placeholder="Leave us a Message...."></textarea>
                                </div>
                                <button type="submit" class="btn w-100">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 contactInfo">
                        <h5 class="mt-4">Chat with us</h5>
                        <p>  Speack to our friendly team via live chat</p>
                        <a href=""><i class="fa-regular fa-comments"></i> Start a live chat </a>
                        <a href=""> <i class="fa-solid fa-envelope"></i> Shoot us an email </a>
                        <a href=""> <i class="fa-brands fa-x-twitter"></i> Message us on X </a>
                        <h5 class="mt-4">Call us</h5>
                        <p>Speack to our friendly team via live chat</p>
                        <a href=""> <i class="fa-solid fa-phone"></i> +123 456 7890 </a>
                        <h5 class="mt-4">Visit us</h5>
                        <p>Speack to our friendly team via live chat</p>
                        <a href=""> <i class="fa-solid fa-location-dot"></i> Dhaka,Bangladesh </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('customJs')

@endsection
