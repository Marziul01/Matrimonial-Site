@extends('frontend.master')

@section('title')
    | Submit Your Profile Details
@endsection

@section('content')

    <div class="bg-price detailsHeight">
        <div class="section detailsbg">
            <div class="py-5 h-100">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div>
                        @if ( is_null(Auth::user()->profile) )
                        <form id="profileDetailsSubmit">
                            <div class="submitDtsCard" id="card_1">
                                <div class="w-100 radios">
                                    <p class="text-center">This Profile is for</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="female" name="gender" id="female">
                                            <label class="form-check-label" for="female">Female <i class="fa-solid fa-person-dress"></i></label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="male" name="gender" id="male">
                                            <label class="form-check-label" for="male">Male <i class="fa-solid fa-person"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center mt-3">You are creating profile for</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="w-30 select-wrapper " style="">
                                            <select name="account_for" class="form-control">
                                                <option value="self">Self</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::user()->userInfo->looking_for == 'google')
                                <div class="w-100 radios mb-2">
                                    <p class="text-center">I'm Looking for a</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="bride" name="looking_for" id="bride">
                                            <label class="form-check-label" for="bride">Bride</label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="groom" name="looking_for" id="groom">
                                            <label class="form-check-label" for="groom">Groom</label>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="w-100 radios">
                                    <p class="text-center">Marital Status</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="Single" name="marital_status" id="single">
                                            <label class="form-check-label" for="single">Single</label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="Divorced" name="marital_status" id="Divorced">
                                            <label class="form-check-label" for="Divorced">Divorced</label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="Widowed" name="marital_status" id="Widowed">
                                            <label class="form-check-label" for="Widowed">Widowed</label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="Awaiting Divorce" name="marital_status" id="Awaiting">
                                            <label class="form-check-label" for="Awaiting">Awaiting Divorce</label>
                                        </div>
                                    </div>
                                </div>
                                @if ( Auth::user()->userInfo->looking_for == 'google' )
                                <div class="w-100 radios mt-3">
                                    <p class="text-center">Date of Birth</p>
                                    <div class="fields">
                                        <div class="select-wrapper">
                                            <select name="month" id="" class="form-control">
                                                <option value="">Month</option>
                                                <option value="01">January</option>
                                                <option value="02">February</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="select-wrapper">
                                            <select name="day" class="form-control">
                                                <option value="">Day</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="select-wrapper">
                                            <select name="year" id="" class="form-control">
                                                <option value="">Year</option>
                                                <option value="2007">2007</option>
                                                <option value="2006">2006</option>
                                                <option value="2005">2005</option>
                                                <option value="2004">2004</option>
                                                <option value="2003">2003</option>
                                                <option value="2002">2002</option>
                                                <option value="2001">2001</option>
                                                <option value="2000">2000</option>
                                                <option value="1999">1999</option>
                                                <option value="1998">1998</option>
                                                <option value="1997">1997</option>
                                                <option value="1996">1996</option>
                                                <option value="1995">1995</option>
                                                <option value="1994">1994</option>
                                                <option value="1993">1993</option>
                                                <option value="1992">1992</option>
                                                <option value="1991">1991</option>
                                                <option value="1990">1990</option>
                                                <option value="1989">1989</option>
                                                <option value="1988">1988</option>
                                                <option value="1987">1987</option>
                                                <option value="1986">1986</option>
                                                <option value="1985">1985</option>
                                                <option value="1984">1984</option>
                                                <option value="1983">1983</option>
                                                <option value="1982">1982</option>
                                                <option value="1981">1981</option>
                                                <option value="1980">1980</option>
                                                <option value="1979">1979</option>
                                                <option value="1978">1978</option>
                                                <option value="1977">1977</option>
                                                <option value="1976">1976</option>
                                                <option value="1975">1975</option>
                                                <option value="1974">1974</option>
                                                <option value="1973">1973</option>
                                                <option value="1972">1972</option>
                                                <option value="1971">1971</option>
                                                <option value="1970">1970</option>
                                                <option value="1969">1969</option>
                                                <option value="1968">1968</option>
                                                <option value="1967">1967</option>
                                                <option value="1966">1966</option>
                                                <option value="1965">1965</option>
                                                <option value="1964">1964</option>
                                                <option value="1963">1963</option>
                                                <option value="1962">1962</option>
                                                <option value="1961">1961</option>
                                                <option value="1960">1960</option>
                                                <option value="1959">1959</option>
                                                <option value="1958">1958</option>
                                                <option value="1957">1957</option>
                                                <option value="1956">1956</option>
                                                <option value="1955">1955</option>
                                                <option value="1954">1954</option>
                                                <option value="1953">1953</option>
                                                <option value="1952">1952</option>
                                                <option value="1951">1951</option>
                                                <option value="1950">1950</option>
                                                <option value="1949">1949</option>
                                                <option value="1948">1948</option>
                                                <option value="1947">1947</option>
                                                <option value="1946">1946</option>
                                                <option value="1945">1945</option>
                                                <option value="1944">1944</option>
                                                <option value="1943">1943</option>
                                                <option value="1942">1942</option>
                                                <option value="1941">1941</option>
                                                <option value="1940">1940</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center mt-1">Religion</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="w-30 select-wrapper " style="">
                                            <select name="religion" id="" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Atheist">Atheist</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center mt-1">Education</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="w-30 select-wrapper " style="">
                                            <select name="education" id="" class="form-control">
                                                <option value="">Education</option>
                                                <option value="Secondary Education">Secondary Education</option>
                                                <option value="Higher Secondary">Higher Secondary</option>
                                                <option value="Diploma in Engineering">Diploma in Engineering</option>
                                                <option value="Fazil">Fazil</option>
                                                <option value="Bachelor's">Bachelor's</option>
                                                <option value="Master's">Master's</option>
                                                <option value="Doctorate">Doctorate</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="contineBtn mt-2" id="cardBtn_1" > Save & Continue</button>
                                </div>
                            </div>
                            <div class="submitDtsCard" id="card_2">
                                <div class="w-100 radios">
                                    <p class="text-center">Nationality</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper">
                                            <select name="nationality" id="nationality" class="form-control">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->nicename }}" {{ $country->nicename == 'Bangladesh' ? 'selected' : '' }}>
                                                        {{ $country->nicename }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 radios" id="birthPlaceWrapper">
                                    <p class="text-center mt-2">Place of Birth</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper">
                                            <select name="birth_place" id="birthPlaceSelect" class="form-control">
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hidden text input for manual birth place entry -->
                                <div class="w-100 radios mb-3" id="birthPlaceTextWrapper" style="display: none;">
                                    <p class="text-center mt-1">Place of Birth</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <input type="text" name="birth_place_text" id="birthPlaceText" class="form-control" placeholder="Enter your birth place (Ex: New York, USA)">
                                    </div>
                                </div>

                                <div class="w-100 radios">
                                    <p class="text-center">Living in Bangladesh since ?</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="in_bangladesh_since" class="form-control">
                                                <option value="Born">Born</option>
                                                <option value="Moved here for Job">Moved here for Job</option>
                                                <option value="Moved here for education">Moved here for education</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                </div>

                            </div>
                            <div class="submitDtsCard" id="card_3">
                                {{-- <div class="w-100 radios">
                                    <p class="text-center">What is your Religion ?</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="religion" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddhism">Buddhism</option>
                                                <option value="Christianity">Christianity</option>
                                                <option value="Atheist">Atheist</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="w-100 radios">
                                    <p class="text-center mt-3">Profession</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="profession" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="Private Company">Private Company</option>
                                                <option value="Govt. Service">Govt. Service</option>
                                                <option value="Business">Business</option>
                                                <option value="Not Working">Not Working</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center">Your Income</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="monthly_income" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="10,000 - 20,000">10,000 - 20,000 Bdt</option>
                                                <option value="20,000 - 30,000">20,000 - 30,000 Bdt</option>
                                                <option value="30,000 - 40,000">30,000 - 40,000 Bdt</option>
                                                <option value="40,000 - 50,000">40,000 - 50,000 Bdt</option>
                                                <option value="50,000 - 60,000">50,000 - 60,000 Bdt</option>
                                                <option value="60,000 - 70,000">60,000 - 70,000 Bdt</option>
                                                <option value="70,000 - 80,000">70,000 - 80,000 Bdt</option>
                                                <option value="80,000 - 90,000">80,000 - 90,000 Bdt</option>
                                                <option value="90,000 - 1lakh">90,000 - 1Lakh Bdt</option>
                                                <option value="1 Lakh +">1 Lakh +</option>
                                                <option value="Do Not Mention">Do Not Mention</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                </div>
                            </div>
                            <div class="submitDtsCard" id="card_4">
                                <div class="w-100 radios">
                                    <p class="text-center">Select Your District</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper">
                                            <select name="district" id="districtSelect" class="form-control">
                                                <option value="">Please Select</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 radios">
                                    <p class="text-center mt-3">Select Your City</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper">
                                            <select name="upazila" id="upazilaSelect" class="form-control">
                                                <option value="">Please Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-100 radios">
                                    <p class="text-center">Living With Family ?</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">

                                            <div class="">
                                                <input class="form-check-input" type="radio" value="Yes" name="living_with_family" id="Yes">
                                                <label class="form-check-label" for="Yes">Yes</label>
                                            </div>
                                            <div class="">
                                                <input class="form-check-input" type="radio" value="No" name="living_with_family" id="No">
                                                <label class="form-check-label" for="No">No </label>
                                            </div>

                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                </div>
                            </div>
                            <div class="submitDtsCard" id="card_5">
                                <div class="w-100 radios">
                                    <p class="text-center">Height</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="height" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="5'">5'</option>
                                                <option value="5.1'">5.1'</option>
                                                <option value="5.2'">5.2'</option>
                                                <option value="5.3'">5.3'</option>
                                                <option value="5.4'">5.4'</option>
                                                <option value="5.5'">5.5'</option>
                                                <option value="5.6'">5.6'</option>
                                                <option value="5.7'">5.7'</option>
                                                <option value="5.8'">5.8'</option>
                                                <option value="5.9'">5.9'</option>
                                                <option value="5.10'">5.10'</option>
                                                <option value="5.11'">5.11'</option>
                                                <option value="6'">6'</option>
                                                <option value="6.1'">6.1'</option>
                                                <option value="6.2'">6.2'</option>
                                                <option value="6.3'">6.3'</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center mt-3">Weight</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="weight" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="50-60 Kg">50-60 Kg</option>
                                                <option value="60-70 Kg">60-70 Kg</option>
                                                <option value="70-80 Kg">70-80 Kg</option>
                                                <option value="80-90 Kg">80-90 Kg</option>
                                                <option value="90-100 Kg">90-100 Kg</option>
                                                <option value="100-110 Kg">100-110 Kg</option>
                                                <option value="110-120 Kg">110-120 Kg</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center">Body Type</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="body_type" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="Extra Slim">Extra Slim</option>
                                                <option value="Slim">Slim</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Healthy">Healthy</option>
                                                <option value="Over Weight">Over Weight</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center">Blood Group</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="blood_group" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                </div>
                            </div>
                            <div class="submitDtsCard" id="card_6">
                                <div class="w-100 radios">
                                    <p class="text-center">Complexion</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="complexion" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="Fair Skin">Fair Skin</option>
                                                <option value="Medium Skin">Medium Skin</option>
                                                <option value="Olive or Light Brown Skin">Olive or Light Brown Skin</option>
                                                <option value="Brown Skin">Brown Skin</option>
                                                <option value="Black Skin">Black Skin</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center mt-3">Bad Habits</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="select-wrapper " style="">
                                            <select name="bad_habit" class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="Smoking">Smoking</option>
                                                <option value="Drinking">Drinking</option>
                                                <option value="Smoking & Drinking">Smoking & Drinking</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 radios">
                                    <p class="text-center">Family Status</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="Rich" name="family_status" id="Rich">
                                            <label class="form-check-label" for="Rich">Rich </label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="Upper Middle Class" name="family_status" id="Upper_Middle">
                                            <label class="form-check-label" for="Upper_Middle">Upper Middle Class </label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" type="radio" value="Middle Class" name="family_status" id="Middle">
                                            <label class="form-check-label" for="Middle">Middle Class </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="button" class="contineBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                </div>
                            </div>
                            <div class="submitDtsCard" id="card_7">
                                <div class="w-100 radios">
                                    <div class="termText">
                                        <h3>Welcome to Link My Heart! </h3>
                                        <p>These terms and conditions outline the rules and regulations for using the Link My Heart Matrimony Website, located at [Link My Heart URL]. By accessing this website, we assume you accept these terms and conditions. If you do not agree to take all of the terms and conditions stated on this page, do not continue using Link My Heart. </p>

                                        <h3> 1. Eligibility</h3>
                                        <p> You must be 18 years or older to register and use the services provided by Link My Heart.
                                        You must be legally allowed to marry under the laws applicable to you and must not have any restrictions against entering into matrimonial relationships.</p>
                                        <h3> 2. Account Registration and Security</h3>
                                        <p>You are required to provide accurate, complete, and updated information while creating an account.
                                        You are responsible for maintaining the confidentiality of your account credentials and for any activities under your account.
                                        You agree to immediately notify us of any unauthorized use of your account or any other breach of security.</p>
                                        <h3> 3. Use of Service</h3>
                                        <p> Link My Heart is a platform that connects individuals seeking matrimonial relationships. We are not responsible for the authenticity of the information provided by users.
                                        You agree not to engage in any unlawful, abusive, or objectionable behavior while using the website.
                                        You must not use this website for any purpose other than personal use related to finding matrimonial connections.</p>
                                        <h3> 4. Content Posted by Users</h3>
                                        <p> Users are responsible for the content they upload, including personal information, images, and other details.
                                        You warrant that the information provided is accurate and does not infringe on any third-party rights.
                                        Link My Heart reserves the right to review, modify, or remove content that violates these terms or is deemed inappropriate.</p>
                                        <h3> 5. Subscription Plans and Payments</h3>
                                        <p>Certain features on Link My Heart may require payment. By subscribing to a plan, you agree to our payment terms and conditions.
                                        All payments made are non-refundable unless specified otherwise in our refund policy.</p>
                                        <h3> 6. Privacy</h3>
                                        <p>By using Link My Heart, you agree to our [Privacy Policy] (insert link), which governs how we collect, use, and protect your personal information.
                                        Your information may be shared with other users of the website, but we take measures to protect your data.</p>
                                        <h3> 7. Communication</h3>
                                        <p>Link My Heart may communicate with you via email, SMS, or other electronic forms of communication for account updates, match notifications, and other services.
                                        You consent to receive such communications and can unsubscribe from notifications at any time.</p>
                                        <h3> 8. User Conduct</h3>
                                        <p>You agree to behave respectfully and lawfully while interacting with other users.
                                        Any form of harassment, abuse, fraud, or harm to other users will result in immediate termination of your account.
                                        Link My Heart reserves the right to block, suspend, or delete any user account found in violation of these terms.</p>
                                        <h3> 9. Termination</h3>
                                        <p>Link My Heart may suspend or terminate your account if you violate any of these terms and conditions, or for any reason at our discretion, with or without notice.
                                        Upon termination, your access to the platform will cease, and you will not be entitled to any refunds for payments made.</p>
                                        <h3> 10. Disclaimers</h3>
                                        <p>Link My Heart is not responsible for the outcome of any relationships formed through our platform. We do not guarantee the accuracy of user-provided information or the suitability of matches.
                                        The website is provided "as is," and we disclaim all warranties, express or implied, including any implied warranties of merchantability, fitness for a particular purpose, or non-infringement.</p>
                                        <h3> 11. Limitation of Liability</h3>
                                        <p>Link My Heart will not be liable for any direct, indirect, incidental, consequential, or exemplary damages arising from your use of the platform.
                                        We are not responsible for any disputes, interactions, or communications that occur between users.</p>
                                        <h3> 12. Indemnification</h3>
                                        <p>You agree to indemnify and hold Link My Heart, its employees, affiliates, and partners harmless from any claims, damages, or expenses arising from your use of the website, your violation of these terms, or your violation of any third-party rights.</p>
                                        <h3> 13. Amendments</h3>
                                        <p>Link My Heart reserves the right to amend or update these terms and conditions at any time. The latest version will be posted on the website, and your continued use of the service constitutes acceptance of the updated terms.</p>
                                        <h3> 14. Governing Law</h3>
                                        <p>These terms and conditions are governed by the laws of Bangladesh, and any disputes arising from the use of Link My Heart will be subject to the exclusive jurisdiction of the courts of Bangladesh.</p>
                                        <h3> Contact Us</h3>
                                        <p>If you have any questions or concerns regarding these terms and conditions, please contact us at info@linkmyheart.com.


                                    </div>
                                </div>
                                <div class="w-100 mt-3 termscheck">
                                    <div class="d-flex align-items-center justify-content-start column-gap-2">
                                        <i class="fa-regular fa-square-check text-white checkedTermsInputIcon"></i>
                                        <input type="checkbox" name="terms" value="Accepted" id="terms" class="checkedTermsInput">
                                        <label for="terms" class="text-white">I Agree with all Terms & Conditions</label>
                                    </div>
                                </div>
                                <div class="w-100 termscheck mt-3">

                                    <div class="d-flex align-items-center justify-content-center column-gap-2 w-100">
                                        <p class="text-center">Enter Your Moblie Number</p>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <div class="bdCode">+880</div>
                                            <input class="form-control verifyPhoneNumber" type="number" name="phone" id="phone" placeholder="Enter Your Moblie Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="button" class="contineBtn phonVerifyBtn mt-3" id="cardBtn_1" > Verify</button>
                                </div>
                            </div>
                            <div class="submitDtsCard" id="card_8">

                                <div class="w-100 termscheck mt-3">
                                    <div class="d-flex align-items-center justify-content-center column-gap-2 w-100">
                                        <p class="text-center">Enter Your Verification Code</p>
                                        <div class="d-flex align-items-center justify-content-start">
                                            <input class="form-control" type="number" name="code" id="phoneCode" placeholder="Enter Verification Code" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="button" class="phonVerifyBtn mt-3" id="cardBtn_verify"> Verify</button>
                                </div>
                                <button type="button" class="contineBtn mt-3 d-none" id="cardBtn_8"> Continue</button>

                            </div>
                            <div class="submitDtsCard" id="card_9">
                                <div class="w-100 radios">
                                    <p class="text-center">Upload Your Image</p>
                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                        <div class="imageDrop">
                                            <div id="image-display">
                                                <label for="upload-button" class="imageReUploadInput">Upload Your Photo</label>
                                            </div>
                                            <input type="file" name="image" id="upload-button" accept="image/*" />
                                            <label for="upload-button" id="imageUploadInput" class="imageUploadInput">
                                                <i class="fa-solid fa-upload" style="font-size: 60px"></i>&nbsp; Upload Your Photo
                                            </label>
                                            <div id="error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-start mt-3">
                                    <textarea name="desc" id="" class="form-control" placeholder="Enter Your Bio"></textarea>

                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="phonVerifyBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                </div>
                            </div>

                        </form>
                        @endif



                        @if ( Auth::user()->profile && is_null(Auth::user()->match) )
                            <form id="profileMatchDetailsSubmit">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="matchesTitle">To Help you Find
                                            Good Matches <br>
                                            <span>Tell us About
                                                your Preferences</span>
                                        </h2>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="submitDtsCard" id="card_1">
                                            <div class="row">
                                                <div class="col-md-6 radios">
                                                    <p class="">Preferred Match Marital Status</p>
                                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                                        <div class="w-30 select-wrapper " style="">
                                                            <select name="marital_status" class="form-control">
                                                                <option value="">Please Select</option>
                                                                <option value="Single">Single</option>
                                                                <option value="Divorced">Divorced</option>
                                                                <option value="Widowed">Widowed</option>
                                                                <option value="Awaiting Divorce">Awaiting Divorce</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 radios">
                                                    <p class="">Preferred Match Education</p>
                                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                                        <div class="w-30 select-wrapper " style="">
                                                            <select name="education" class="form-control">
                                                                <option value="">Please Select</option>
                                                                <option value="Secondary Education">Secondary Education</option>
                                                                <option value="Higher Secondary">Higher Secondary</option>
                                                                <option value="Diploma in Engineering">Diploma in Engineering</option>
                                                                <option value="Fazil">Fazil</option>
                                                                <option value="Bachelor's">Bachelor's</option>
                                                                <option value="Master's">Master's</option>
                                                                <option value="Doctorate">Doctorate</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 radios">
                                                    <p class="">Preferred Match Religion</p>
                                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                                        <div class="w-30 select-wrapper " style="">
                                                            <select name="religion" class="form-control">
                                                                <option value="">Please Select</option>
                                                                <option value="">Religion</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddhism">Buddhism</option>
                                                                <option value="Christianity">Christianity</option>
                                                                <option value="Atheist">Atheist</option>
                                                                <option value="Others">Others</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 radios">
                                                    <p class="">Preferred Match District</p>
                                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                                        <div class="w-30 select-wrapper " style="">
                                                            <select name="location" class="form-control">
                                                                <option value="">Please Select</option>
                                                                @foreach ($districts  as  $district)
                                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 radios">
                                                    <p class="">Preferred Match Age</p>
                                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                                        <div class="w-50">
                                                            <p class="">From</p>
                                                            <div class="w-30 select-wrapper " style="">

                                                                <select name="from_age" class="form-control">

                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                    <option value="32">32</option>
                                                                    <option value="33">33</option>
                                                                    <option value="34">34</option>
                                                                    <option value="35">35</option>
                                                                    <option value="36">36</option>
                                                                    <option value="37">37</option>
                                                                    <option value="38">38</option>
                                                                    <option value="39">39</option>
                                                                    <option value="40">40</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w-50">
                                                            <p class="">To</p>
                                                            <div class="w-30 select-wrapper " style="">

                                                                <select name="to_age" class="form-control">

                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                    <option value="32">32</option>
                                                                    <option value="33">33</option>
                                                                    <option value="34">34</option>
                                                                    <option value="35">35</option>
                                                                    <option value="36">36</option>
                                                                    <option value="37">37</option>
                                                                    <option value="38">38</option>
                                                                    <option value="39">39</option>
                                                                    <option value="40">40</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 radios">
                                                    <p class="">Preferred Match Height</p>
                                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                                        <div class="w-50">
                                                            <p class="">From</p>
                                                            <div class="w-30 select-wrapper " style="">
                                                                <select name="height_form" class="form-control">

                                                                    <option value="5'">5'</option>
                                                                    <option value="5.1'">5.1'</option>
                                                                    <option value="5.2'">5.2'</option>
                                                                    <option value="5.3'">5.3'</option>
                                                                    <option value="5.4'">5.4'</option>
                                                                    <option value="5.5'">5.5'</option>
                                                                    <option value="5.6'">5.6'</option>
                                                                    <option value="5.7'">5.7'</option>
                                                                    <option value="5.8'">5.8'</option>
                                                                    <option value="5.9'">5.9'</option>
                                                                    <option value="5.10'">5.10'</option>
                                                                    <option value="5.11'">5.11'</option>
                                                                    <option value="6'">6'</option>
                                                                    <option value="6.1'">6.1'</option>
                                                                    <option value="6.2'">6.2'</option>
                                                                    <option value="6.3'">6.3'</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w-50">
                                                            <p class="">To</p>
                                                            <div class="w-30 select-wrapper " style="">

                                                                <select name="height_to" class="form-control">
                                                                    <option value="5'">5'</option>
                                                                    <option value="5.1'">5.1'</option>
                                                                    <option value="5.2'">5.2'</option>
                                                                    <option value="5.3'">5.3'</option>
                                                                    <option value="5.4'">5.4'</option>
                                                                    <option value="5.5'">5.5'</option>
                                                                    <option value="5.6'">5.6'</option>
                                                                    <option value="5.7'">5.7'</option>
                                                                    <option value="5.8'">5.8'</option>
                                                                    <option value="5.9'">5.9'</option>
                                                                    <option value="5.10'">5.10'</option>
                                                                    <option value="5.11'">5.11'</option>
                                                                    <option value="6'">6'</option>
                                                                    <option value="6.1'">6.1'</option>
                                                                    <option value="6.2'">6.2'</option>
                                                                    <option value="6.3'">6.3'</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="w-100 radios">
                                                    <p class="text-center">Family Status</p>
                                                    <div class="d-flex align-items-center justify-content-center column-gap-2">
                                                        <div class="">
                                                            <input class="form-check-input" type="radio" value="Rich" name="family_status" id="Rich">
                                                            <label class="form-check-label" for="Rich">Rich </label>
                                                        </div>
                                                        <div class="">
                                                            <input class="form-check-input" type="radio" value="Upper Middle Class" name="family_status" id="Upper_Middle">
                                                            <label class="form-check-label" for="Upper_Middle">Upper Middle Class </label>
                                                        </div>
                                                        <div class="">
                                                            <input class="form-check-input" type="radio" value="Middle Class" name="family_status" id="Middle">
                                                            <label class="form-check-label" for="Middle">Middle Class </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="phonVerifyBtn mt-3" id="cardBtn_1" > Save & Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('customJs')

<script>
   document.addEventListener('DOMContentLoaded', function () {
    // Get all cards and buttons
    const cards = document.querySelectorAll('.submitDtsCard');
    const buttons = document.querySelectorAll('.contineBtn');

    // Initially hide all cards except the first one
    cards.forEach((card, index) => {
        if (index !== 0) {
            card.style.display = 'none'; // Hide all cards except the first one
        }
    });

    buttons.forEach((button) => {
        button.addEventListener('click', function () {
            // Get the current card's ID
            const currentCard = button.closest('.submitDtsCard');
            const currentCardId = currentCard.id;

            // Extract the current card's number from its ID
            const currentCardNumber = parseInt(currentCardId.split('_')[1]);

            // Hide current card with an exit animation
            currentCard.classList.add('hide-card');

            setTimeout(function () {
                // Remove the display and show-card class from the current card
                currentCard.style.display = 'none';
                currentCard.classList.remove('show-card', 'hide-card'); // Reset classes

                // Get the next card's ID based on the current card number
                const nextCardId = `card_${currentCardNumber + 1}`;
                const nextCard = document.getElementById(nextCardId);

                // Show the next card if it exists
                if (nextCard) {
                    nextCard.style.display = 'block'; // Make the next card visible
                    nextCard.classList.add('show-card'); // Add entry animation
                }
            }, 300); // Match the animation duration
        });
    });
});


</script>

<script>
    // Get the checkbox and icon elements
    const checkbox = document.querySelector('.checkedTermsInput');
    const icon = document.querySelector('.checkedTermsInputIcon');

    // Add an event listener to the checkbox
    checkbox.addEventListener('change', function () {
        if (checkbox.checked) {
            // Hide the checkbox and show the icon when checked
            checkbox.style.display = 'none';
            icon.style.display = 'inline-block';
        } else {
            // Revert back if unchecked (optional)
            checkbox.style.display = 'inline-block';
            icon.style.display = 'none';
        }
    });
</script>

<script>
    document.getElementById('nationality').addEventListener('change', function() {
        var selectedNationality = this.value;
        var birthPlaceSelectWrapper = document.getElementById('birthPlaceWrapper');
        var birthPlaceTextWrapper = document.getElementById('birthPlaceTextWrapper');

        if (selectedNationality !== 'Bangladesh') {
            // Hide the select input and show the text input
            birthPlaceSelectWrapper.style.display = 'none';
            birthPlaceTextWrapper.style.display = 'block';
        } else {
            // Show the select input and hide the text input
            birthPlaceSelectWrapper.style.display = 'block';
            birthPlaceTextWrapper.style.display = 'none';
        }
    });

    // Initialize on page load based on the default selected nationality
    window.addEventListener('load', function() {
        var nationalitySelect = document.getElementById('nationality');
        nationalitySelect.dispatchEvent(new Event('change'));
    });
</script>

<script>
    document.getElementById('districtSelect').addEventListener('change', function() {
        var districtId = this.value;
        var upazilaSelect = document.getElementById('upazilaSelect');

        // Clear existing options
        upazilaSelect.innerHTML = '<option value="">Please Select</option>';

        if (districtId) {
            fetch(`/get-upazilas/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        data.forEach(function(upazila) {
                            var option = document.createElement('option');
                            option.value = upazila.id;
                            option.textContent = upazila.name;
                            upazilaSelect.appendChild(option);
                        });
                    } else {
                        upazilaSelect.innerHTML = '<option value="">No Upazilas Available</option>';
                    }
                })
                .catch(error => console.log('Error:', error));
        }
    });

</script>

<script>
    let uploadButton = document.getElementById("upload-button");
     let container = document.querySelector(".container");
     let imageUploadInput = document.getElementById("imageUploadInput");
     let error = document.getElementById("error");
     let imageDisplay = document.getElementById("image-display");

     const fileHandler = (file, name, type) => {
     if (type.split("/")[0] !== "image") {
         // File Type Error
         error.innerText = "Please upload an image file";
         return false;
     }
     error.innerText = "";
     let reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onloadend = () => {
         // Clear any existing images while keeping the label
         const existingImage = imageDisplay.querySelector('figure');
         if (existingImage) {
         existingImage.remove();
         }

         // Create and append the image element
         let imageContainer = document.createElement("figure");
         let img = document.createElement("img");
         img.src = reader.result;
         imageContainer.appendChild(img);
         imageContainer.innerHTML += `<figcaption>${name}</figcaption>`;
         imageDisplay.appendChild(imageContainer);

         // Adjust styles after image upload
         imageDisplay.style.zIndex = "99";
         imageUploadInput.style.opacity = "0";
     };
     };

     // Upload Button Event Listener
     uploadButton.addEventListener("change", () => {
     Array.from(uploadButton.files).forEach((file) => {
         fileHandler(file, file.name, file.type);
     });
     });

     container.addEventListener(
     "dragenter",
     (e) => {
         e.preventDefault();
         e.stopPropagation();
         container.classList.add("active");
     },
     false
     );

     container.addEventListener(
     "dragleave",
     (e) => {
         e.preventDefault();
         e.stopPropagation();
         container.classList.remove("active");
     },
     false
     );

     container.addEventListener(
     "dragover",
     (e) => {
         e.preventDefault();
         e.stopPropagation();
         container.classList.add("active");
     },
     false
     );

     container.addEventListener(
     "drop",
     (e) => {
         e.preventDefault();
         e.stopPropagation();
         container.classList.remove("active");
         let draggedData = e.dataTransfer;
         let files = draggedData.files;
         Array.from(files).forEach((file) => {
         fileHandler(file, file.name, file.type);
         });
     },
     false
     );

     window.onload = () => {
     error.innerText = "";
     };

 </script>

<script>
    document.getElementById('cardBtn_verify').addEventListener('click', function() {
        // Simulate mobile verification by showing the 'Continue' button
        const continueButton = document.getElementById('cardBtn_8');

        // Programmatically trigger the click event of the 'Continue' button
        continueButton.click();
    });

    // Add event listener for the 'Continue' button
    document.getElementById('cardBtn_8').addEventListener('click', function() {
        console.log("Continue button triggered");
        // Add your continue button logic here
    });
</script>

<script>
    $(document).ready(function () {
    $('#profileDetailsSubmit').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route("profile.store") }}', // Change this to your route
            data: formData,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            contentType: false,
            processData: false,
            beforeSend: function () {
                // Optional: Show a loader or disable the submit button
            },
            success: function (response) {
                toastr.success('Your Profile Details Submited Successful!', '', {
                            "positionClass": "toast-top-right",
                            "timeOut": "2000", // Auto-close after 2 seconds
                            "progressBar": true,
                            "backgroundClass": 'bg-success', // Green background
                        });

                setTimeout(function () {
                    location.reload();
                }, 2000);
            },
            error: function (response) {
                let errors = response.responseJSON.errors;

                $.each(errors, function (key, value) {
                    toastr.error(value[0]);
                });

                setTimeout(function () {
                    location.reload();
                }, 2000);
            },
            complete: function () {
                // Optional: Hide the loader or enable the submit button
            }
        });
    });
});

</script>

<script>
    $(document).ready(function () {
        $('#profileMatchDetailsSubmit').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route("match.details.submit") }}', // Ensure this route is correct
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                beforeSend: function () {
                    // Optional: Show loader or disable button here
                },
                success: function (response) {

                    toastr.success('Your Preferred Match Details Submitted Successfully!', '', {
                        "positionClass": "toast-top-right",
                        "timeOut": "2000",
                        "progressBar": true,
                        "backgroundClass": 'bg-success',
                    });

                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 2000);  // Redirect after 2 seconds
                },
                error: function (response) {
                    if (response.responseJSON && response.responseJSON.errors) {
                        let errors = response.responseJSON.errors;

                        $.each(errors, function (key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error('An error occurred. Please try again.');
                    }
                },
                complete: function () {
                    // Optional: Hide loader or enable button here
                }
            });
        });
    });
</script>


@endsection
