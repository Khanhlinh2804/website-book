@extends('backend.index')
@section('title','list Account')
    
@section('content')
<div id="page-wrapper"> 
    <div class="container-fluid">
        <div class="row">
                @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>
                            {{ session('success') }}
                        </strong>
                    </div>
                @endif
                <div class="col-lg-12">
                <a href="{{route('admin.role.create')}}" class="btn btn-outline-success"> ADD PERMISSION</a>
                <h2>List of permission </h2>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAME</th>
                            {{-- <th>CRUD</th> --}}
                            <th>CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $item)
                            <tr>

                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->name }}</td>
                                <td class="d-flex">
                                    
                                    <form action="{{route('admin.role.destroy',$item->id)}}" method="post" >
                                        <a href="{{route('admin.role.edit',$item->id)}}" class="btn btn-outline-success">Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    {{$role->links() }}
</div>
{{-- @endsection --}}
@endsection