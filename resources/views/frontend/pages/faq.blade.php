@extends('frontend.master')

@section('title')
    | FAQ
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
                        <h1 class="mainHeading text-center mb-3">FAQs <br> Ask us anything</h1>
                        <p class="subHeading text-center mb-4">Have any questions? We're here to assist you.</p>
                        <form>
                            <div class="searchWrapper">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="text" class="search-box" placeholder="Search" name="search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row faqTexts">
                <div class="col-md-4">
                    <i class="fa-regular fa-envelope"></i>
                    <h3>How do I change my account email?</h3>
                    <p>You can log in to your account and change it from
                        your Profile > Edit Profile. Then go to the general tab
                        to change your email.</p>
                </div>
                <div class="col-md-4">
                    <i class="fa-regular fa-envelope"></i>
                    <h3>What should I do if my payment fails?</h3>
                    <p>If your payment fails, you can use the (COD) payment
                        option, if available on that order. If your payment is
                        debited from your account after a payment failure, it
                        will be credited back within 7-10 days.</p>
                </div>
                <div class="col-md-4">
                    <i class="fa-regular fa-envelope"></i>
                    <h3>What is your cancellation policy?</h3>
                    <p>You can now cancel an order when it is in packed/
                        shipped status. Any amount paid will be credited into
                        the same payment mode using which the payment
                        was made</p>
                </div>
                <div class="col-md-4 mt-4">
                    <i class="fa-regular fa-envelope"></i>
                    <h3>How do I check order delivery status ?</h3>
                    <p>Please tap on “My Orders” section under main menu
                        of App/Website/M-site to check your order status.</p>
                </div>
                <div class="col-md-4 mt-4">
                    <i class="fa-regular fa-envelope"></i>
                    <h3>What is Instant Refunds?</h3>
                    <p>Upon successful pickup of the return product at your
                        doorstep, Myntra will instantly initiate the refund to
                        your source account or chosen method of refund.
                        Instant Refunds is not available in a few select pin
                        codes and for all self ship returns.</p>
                </div>
                <div class="col-md-4 mt-4">
                    <i class="fa-regular fa-envelope"></i>
                    <h3>How do I apply a coupon on my order?</h3>
                    <p>ou can apply a coupon on cart page before order
                        placement. The complete list of your unused and valid
                        coupons will be available under “My Coupons” tab of
                        App/Website/M-site.</p>
                </div>
                <div class="col-md-12 furtherFaq">
                    <div>
                        <h4>Still have questions?</h4>
                        <p>Can’t find the answer you’re looking for? Please chat to our friendly team.</p>
                    </div>
                    <button href="{{ route('contact') }}">Get in touch</button>
                </div>
            </div>

        </div>

    </div>
</div>


@endsection


@section('customJs')
    <script>
        document.getElementById('copy').addEventListener('click', function() {
    // Get the email text
    const emailText = document.getElementById('email').textContent.trim();

    // Copy the email to the clipboard
    navigator.clipboard.writeText(emailText).then(function() {
        // Change the button text to "Copied"
        const copyButton = document.getElementById('copy');
        copyButton.innerHTML = '<i class="fa-solid fa-copy"></i> copied';

        // Optional: Revert the button text back to "Copy" after a few seconds
        setTimeout(function() {
            copyButton.innerHTML = '<i class="fa-solid fa-copy"></i> copy';
        }, 2000); // 2 seconds delay
    }).catch(function(error) {
        alert('Failed to copy email: ', error);
    });
});


    </script>
@endsection
