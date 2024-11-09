@extends('frontend.master')

@section('title')
   | My Matches
@endsection

@section('content')

<div class="section">
   <div class="recentVisitor1 matchScrooler">
      <div class="d-flex justify-content-between align-items-center">
         <h1>My Matches</h1>
         <div class="">
            <a class=" profilecancelbtnn2" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
               Filter <i class="fa-solid fa-filter"></i>
            </a>
            
         </div>
      </div>
      <div class="collapse" id="collapseExample">
         <div class="statsBoxDiv card card-body mobile-filter">
            <form method="GET" action="{{ route('user.matches') }}" class="row">
               <!-- Near Me -->
               <div class="matchradiosdiv col-12 mb-3">
                  <div>
                     <input type="checkbox" name="near_me" id="Near_Me" value="1" class="d-none" {{ request('near_me') ? 'checked' : '' }} >
                     <label for="Near_Me" class="matchradios">Near Me</label>
                  </div>
               </div>
               <!-- Age -->
               <div class="col-md-6 mb-3">
                  <label class="text-white">Age</label>
                  <div class="d-flex align-items-center column-gap-2 mt-2">
                     <div class="w-50">
                         <select name="age_from" class="form-control text-white">
                             <option value="" class="text-black">Please Select</option>
                             @for ($age = 18; $age <= 45; $age++)
                                 <option value="{{ $age }}" class="text-black" @if(!is_null($user->match)) {{ request('age_from') == $age ? 'selected' : '' }} @endif>{{ $age }}</option>
                             @endfor
                         </select>
                     </div>
                     <span class="text-white">to</span>
                     <div class="w-50">
                         <select name="age_to" class="form-control text-white">
                             <option value="" class="text-black">Please Select</option>
                             @for ($age = 18; $age <= 45; $age++)
                                 <option value="{{ $age }}" class="text-black" @if(!is_null($user->match)) {{ request('age_to') == $age ? 'selected' : '' }} @endif>{{ $age }}</option>
                             @endfor
                         </select>
                     </div>
                  </div>
               </div>
               <!-- Height -->
               <div class="mb-3 col-md-6">
                  <label class="text-white">Height</label>
                  <div class="d-flex align-items-center column-gap-2 mt-2">
                      <div class="w-50">
                          <select name="height_from" class="form-control text-white">
                              <option value="" class="text-black" >Please Select</option>
                              @for ($feet = 5; $feet <= 6; $feet++)
                                  @for ($inches = 0; $inches <= 11; $inches++)
                                      @php
                                          $height = $feet . "'" . $inches . '"';
                                      @endphp
                                      <option value="{{ $height }}" class="text-black" @if(!is_null($user->match)) {{ request('height_from') == $height ? 'selected' : '' }} @endif>
                                          {{ $height }}
                                      </option>
                                      @if ($feet == 6 && $inches == 5) {{-- Limit 6 feet to 6'5" --}}
                                          @break
                                      @endif
                                  @endfor
                              @endfor
                          </select>
                      </div>
                      <span class="text-white">to</span>
                      <div class="w-50">
                          <select name="height_to" class="form-control text-white">
                              <option value="" class="text-black">Please Select</option>
                              @for ($feet = 5; $feet <= 6; $feet++)
                                  @for ($inches = 0; $inches <= 11; $inches++)
                                      @php
                                          $height = $feet . "'" . $inches . '"';
                                      @endphp
                                      <option value="{{ $height }}" class="text-black" @if(!is_null($user->match)) {{ request('height_to') == $height ? 'selected' : '' }} @endif>
                                          {{ $height }}
                                      </option>
                                      @if ($feet == 6 && $inches == 5) {{-- Limit 6 feet to 6'5" --}}
                                          @break
                                      @endif
                                  @endfor
                              @endfor
                          </select>
                      </div>
                  </div>
               </div>
           
               <!-- Education -->
               <div class="mb-3 col-4">
                  <label class="text-white mb-2">Educational Level</label>
                  <select name="education" id="" class="form-control text-white">
                      <option value="" class="text-black" >Select Education Level</option>
                      <option value="Secondary Education" class="text-black" @if(!is_null($user->match)) {{ request('education') == 'Secondary Education' ? 'selected' : '' }} @endif>Secondary Education</option>
                      <option value="Higher Secondary" class="text-black" @if(!is_null($user->match)) {{ request('education') == 'Higher Secondary' ? 'selected' : '' }} @endif>Higher Secondary</option>
                      <option value="Diploma in Engineering" class="text-black" @if(!is_null($user->match)) {{ request('education') == 'Diploma in Engineering' ? 'selected' : '' }} @endif>Diploma in Engineering</option>
                      <option value="Fazil" class="text-black" @if(!is_null($user->match)) {{ request('education') == 'Fazil' ? 'selected' : '' }} @endif>Fazil</option>
                      <option value="Bachelor's" class="text-black" @if(!is_null($user->match)) {{ request('education') == "Bachelor's" ? 'selected' : '' }} @endif>Bachelor's</option>
                      <option value="Master's" class="text-black" @if(!is_null($user->match)) {{ request('education') == "Master's" ? 'selected' : '' }} @endif>Master's</option>
                      <option value="Doctorate" class="text-black" @if(!is_null($user->match)) {{ request('education') == "Doctorate" ? 'selected' : '' }} @endif>Doctorate</option>
                  </select>
               </div>
           
               <!-- Drinking Match -->
               <div class="mb-3 col-4">
                   <label class="text-white mb-2">Drinking:</label>
                   <select name="drinking_match" class="form-control text-white">
                       <option value="" class="text-black">Select</option>
                       <option value="Yes" class="text-black" {{ request('drinking_match') === 'Yes' ? 'selected' : '' }}>Yes</option>
                       <option value="No" class="text-black" {{ request('drinking_match') === 'No' ? 'selected' : '' }}>No</option>
                   </select>
               </div>
           
               <!-- Smoking Match -->
               <div class=" mb-3 col-4">
                   <label class="text-white mb-2">Smoking:</label>
                   <select name="smoking_match" class="form-control text-white">
                       <option value="" class="text-black">Select</option>
                       <option value="Yes" class="text-black" {{ request('smoking_match') === 'Yes' ? 'selected' : '' }}>Yes</option>
                       <option value="No" class="text-black" {{ request('smoking_match') === 'No' ? 'selected' : '' }}>No</option>
                   </select>
               </div>
               <div class="d-flex align-items-center column-gap-2">
                <button class="profilecancelbtnn3" type="submit">Filter</button>
                <button class="profilecancelbtnn3" type="reset" onclick="resetFilters()">Reset</button>
               </div>
               
           </form>
         </div>
      </div>
      <div class="Testimonialwrapper">
          <ul class="Testimonialcarousel position-relative">
            @if ($profiles->isNotEmpty())
            @foreach ($profiles->take(8) as  $profile)
                  <li class="Testimonialcard p-2 h-100 ">
                      <div class="TestimonialcardInner h-100">
                          <div class="testimonial-item w-100">
                              <div class="img">
                                  <img src="{{ asset($profile->image) }}" class="d-block">
                                  <h2>{{ $profile->name }}</h2>
                              </div>
                              <div class="w-100 text-left mainTestiText">
                                  <div>
                                      <p class="mb-0">Age : {{ $profile->age . 'yr' }}</p>
                                      <p class="mb-0">Height: {{ $profile->height . 'ft' }}</p>
                                      <p class="mb-0">Address: {{ $profile->location }}</p>
                                  </div>
                                  <a href="{{ route('user.match.profielView', ['name' => $profile->name, 'id' => $profile->user_id, 'number' => substr($profile->contact_number, -3)]) }}">
                                      View Profile
                                  </a>
                              </div>
                          </div>
                      </div>
                  </li>
              @endforeach
            @else
               <p> Sorry! No Matches Found for you yet! </p>
            @endif
              
          </ul>
      </div>
   </div>
</div>

@endsection

@section('customJs')

<script>
   function resetFilters() {
       // Clear the filter inputs
       const form = document.querySelector('form');
       form.reset();
       
       // Redirect to the matches route to show default profiles
       window.location.href = '{{ route('user.matches') }}';
   }
</script>

@endsection
