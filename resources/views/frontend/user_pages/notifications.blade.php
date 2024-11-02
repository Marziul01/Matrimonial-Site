@extends('frontend.master')

@section('title')
   | My Notifiactions
@endsection

@section('content')

<div class="section">
   <div class="dashDetailsDiv py-5">
       <div class="imageBox">
           <div class="image">
               @if (isset(Auth::user()->profile->image))
                   <img src="{{ asset(Auth::user()->profile->image) }}" class="img" alt="">
               @else
                   <i class="fa-regular fa-user icon"></i>
               @endif
               <p class="UserName"> {{ Auth::user()->name }} </p>
               <p class="userEmail">{{ Auth::user()->email }}</p>
           </div>
           <div class="memplanDiv">
               <div>
                   <p class="memPlan"> <a href="">{{ Auth::user()->plans->plan_id == 1 ? 'Buy Membership' : Auth::user()->plans->plan->name }} </a> </p>
                   <p class="memplanname">{{ Auth::user()->plans->plan_id == 1 ? Auth::user()->plans->plan->name : 'Validity till '.' '. \Carbon\Carbon::parse(Auth::user()->plans->end_date)->format('j F') }}</p>
               </div>
               <i class="fa-solid fa-crown"></i>
           </div>
       </div>
       <div class="detailsBox1">
           <div class="statsBox2">
               <div class="statsBoxDiv">
                   <h5>My Notifiactions</h5>
                   <nav>
                     <div class="nav nav-tabs stats" id="nav-tab" role="tablist">
                       <button class="nav-link statsInfos active statsInfos" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><h2> {{ $recevies->where('status',1)->count() ?? 0 }} </h2> <p>Received Invitations</p></button>
                       <button class="nav-link statsInfos" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><h2>{{ $sents->where('status',1)->count() ?? 0 }}</h2> <p>Sent Invitations</p></button>
                       <button class="nav-link statsInfos" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><h2> {{ ($sents->where('status',2)->count() + $recevies->where('status',2)->count() ) ?? 0 }} </h2> <p>Accepted Invitations</p></button>
                     </div>
                   </nav>
               </div>
           </div>
           <div class="findBox w-100">
               <div class="bgSectionColor adSection m-0">
                  <div class="tab-content w-100" id="nav-tabContent">
                     <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <h5 class="text-white">Your Received Connect Requests</h5>
                        @if ($recevies->where('status', 1)->isNotEmpty())
                           @foreach ( $recevies->where('status',1) as $recevie )
                              <div class="requestsdivs">
                                 <div class="img">
                                    <img src="{{ asset( $recevie->sender->profile->image ) }}" alt="">
                                 </div>
                                 <div class="requestsjme">
                                    <h4>{{ $recevie->sender->profile->name }}</h4>
                                 </div>
                                 <div class="w-50">
                                    <a href="{{ route('user.match.profielView', ['name' => $recevie->sender->profile->name, 'id' => $recevie->sender->profile->user_id, 'number' => substr($recevie->sender->profile->contact_number, -3)]) }}" class="requestbtn">View Profile</a>
                                    <a class="requestbtn1" onclick="showConfirmationModal({{ $recevie->id }}, 'cancel')">Cancel Request</a>
                                    <a class="requestbtn"  onclick="showConfirmationModal({{ $recevie->id }}, 'accept')">Accept Request</a>
                                 </div>
                              </div>
                           @endforeach
                        @else
                        <p>Sorry ! You didn't received any connect requests yet.</p>
                        @endif
                     </div>
                     <div class="tab-pane fade w-100" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <h5 class="text-white">Your Sented Connect Requests</h5>
                        @if ($sents->where('status',1)->isNotEmpty())
                           @foreach ( $sents->where('status',1) as $sent )
                              <div class="requestsdivs">
                                 <div class="img">
                                    <img src="{{ asset( $sent->recipient->profile->image ) }}" alt="">
                                 </div>
                                 <div class="requestsjme">
                                    <h4>{{ $sent->recipient->profile->name }}</h4>
                                 </div>
                                 <div class="w-50">
                                    <a href="{{ route('user.match.profielView', ['name' => $sent->recipient->profile->name, 'id' => $sent->recipient->profile->user_id, 'number' => substr($sent->recipient->profile->contact_number, -3)]) }}" class="requestbtn">View Profile</a>
                                    <a class="requestbtn1" onclick="showConfirmationModal({{ $sent->id }}, 'cancel')">Delete Request</a>
                                 </div>
                                 
                              </div>
                           @endforeach
                        @else
                        <p>Sorry ! You didn't sent any connect requests yet.</p>
                        @endif
                     </div>
                     <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <h5 class="text-white">All Accepted Connect Requests</h5>
                        @if ($sents->where('status',2)->isNotEmpty() || $recevies->where('status', 2)->isNotEmpty() )

                           @foreach ( $sents->where('status',2) as $sent )
                              <div class="requestsdivs">
                                 <div class="img">
                                    <img src="{{ asset( $sent->recipient->profile->image ) }}" alt="">
                                 </div>
                                 <div class="requestsjme">
                                    <h4>{{ $sent->recipient->profile->name }}</h4>
                                 </div>
                                 <div class="w-50">
                                    <a href="{{ route('user.match.profielView', ['name' => $sent->recipient->profile->name, 'id' => $sent->recipient->profile->user_id, 'number' => substr($sent->recipient->profile->contact_number, -3)]) }}" class="requestbtn">View Profile</a>
                                    <a onclick="showConfirmationModal({{ $sent->id }}, 'cancel')" class="requestbtn1">Cancel Request</a>
                                    <a href="{{ url('/message' ,  $sent->recipient->profile->user_id ) }}" class="requestbtn">Chat Now!</a>
                                 </div>
                              </div>
                           @endforeach

                           @foreach ( $recevies->where('status',2) as $recevie )
                              <div class="requestsdivs">
                                 <div class="img">
                                    <img src="{{ asset( $recevie->sender->profile->image ) }}" alt="">
                                 </div>
                                 <div class="requestsjme">
                                    <h4>{{ $recevie->sender->profile->name }}</h4>
                                 </div>
                                 <div class="w-50">
                                    <a href="{{ route('user.match.profielView', ['name' => $recevie->sender->profile->name, 'id' => $recevie->sender->profile->user_id, 'number' => substr($recevie->sender->profile->contact_number, -3)]) }}" class="requestbtn">View Profile</a>
                                    <a onclick="showConfirmationModal({{ $recevie->id }}, 'cancel')" class="requestbtn1">Cancel Request</a>
                                    <a href="{{ url('/message' , $recevie->sender->profile->user_id ) }}" class="requestbtn">Chat Now!</a>
                                 </div>
                              </div>
                           @endforeach

                        @else
                        <p>Sorry ! No requests has been accepeted yet.</p>
                        @endif
                     </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>



