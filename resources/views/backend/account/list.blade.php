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
                <a href="{{route('account.create')}}" class="btn btn-outline-success"> ADD ACCOUNT</a>
                <p></p>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>ADDRESS</th>
                            <th>CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($account as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email}}</td>
                                <td>{{ $item->phone}}</td>
                                <td>{{ $item->address}}</td>
                                <td class="d-flex">
                                    
                                    <form action="{{route('account.destroy',$item->id)}}" method="post" >
                                        <a href="{{route('account.edit',$item->id)}}" class="btn btn-outline-success">Edit</a>
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
    {{$account->links() }}
</div>
{{-- @endsection --}}
@endsection