@extends('layouts.app')          
@section('title','Edit: '. $customer->name)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit {{ $customer->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.update', ['customer' => $customer])   }}" method="POST">
                @method('PATCH')
                @include('customers.form')

                <button type="submit" class="btn btn-primary">Add Customer</button>

                
            </form>
        </div>
    </div>
@endsection