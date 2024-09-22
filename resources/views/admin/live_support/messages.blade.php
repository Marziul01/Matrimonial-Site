@extends('admin.master')

@section('title')
    Users
@endsection

@section('content')
<ul>
    @foreach($users as $user)
        <li>
            <a href="{{ route('admin.live_support.chat', $user->user_id) }}">
                Chat with User {{ $user->user_id }} - Last message at {{ $user->last_message_time }}
            </a>
        </li>
    @endforeach
</ul>

@endsection
