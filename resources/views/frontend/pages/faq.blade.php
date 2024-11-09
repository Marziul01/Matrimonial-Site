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
                                <input type="text" class="search-box" placeholder="Search" name="search" id="faqSearch">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row faqTexts">
                @foreach ($faqs as $faq )
                <div class="col-md-4">
                    <div><i class="{{ $faq->icon }}"></i></div>
                    <h3>{{$faq->ques}}</h3>
                    <p>{{$faq->ans}}</p>
                </div>
                @endforeach
                
                <div class="col-md-12 furtherFaq">
                    <div>
                        <h4>Still have questions?</h4>
                        <p>Can’t find the answer you’re looking for? Please chat to our friendly team.</p>
                    </div>
                    <a href="{{ route('contact') }}">Get in touch</a>
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

    <script>
        document.getElementById('faqSearch').addEventListener('input', function () {
    let searchValue = this.value.toLowerCase();
    let faqItems = document.querySelectorAll('.faqTexts .col-md-4');

    faqItems.forEach(function (item) {
        // Get the question text of the current FAQ item
        let questionText = item.querySelector('h3').innerText.toLowerCase();

        // Show or hide the FAQ item based on whether it matches the search query
        if (questionText.includes(searchValue)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});
    </script>
@endsection
