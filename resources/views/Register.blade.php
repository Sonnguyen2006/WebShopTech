@extends('layouts.master')

@section('styles')
<link rel="stylesheet" href="resources/css/register.css">
@endsection

@section('content')
<div class="register-page">

   @if (session('success'))
       <div class="alert alert-success">
        {{ session('success') }}
       </div>   
   @endif
   @if ($errors->any())
   <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $$error)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
   </div>
   
   @endif

    <form action="{{ route('register') }}" method="post">
        @csrf
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        <label>Username</label>
        <input type="text" name="username" placeholder="username" value="{{ old('username') }}">

        <label>Email</label>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">

        <label>Password</label>
        <input type="password" name="password" placeholder="Password">

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm Password">

        <button type="submit">Register</button>
    </form>
</div>
@endsection
