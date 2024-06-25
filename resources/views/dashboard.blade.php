@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            @foreach ($products as $product)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->detail }}</td>
                                        <td>
                                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection