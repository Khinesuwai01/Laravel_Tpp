@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @can('dashboard')
                        <a href="{{route('categoryIndex')}}" class="btn btn-dark">Category</a>
                    @endcan

                    @can('product_listing')
                        <a href="{{route('productProduct')}}" class="btn btn-dark">Product</a>
                    @endcan
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
