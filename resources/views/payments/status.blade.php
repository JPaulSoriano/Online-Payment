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
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-sm-12">
                                    <p class="bg-primary text-white">Name</p>
                                    <p>{{ $payment->full_name }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="bg-primary text-white">Student No</p>
                                    <p>{{ $payment->stud_no }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="bg-primary text-white">Course</p>
                                    <p>{{ $payment->course->name }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <p class="bg-primary text-white">Year</p>
                                    <p>{{ $payment->year->name }}</p>
                                </div>

                                <div class="col-sm-12">
                                    <p class="bg-primary text-white">Payment Method</p>
                                    <p>{{ $payment->method->name }}</p>
                                </div>

                                <div class="col-sm-12">
                                    <p class="bg-primary text-white">Payment For</p>
                                    <p>{{ $payment->for }}</p>
                                </div>

                                <div class="col-sm-12">
                                    <p class="bg-primary text-white">Amount</p>
                                    <p>{{ $payment->amount }}</p>
                                </div>

                            </div>
                        </div>
                            @if($payment->status == 1)
                                <div class="card-footer text-center bg-success text-white">Verified</div>
                            @else
                                <div class="card-footer text-center bg-danger text-white">Unverified</div>
                            @endif
                    </div>
                @endforeach
        </div>
    </div>
</div>

@endsection