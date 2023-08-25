@extends('backend.index')
@section('title','list Account')
    
@section('content')
<div id="page-wrapper"> 
    <div class="row">
        <div style="display: inline;">
            <?php $user = Auth::user(); ?>
            <p></p>
            <form class="form-inline my-2 my-lg-0" action="">
                
                <div class="col-lg-7">
                @if ($user->can('admin.account.create') && $user->can('admin.account.store'))
                    <a href="{{ route('admin.account.create') }}" class="btn btn-outline-primary">ADD ACCOUNT</a>
                @endif
                <a href="{{route('admin.account.trashed')}}" class="btn btn-outline-success">TRASH</a>
                </div>
                <div class="col-lg-5 right">
                    <input class="form-control mr-sm-2" style="width: 80%;" name="key" placeholder="Search by name..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @if (session('success'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong style="color:brown">
                    {{ session('success') }}
                </strong>
            </div>
        @endif
        
    </div>
            <h2>List of Account </h2>
            <p></p>
            <div class="row">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>PERMESSION</th>
                            <th>CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($account as $items)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->email}}</td>
                                <td>{{ $items->phone}}</td>
                                <td>
                                @foreach($items->getRoles as $p)
                                    {{$p->name}}
                                @endforeach
                                </td>
                                <td class="d-flex">
                                
                                    @if ($user->can('admin.account.destroy'))  
                                        <form action="{{route('admin.account.destroy',$items->id)}}" method="post" >
                                    @endif
                                    @if ($user->can('admin.account.edit') && $user->can('admin.account.update' ))
                                    <a href="{{route('admin.account.edit',$items->id)}}" class="btn btn-outline-success">Edit</a>    
                                    @endif
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure ? ')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    {{$account->links() }}
</div>
@endsection