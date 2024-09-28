@extends('admin.master')

@section('title')
    Users
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-4 grid-margin">
        <div class="row px-5">
                <div class="card shadow-sm p-0 messagebox">
                    @include('admin.auth.message')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="alert-ul">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header bg-primary text-white mb-3">
                        <h4 class="mb-0">Messages</h4>
                    </div>
                    <div class="px-4 h-100">
                        <div class="d-flex align-items-start h-100 w-100">
                            <div class="nav flex-column nav-pills me-3 w-25 h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @if (isset($messages))
                                    @foreach($messages as $users)
                                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile_{{ $users->id }}" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="name">{{ $users->name }}</h4>
                                            <p class="mb-0 text-sm text-bold">{{ $users->created_at->diffForHumans() }}</p>
                                        </div>
                                        <p class="email">{{ $users->email }}</p>
                                        <p class="mesage">{{ \Illuminate\Support\Str::words($users->message, 5, '...') }}</p>
                                    </button>
                                    @endforeach
                                @endif
                            </div>
                            <div class="tab-content h-100 w-75" id="v-pills-tabContent">
                                @if (isset($messages))
                                @foreach($messages as $users)
                                <div class="tab-pane fade h-100" id="v-pills-profile_{{ $users->id }}" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div>
                                            <div class="w-100 row p-2" style="border: 1px solid grey; border-radius: 10px; display: grid; grid-template-columns: repeat(2, 1fr);">
                                                <h4>Name: {{ $users->name }}</h4>
                                                {{-- <p>Department : {{ $users->department }}</p> --}}
                                                <p>Email: {{ $users->email }}</p>
                                                <p>Number : {{ $users->number }}</p>
                                                <p>Date Of Birth : {{ $users->date_of_birth }}</p>
                                                <p class="mb-0">Marital Status: {{ $users->marital_status }}</p>
                                            </div>
                                            <p class="mt-3">{{ $users->message }}</p>
                                        </div>

                                        <form action="{{ route('admin-reply-mail') }}" method="post" class="d-flex mb-3">
                                            @csrf
                                            <input type="hidden" value="{{ $users->id }}" name="id" >
                                            <input type="hidden" value="{{ $users->name }}" name="name" >
                                            <input type="hidden" value="{{ $users->email }}" name="email" >
                                            <textarea name="reply" class="form-control w-90" placeholder="Reply.."></textarea>
                                            <button type="submit" class="btn btn-success">Send</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                @endif


                            </div>
                          </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

@section('customjs')



@endsection
