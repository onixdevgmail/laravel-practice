@extends('core-api::app')
@section('content')
    <div class="form-inline">
        <a href="{{route('core-api.create-customer')}}" class="btn btn-success">Add Customer</a>
        <a href="{{route('core-api.create-product')}}" class="btn btn-success">Add Product</a>
    </div>
    {!! Form::close() !!}
    <hr>
    <h4>Customers : </h4>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Products</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->firstName}}</td>
                <td> {{$customer->lastName}}</td>
                <td> {{$customer->dateOfBirth}}</td>
                <td>
                    @if (!$customer->products->isEmpty())
                    <table class="table table-condensed table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Issn</th>
                        </thead>
                        <tbody>
                        @foreach($customer->products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->issn}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
