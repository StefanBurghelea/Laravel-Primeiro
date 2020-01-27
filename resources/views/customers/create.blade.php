@extends('layouts.app')
@section('content')
@section('title','Add Customers')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>aDD</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST">
                @include('customers.form')

                <button type="submit" class="btn btn-primary">Add Customer</button>

                
            </form>
        </div>
    </div>
@endsection