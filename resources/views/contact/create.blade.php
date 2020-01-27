@extends('layouts.app')
@section('content')

<h3>Contact Us</h3>

<form action=" {{ route('contact.store') }} " method="POST"> <!-- //meio que é criar um email -->

    @if(session()->has('message'))
    <div class="alert alert-success" role="alert"> 
        <strong>Success</strong> {{ session()->get('message') }}
        </div>
    @endif
    

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name')}}" class="form-control">
            <div>{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ old('email')}}" class="form-control">
        <div>{{ $errors->first('email') }}</div>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{ old('message') }}</textarea>
        <div>{{ $errors->first('message') }}</div>
    </div>

    @csrf

    <button type="submit" class="btn btn-dark">Send!</button>

</form>

@endsection