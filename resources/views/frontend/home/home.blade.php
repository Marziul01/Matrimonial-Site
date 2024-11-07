@extends('frontend.master')

@section('title')
 | Home
@endsection

@section('content')
@php $showLoggedOutHeader = true; @endphp
    <div class="section homebg">
        <div class="d-flex align-items-center h-100 w-50 mobileWidth">
            <div class="home-section my-3 w-100">
                <h2 class="text-white homeMain-heading">Find Your Right <br> <span style="color: #f43662">Match Here</span></h2>
                <form id="searchForm" class="w-50 d-flex flex-column home-Selects mt-5 mobileWidth">
                    @csrf
                    <div class="select-wrapper">
                        <select name="looking_for">
                            <option value="">I'm Looking For</option>
                            <option value="Bride">Bride</option>
                            <option value="Groom">Groom</option>
                        </select>
                    </div>
                    <div class="select-wrapper">
                        <select name="marital_status">
                            <option value="">Marital Status</option>
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                        </select>
                    </div>
                    <div class="select-wrapper">
                        <select name="address">
                            <option value="">Select an address</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                        </select>
                    </div>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="section d-flex w-100 py-4 h-100  sectionreverse">
        <div class="w-60 dashbedBorders">
            <div class="step-one">
                <div>
                    <img src="{{ asset('frontend-assets') }}/imgs/first_step.png">
                </div>
                <div>
                    <h4 class="stepTitle">Sign Up</h4>
                    <p class="stepSubTitle">Register for free & put up your matrimony profile</p>
                </div>
            </div>
            <div class="step-two">
                <div>
                    <img src="{{ asset('frontend-assets') }}/imgs/2_step.png">
                </div>
                <div class="d-flex align-items-end flex-column">
                    <h4 class="stepTitle">Connect</h4>
                    <p class="stepSubTitle">Select & Connect with matches you like</p>
                </div>
            </div>
            <div class="step-one step-three">
                <div>
                    <img src="{{ asset('frontend-assets') }}/imgs/3_step.png">
                </div>
                <div>
                    <h4 class="stepTitle">Interact</h4>
                    <p class="stepSubTitle">Become a premium member & start a conversation</p>
                </div>
                <span></span>
            </div>
        </div>
        <div class="w-40 stepsTexts">
            <h2>Find Your <br> <span>Special</span> <br> Someone </h2>
        </div>
    </div>

    <div class="section bgSectionColor">
        <div class="">
            <h1 class="text-center mainHeading"> Search by <span>Popular</span> <br> Matrimony Sites</h1>
        </div>

        <div class="searchBy">
            <div class="searchTitle">
                <h1>By Religion</h1>
            </div>
            <div class="searchOptions">
                <a>Muslim</a>
                <a>Hindu</a>
                <a>Christian</a>
                <a class="lastOption">More Matrimonials</a>
            </div>
        </div>
        <div class="searchBy">
            <div class="searchTitle">
                <h1>By Mother Tongue</h1>
            </div>
            <div class="searchOptions">
                <a>Bengali</a>
                <a class="lastOption">More Matrimonials</a>
            </div>
        </div>
        <div class="searchBy">
            <div class="searchTitle">
                <h1>By Profession</h1>
            </div>
            <div class="searchOptions">
                <a>Doctor</a>
                <a>Teacher</a>
                <a>Engineer</a>
                <a class="lastOption">More Matrimonials</a>
            </div>
        </div>
    </div>

    <div class="bgBrands">
        <div class="section d-flex justify-content-center align-items-center flex-column">
            <h5 class="Title text-center">Trusted Brand</h5>
            <p class="subTitle text-center">Trust by 1600+ Couples</p>
            <img  class="imageBrands" src="{{ asset('frontend-assets/imgs/image 27.png') }}">
        </div>
    </div>

    <div class="section bgBrands2">
        <div class="d-flex justify-content-center align-items-center w-100">
            <div class="Testimonialwrapper">
                <i id="testimonialleft" class="fa-solid fa-circle-chevron-left"></i>
                <ul class="Testimonialcarousel">
                    @foreach ($testimonials->take(4) as $testimonial )
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
                    
                    {{-- <li class="Testimonialcard p-2 h-100">
                        <div class="TestimonialcardInner h-100">
                            <div class="testimonial-item w-100">
                                <div class=" img">
                                    <img src="{{ asset('frontend-assets/imgs/7cedefe4-c3ab-4fa1-a292-bd4ccf7eeb9d.jpg') }}" class="d-block" alt="Testimonial Image">
                                </div>
                                <div class="w-100 text-left mainTestiText">
                                    <p class="mb-0">This matrimonial website gave us the opportunity to connect with someone who shared the same values and dreams. The process was smooth, and within no time, we knew we were meant for each other. We’re now happily married and grateful!</p>
                                    <p class="textDesc">Mizanur islam</p>
                                    <p class="lcation">khulna</p>
                                </div>
                            </div>
                        </div>
                        <span class="spanSquare"></span>
                    </li>
                    <li class="Testimonialcard p-2 h-100">
                        <div class="TestimonialcardInner h-100">
                            <div class="testimonial-item w-100">
                                <div class="img">
                                    <img src="{{ asset('frontend-assets/imgs/5265bf38-31b9-47c1-84c0-8e4b4ddc7a1d.jpg') }}" class="d-block" alt="Testimonial Image">
                                </div>
                                <div class="w-100 text-left mainTestiText">
                                    <p class="mb-0">Finding the right person felt overwhelming until I joined this matrimonial site. The profiles were authentic, and the matches were meaningful. I met Ahmed, and the rest is history. We are now building a wonderful life together.</p>
                                    <p class="textDesc">md. mahim miya</p>
                                    <p class="lcation">Chittagong</p>
                                </div>
                            </div>
                        </div>
                        <span class="spanSquare"></span>
                    </li>
                    <li class="Testimonialcard p-2 h-100">
                        <div class="TestimonialcardInner h-100">
                            <div class="testimonial-item w-100">
                                <div class="img">
                                    <img src="{{ asset('frontend-assets/imgs/6d521601-4919-4e0a-9113-aab3f9fa8769.jpg') }}" class="d-block" alt="Testimonial Image">
                                </div>
                                <div class="w-100 text-left mainTestiText">
                                    <p class="mb-0">I never thought finding my life partner would be this easy! Thanks to this platform, I met Rohan, and within a few conversations, we knew we were perfect for each other. We’re now happily married and couldn't be more thankful.</p>
                                    <p class="textDesc">Rifatul Islam</p>
                                    <p class="lcation">dhaka</p>
                                </div>
                            </div>
                        </div>
                        <span class="spanSquare"></span>
                    </li> --}}
                </ul>
                <i id="testimonialright" class="fa-solid fa-circle-chevron-right"></i>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{route('reviews')}}" class="moreTestimonials"> more customer reviews </a>
        </div>
    </div>

    <div class="section bgSectionColor trusted">
        <div>
            <div class="pointerDiv d-flex justify-content-center">
                <img class="pointerImage" src="{{ asset('frontend-assets/imgs/image-22.png') }}">
            </div>
            <div>
                <p class="text-center trustedOne">WEEDING WEBSITE</p>
                <h1 class="text-center trustedTitle">Why Choose us</h1>
                <p class="text-center trustedSubTitle">Most Trusted and premium Matrimony Service in the World</p>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="trustOptions">
            <div class="trustOptionsDiv">
                <div>
                    <img src="{{ asset('frontend-assets/imgs/image-23.png') }}">
                    <h2>Genuine profiles</h2>
                    <p>Contact genuine profiles
                        with 100% verified mobile</p>
                </div>
            </div>
            <div class="trustOptionsDiv">
                <div>
                    <img src="{{ asset('frontend-assets/imgs/image24.png') }}">
                    <h2>Most trusted</h2>
                    <p>The most trusted wedding
                        matrimony brand.</p>
                </div>
            </div>
            <div class="trustOptionsDiv">
                <div>
                    <div class="position-relative border-0 p-0" style="height: 130px">
                        <img class="ring-1" src="{{ asset('frontend-assets/imgs/Subtract.png') }}">
                        <img class="ring-2" src="{{ asset('frontend-assets/imgs/Subtract1.png') }}">
                    </div>
                    <h2>1600+ weddings</h2>
                    <p>Lakhs of peoples have
                        found their life partner</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="siteContact d-flex w-100">
            <div class="w-50 contactImages position-relative">
                <img class="contactImg1" src="{{ asset('frontend-assets/imgs/Ellipse-2629.png') }}">
                <img class="contactImg2" src="{{ asset('frontend-assets/imgs/image.png') }}">
                <img class="contactImg3" src="{{ asset('frontend-assets/imgs/image-1.png') }}">
                <img class="contactImg4" src="{{ asset('frontend-assets/imgs/Rectangle-8772.png') }}">
            </div>
            <div class="w-50 contactDetails">
                <h1 class="title">WELCOME TO</h1>
                <h3 class="subTitle">WEDDING MATRIMONY</h3>
                <p class="desc">Best wedding matrimony it is a long established fact that a reader will
                    be distracted by the readable content of a page when looking at it’s
                    layout.
                </p>
                <p class="click"><a href="" data-bs-toggle="modal" data-bs-target="#registerModal" >Click here to</a> Start you matrimony service now.</p>
                <hr>
                <p class="desc">There are many variations of passages of Lorem ipsum available, but
                    the mojority have suffered alteraction in some from, by injected
                    humor, or randomised word which don’t look even slighty believable.
                </p>
                <div class="d-flex justify-content-between align-items-center w-100 column-gap-4 mt-5 mobile-enquier-div">
                    <div class="d-flex w-50 align-items-start column-gap-3 enquiry">
                        <i class="fa-solid fa-phone"></i>
                        <div>
                            <h4>Enquiry</h4>
                            <p>{{ $siteSetting->phone }}<p>
                        </div>
                    </div>
                    <div class="d-flex w-50 align-items-start column-gap-3 enquiry">
                        <i class="fa-regular fa-envelope"></i>
                        <div>
                            <h4>Get Support</h4>
                            <p>{{ $siteSetting->email }}<p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="bgSectionColor adSection">
            <div class="w-50">
                <h1 class="title">Let’s not Wait To Meet</h1>
                <a class="btn joinBtn" data-bs-toggle="modal" data-bs-target="#registerModal">Join Now</a>
            </div>
            <img class="img" src="{{ asset('frontend-assets/imgs/Home-Couple-Optimized-1.png') }}">
        </div>
    </div>

    
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="profileModalLabel">Profile Results</h5>
                    <p class="text-center text-white"> Sign up now to profile details ! </p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-circle-xmark"></i></button>
                    <div id="profileGrid" class="row row-cols-1 row-cols-md-4 g-4">
                        <!-- Profiles will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('customJs')

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.querySelector(".Testimonialcarousel");
        const leftBtn = document.getElementById("testimonialleft");
        const rightBtn = document.getElementById("testimonialright");
        const wrapper = document.querySelector(".Testimonialwrapper");

        const cards = carousel.querySelectorAll(".Testimonialcard");
        const cardWidth = cards[0].offsetWidth;
        const totalCards = cards.length;

        let isDragging = false,
            startX,
            startScrollLeft,
            timeoutId;

        // Duplicate cards to create the illusion of infinite scrolling
        for (let i = 0; i < totalCards; i++) {
            let clone = cards[i].cloneNode(true);
            carousel.appendChild(clone);
        }

        const dragStart = (e) => {
            isDragging = true;
            carousel.classList.add("dragging");
            startX = e.pageX;
            startScrollLeft = carousel.scrollLeft;
        };

        const dragging = (e) => {
            if (!isDragging) return;
            const newScrollLeft = startScrollLeft - (e.pageX - startX);
            carousel.scrollLeft = newScrollLeft;
        };

        const dragStop = () => {
            isDragging = false;
            carousel.classList.remove("dragging");
        };

        // Function to reset scroll position when we reach the end
        const checkInfiniteScroll = () => {
            if (carousel.scrollLeft >= cardWidth * totalCards) {
                carousel.scrollLeft = 0;  // Reset to the first card instantly
            } else if (carousel.scrollLeft <= 0) {
                carousel.scrollLeft = cardWidth * totalCards;  // Move to the last card if scrolling backward
            }
        };

        const autoPlay = () => {
            if (window.innerWidth < 800) return;

            timeoutId = setTimeout(() => {
                carousel.scrollBy({
                    left: cardWidth,
                    behavior: 'smooth'
                });

                setTimeout(() => {
                    checkInfiniteScroll();  // Check if we need to reset the scroll position
                    autoPlay();  // Continue the autoplay loop
                }, 800);  // 0.8s delay for smooth sliding
            }, 5000);  // 5 seconds autoplay interval
        };

        carousel.addEventListener("mousedown", dragStart);
        carousel.addEventListener("mousemove", dragging);
        document.addEventListener("mouseup", dragStop);
        wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
        wrapper.addEventListener("mouseleave", autoPlay);

        // Left and right button handlers for manual scrolling
        leftBtn.addEventListener("click", () => {
            carousel.scrollBy({
                left: -cardWidth,
                behavior: 'smooth'
            });
            setTimeout(checkInfiniteScroll, 800);
        });

        rightBtn.addEventListener("click", () => {
            carousel.scrollBy({
                left: cardWidth,
                behavior: 'smooth'
            });
            setTimeout(checkInfiniteScroll, 800);
        });

        // Start autoplay on load
        autoPlay();
    });
