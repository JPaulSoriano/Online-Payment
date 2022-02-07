@extends('layouts.app')

@section('content')
<h3 class="font-weight-bold text-primary">Dashboard</h3>
@can('isUser')
    <div class="row justify-content-center">
        <div class="col-md-4 my-2">
            <div class="card">
                <div class="card-header bg-primary text-white">Payments</div>
                <div class="card-body text-center">
                <h3>{{ $payments}}</h3>
                <a href="{{ route('payments.index') }}">Show</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-2">
            <div class="card">
                <div class="card-header bg-primary text-white">Unclaimed</div>
                <div class="card-body text-center">
                <h3>{{ $unverified}}</h3>
                <a href="{{ route('unverified') }}">Show</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 my-2">
            <div class="card">
                <div class="card-header bg-primary text-white">Unverified</div>
                <div class="card-body text-center">
                <h3>{{ $unclaimed}}</h3>
                <a href="{{ route('unclaimed') }}">Show</a>
                </div>
            </div>
        </div>
    </div>
@endcan
@endsection