<!-- Bootstrap Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            Are you sure you want to proceed with this action?
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" id="confirmActionBtn" class="btn btn-primary">Confirm</button>
         </div>
      </div>
   </div>
</div>


@endsection

@section('customJs')

   <script>
      let actionId = null;
      let actionType = null;

      // Show confirmation modal and set action type
      function showConfirmationModal(id, type) {
         actionId = id;
         actionType = type;
         $('#confirmationModal').modal('show');
      }

      // Confirm button click
      document.getElementById('confirmActionBtn').addEventListener('click', function () {
         if (actionType === 'accept') {
            acceptRequest(actionId);
         } else if (actionType === 'cancel') {
            cancelRequest(actionId);
         }
         $('#confirmationModal').modal('hide');
      });

      // AJAX function for accepting the request
      function acceptRequest(id) {
         $.ajax({
            url: `{{ route('requests.accept', ':id') }}`.replace(':id', id),
            type: 'POST',
            data: {
                  _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                  toastr.success(response.message);
                  location.reload();
            },
            error: function (xhr) {
                  toastr.error(xhr.responseJSON.message || 'Something went wrong.');
            }
         });
      }

      // AJAX function for canceling the request
      function cancelRequest(id) {
         $.ajax({
            url: `{{ route('requests.cancel', ':id') }}`.replace(':id', id),
            type: 'DELETE',
            data: {
                  _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                  toastr.success(response.message);
                  location.reload();
            },
            error: function (xhr) {
                  toastr.error(xhr.responseJSON.message || 'Something went wrong.');
            }
         });
      }

   </script>


@endsection
