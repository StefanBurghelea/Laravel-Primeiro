@extends('layouts.app')
@section('content')
@section('title','Profile of '.  $customer->name )

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>{{ $customer->name }} Profile</h1>
            <p><a href="/customers/{{ $customer->id }}/edit">Edit Customer</a></p>
            <form action="/customers/{{ $customer->id}}" method="POST">
                @method('DELETE')
                @csrf

                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name: </strong>{{ $customer->name}}</p>
            <p><strong>Email: </strong>{{ $customer->email}}</p>
            <p><strong>Status: </strong>{{ $customer->active}}</p>
            <p><strong>Company: </strong>{{ $customer->company->name}}</p>

        </div>
    </div>

@endsection