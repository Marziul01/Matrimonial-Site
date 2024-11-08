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
                <div class="row">
                    <div class="col-md-6 contactFormsDts">
                        <h1 class="title">Get in <span>Touch</span></h1>
                        <p class="subTitle">Need assistance? Reach out to our support team, and we’ll get back to you shortly!</p>
                        <form id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <input class="form-control" name="name" type="text" placeholder="Name *" required>
                                </div>
                                <div class="col-md-12 p-0">
                                    <input class="form-control" name="email" type="email" placeholder="Email *" required>
                                </div>
                                <div class="col-md-12 p-0">
                                    <input class="form-control" name="number" type="number" placeholder="Phone Number">
                                </div>
                                <div class="col-md-12 p-0">
                                    <textarea class="form-control" name="message" placeholder="Type Here *" required></textarea>
                                </div>
                                <button type="submit" class="btn w-100 contactSbBtn">SEND</button>
                            </div>
                        </form>
                        <div class="contactEnquery">
                            <div class="d-flex w-50 align-items-center column-gap-3 enquiry">
                                <i class="fa-solid fa-phone-volume"></i>
                                <div>
                                    <h4>PHONE</h4>
                                    <p>{{ $siteSetting->phone }}<p>
                                </div>
                            </div>
                            <div class="d-flex w-50 align-items-center column-gap-3 enquiry">
                                <i class="fa-solid fa-map-location-dot"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p>{{ $siteSetting->address }}<p>
                                </div>
                            </div>
                            <div class="d-flex w-50 align-items-center column-gap-3 enquiry">
                                <i class="fa-solid fa-envelope-open-text"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p>{{ $siteSetting->email }}<p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="googleMap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10322.246951493451!2d90.36430175307102!3d23.83760180856062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c14a3366b005%3A0x901b07016468944c!2sMirpur%20DOHS%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1726427284531!5m2!1sen!2sbd" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection


@section('customJs')

<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: "{{ route('contact.submit') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    toastr.success(response.success);
                    $('#contactForm')[0].reset();
                },
                error: function(response) {
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error('There was an error. Please try again.');
                    }
                }
            });
        });
    });
</script>

@endsection
