@extends('backend.index')
@section('content')
<div id="page-wrapper"> 
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
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
                <a href="{{ route('category.create') }}" class="btn btn-outline-success"> ADD CATEGORY</a>
                <p></p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAME</th>
                            <th>CLASSIFY</th>
                            <th>STATUS</th>
                            <th>CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->classifies->name}}</td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge badge-primary ">Active</span>
                                    @else
                                        <span class="badge badge-danger">No Active</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    
                                    <a href="{{route('category.edit',$item->id)}}" class="btn btn-outline-success">Edit</a>
                                    {{-- <form action="{{route('categories.destroy',$item->id)}}" method="post" >
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger" type="submit">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    {{-- {{$category->links() }} --}}
</div>
@endsection