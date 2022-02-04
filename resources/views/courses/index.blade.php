@extends('layouts.app')
 
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-10">
    <a class="btn btn-success btn-sm my-2" href="{{ route('courses.create') }}">Create</a> 
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
        <div class="card">
            <div class="card-header bg-primary text-white">Courses</div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->department->name }}</td>
                        <td>
                            <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                
                                <a class="btn btn-primary btn-sm" href="{{ route('courses.edit',$course->id) }}">Edit</a>
            
                                @csrf
                                @method('DELETE')
                
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            
                {!! $courses->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection