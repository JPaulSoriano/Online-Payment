@extends('layouts.app')
  
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row my-2">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-primary text-white">For</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Academic Year</label>
                                <select class="form-control" name="period_id">
                                    @foreach ($periods as $period)
                                        <option value="{{ $period->id }}">{{ $period->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Semester</label>
                                <select class="form-control" name="semester_id">
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-primary text-white">Payee Info</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="middlename" class="form-control" placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone No">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Student No</label>
                            <input type="text" name="stud_no" class="form-control" placeholder="Student Number">
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Course</label>
                                <select class="form-control" name="course_id">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Year</label>
                                <select class="form-control" name="year_id">
                                    @foreach ($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row my-2">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-primary text-white">Payment</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Payment Method</label>
                                <select class="form-control" name="method_id">
                                    @foreach ($methods as $method)
                                        <option value="{{ $method->id }}">{{ $method->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Reference No</label>
                            <input type="text" name="payment_ref" class="form-control" placeholder="Payment Referrence No">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Screenshot | Proof of Payment</label>
                            <input  class="form-control" type="file" name="image">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Payment For</label>
                            <input type="text" name="for" class="form-control" placeholder="Payment For">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="Amount">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-primary text-white">Payment Authorization</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="auth_lastname" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="auth_firstname" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="auth_middlename" class="form-control" placeholder="Middle Name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row my-2">
    <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-block btn-primary">Submit</button>
    </div>  
</div>
</form>
@endsection