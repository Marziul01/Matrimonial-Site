@extends('frontend.master')

@section('title')
    | Price
@endsection

@section('content')

    <div class="section">
        <div class="bg-price p-5">
            <div>
                <div>
                    <h1 class="text-center mainHeading">Pay only for what you need</h1>
                    <p class="text-center subHeading">Pricing Plans for every budget</p>
                </div>
                <div>
                    <div class="d-flex align-items-start w-100 priceMobileTab">
                        <div class="nav flex-column nav-pills me-3 w-25 pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <div><h4 class="text-center text-bold mt-5 mb-2">Choose Plan</h4></div>
                          <div class="priceMobileBtnDiv">
                            <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false"><i class="fa-solid fa-circle-dot"></i> Yearly Billing</button>
                            <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="fa-solid fa-circle-dot"></i> Monthly Billing</button>
                          </div>
                        </div>
                        <div class="tab-content w-75" id="v-pills-tabContent">
                          <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="p-4 d-flex justify-content-center align-items-center w-100 mobilePriceTabCard">
                                <div class="pricePlanCard1">
                                    <div class="border-bottom-1 pb-3">
                                        <h2 class="priceTitle">Standard</h2>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 99 <span>/ mo</span></h1>
                                        <p class="priceAmountText">Per month renew</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
                                <div class="pricePlanCard2">
                                    <div class="border-bottom-1 pb-3">
                                        <h2 class="priceTitle">Pro</h2>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 299 <span>/ mo</span></h1>
                                        <p class="priceAmountText">Per month renew</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
                                <div class="pricePlanCard3">
                                    <div class="border-bottom-1 pb-3">
                                        <div class="d-flex align-items-center justify-content-between column-gap-4">
                                            <h2 class="priceTitle">Enterprise</h2>
                                            <p class="pricePopularTag">Popular</p>
                                        </div>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 499 <span>/ mo</span></h1>
                                        <p class="priceAmountText">Per month renew</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="tab-pane fade  show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="p-4 d-flex justify-content-center align-items-center w-100 mobilePriceTabCard">
                                <div class="pricePlanCard1">
                                    <div class="border-bottom-1 pb-3">
                                        <h2 class="priceTitle">Standard</h2>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 99 <span>/ mo</span></h1>
                                        <p class="priceAmountText">Per month renew</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
                                <div class="pricePlanCard2">
                                    <div class="border-bottom-1 pb-3">
                                        <h2 class="priceTitle">Pro</h2>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 299 <span>/ mo</span></h1>
                                        <p class="priceAmountText">Per month renew</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
                                <div class="pricePlanCard3">
                                    <div class="border-bottom-1 pb-3">
                                        <div class="d-flex align-items-center justify-content-between column-gap-4">
                                            <h2 class="priceTitle">Enterprise</h2>
                                            <p class="pricePopularTag">Popular</p>
                                        </div>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 499 <span>/ mo</span></h1>
                                        <p class="priceAmountText">Per month renew</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
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
