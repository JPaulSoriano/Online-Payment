@extends('layouts.app')
 
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
    <a class="btn btn-success btn-sm my-2" href="{{ route('methods.create') }}">Create</a> 
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
        <div class="card">
            <div class="card-header bg-primary text-white">Methods</div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($methods as $method)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $method->name }}</td>
                        <td>
                            <form action="{{ route('methods.destroy',$method->id) }}" method="POST">
                
                                <a class="btn btn-primary btn-sm" href="{{ route('methods.edit',$method->id) }}">Edit</a>
            
                                @csrf
                                @method('DELETE')
                
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            
                {!! $methods->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection