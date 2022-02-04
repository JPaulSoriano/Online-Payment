@extends('layouts.app')
 
@section('content-fluid')
<div class="row">
    <div class="col-sm-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
        <div class="card">
            <div class="card-header bg-primary text-white">Payments</div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>No</th>
                        <th>Course</th>
                        <th>Student No</th>
                        <th>A.Y.</th>
                        <th>Semester</th>
                        <th>Name</th>
                        <th>Payment For</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $payment->course->name }}</td>
                        <td>{{ $payment->stud_no }}</td>
                        <td>{{ $payment->period->name }}</td>
                        <td>{{ $payment->semester->name }}</td>
                        <td>{{ $payment->full_name }}</td>
                        <td>{{ $payment->for }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>
                        <button type="button" class="btn btn-sm btn-primary btn-block my-1" data-toggle="modal" data-target="#modal-{{ $payment->id }}">View</button>
                        </td>
                        <td>
                            @if($payment->status == 1)
                                <form action="{{ route('unverify', $payment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-block my-1">Unverify</button>
                                </form>
                                @else
                                <a href="{{ route('verify', $payment) }}"class="btn btn-sm btn-success btn-block my-1">Verify</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
            
                {!! $payments->links() !!}
            </div>
        </div>
    </div>
</div>



    @foreach ($payments as $payment)
        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $payment->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                <div class="modal-body text-center">
                <img src="{{asset('storage/'.$payment->image)}}" class="img-fluid" alt="{{ $payment->payment_ref }}" width="300" height="300"/>
                    @if(!$payment->auth_firstname)
                        <p class="font-weight-bold my-3">STUDENT PROCESSED THE PAYMENT</p>
                    @else
                    <p class="font-weight-bold mt-5">PAYMENT AUTHORIZATION</p>
                    <p>{{ $payment->auth_full_name }}</p>
                    @endif
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection