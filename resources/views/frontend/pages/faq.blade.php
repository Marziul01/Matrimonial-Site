@extends('frontend.master')

@section('title')
    | FAQ
@endsection

@section('content')

    <div class="section">
        <div class="faq-bg">
            <div>
                <div>
                    <h1 class="text-center faqTitle">Frequently asked <br> <span>questions</span></h1>
                    <p class="text-center faqSubTitle">Do you need some help with something or do<br> you have questions about some features?</p>
                </div>
                <div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Accordion Item #1
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Accordion Item #2
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Accordion Item #3
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="faqBottomDiv">
                    <h4 class="text-center faqbotTitle">Have any other questions ?</h4>
                    <p class="text-center faqbotSubTitle"> Don't hasitate to send an email about your enquiry! </p>
                    <div class="d-flex justify-content-center align-items-center column-gap-4 faqBotInnerDiv">
                        <p class="faqEmail" id="email"> info@linkmyheart.com </p>
                        <button type="button" class="copy" id="copy"> <i class="fa-solid fa-copy"></i> copy </button>
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