</script>

<script>
    $(document).ready(function() {
        // Handle form submission
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Clear any previous errors
            $('.error-message').remove();

            // Show the loading screen
            $('#loadingScreen').show();

            // Perform AJAX request
            $.ajax({
                url: '{{ route("fetch.profiles") }}',
                type: 'POST',
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    // Show the loading screen or spinner here
                    $('#loadingScreen').show();
                },
                success: function(response) {
                    // Hide the loading screen or spinner here
                    $('#loadingScreen').hide();

                    // Clear the previous profiles
                    $('#profileGrid').empty();

                    // Display profiles in modal
                    response.profiles.forEach(function(profile) {
                        const profileHtml = `
                            <div class="col-6 col-md-4 mb-4">
                                <div class="card">
                                    <img src="${profile.image}" class="card-img-top" alt="Profile Image">
                                    <div class="card-body">
                                        <h5 class="card-title">${profile.name}</h5>
                                        <p class="card-text">Marital Status: ${response.marital_status}</p>
                                        <p class="card-text mb-3">Address: ${response.address}</p>
                                        <a class="" onclick="viewProfile()"> View Profile </a>
                                    </div>
                                </div>
                            </div>
                        `;
                        $('#profileGrid').append(profileHtml);
                    });

                    // Show the modal
                    $('#profileModal').modal('show');
                },
                error: function(xhr) {
                    $('#loadingScreen').hide(); // Hide loading on error

                    if (xhr.status === 422) {
                        // Loop through validation errors and display them under each field
                        let errors = xhr.responseJSON.errors;
                        
                        if (errors.looking_for) {
                            $('<div class="error-message text-danger">' + errors.looking_for[0] + '</div>')
                                .insertAfter('select[name="looking_for"]');
                        }
                        if (errors.marital_status) {
                            $('<div class="error-message text-danger">' + errors.marital_status[0] + '</div>')
                                .insertAfter('select[name="marital_status"]');
                        }
                        if (errors.address) {
                            $('<div class="error-message text-danger">' + errors.address[0] + '</div>')
                                .insertAfter('select[name="address"]');
                        }
                    }
                }
            });
        });
    });

</script>

<script>
    function viewProfile() {
        // Hide the current profile modal
        $('#profileModal').modal('hide');

        // Show the register modal
        $('#registerModal').modal('show');
    }
</script>

@endsection
