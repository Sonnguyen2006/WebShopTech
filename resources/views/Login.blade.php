@extends('layouts.master')

@section('styles')
<link rel="stylesheet" href="resources/css/auth.css">
@endsection

@section('content')
<div class="auth-page">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="post">
        @csrf
        <h2>Login</h2>
        <label>Username</label>
        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</div>
@endsection
