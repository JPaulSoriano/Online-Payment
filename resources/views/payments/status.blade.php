@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('status') }}" method="GET">
                <div class="row">

                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Reference Number" name="status"/>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <button class="btn btn-primary" type="submit">Check</button>
                    </div>
                </div>
            </form>
        </div>
    </div>






    <div class="row justify-content-center">
        <div class="col-lg-6">
                @foreach ($payments as $payment)
                    <div class="row">
                        @if(!$payment->payment_ref)
                        <div class="col-sm-12 text-center">
                            <div class="alert alert-danger" role="alert">
                            You have not yet paid for payment <span class="mx-2"><a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-primary" type="submit">Pay Now</a></span>
                            </div>
                        </div>
                        @else
                        @endif
                    </div>       
                    <div class="card mb-3 my-5">
                        <div class="card-header bg-primary text-white">{{ $payment->ref_no }}</div>
                        <div class="card-body font-weight-bold">
                            <label class="text-muted">Name</label>
                            <p>{{ $payment->full_name }}</p>
                            <label class="text-muted">Student Number</label>
                            <p>{{ $payment->stud_no }}</p>
                            <label class="text-muted">Course</label>
                            <p>{{ $payment->course->name }}</p>
                            <label class="text-muted">Year</label>
                            <p>{{ $payment->year->name }}</p>
                            <label class="text-muted">Payment Method</label>
                            <p>{{ $payment->method->name }}</p>
                            <label class="text-muted">Payment For</label>
                            <p>{{ $payment->for }}</p>
                            <label class="text-muted">Total Amount</label>
                            <p>{{ $payment->amount }}</p>
                            <label class="text-muted">Status</label>
                            <p>
                                @if($payment->status == 1)
                                    <span class="badge badge-success">Verified</span>
                                @else
                                    <span class="badge badge-danger">Unverified</span>
                                @endif
                                @if($payment->claim == 1)
                                    <span class="badge badge-success">Claimed</span>
                                @else
                                    <span class="badge badge-danger">Unclaimed</span>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>

@endsection