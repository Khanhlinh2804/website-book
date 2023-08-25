@extends('backend.index')
@section('title','List Classily')
    
@section('content')
<div id="page-wrapper"> 
    <div class="container-fluid">
        <div class="row">
             <div class="row">
        <div style="display: inline;">
            <?php $user = Auth::user(); ?>
            <p></p>
            <form class="form-inline my-2 my-lg-0" action="">
                
                <div class="col-lg-7">
                @if ($user->can('admin.classify.create') && $user->can('admin.classify.store'))
                    <a href="{{ route('admin.classify.create') }}" class="btn btn-outline-primary">ADD PRODUCT</a>
                @endif
                <a href="{{route('admin.classify.trashed')}}" class="btn btn-outline-success">TRASH</a>
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
                
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAME</th>
                            <th>IMAGE</th>
                            <th>STATUS</th>
                            <th>CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classify as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <style>
                                        .w-20{
                                            width: 120px;
                                            height: 150px;
                                        }
                                    </style>
                                    <img src="{{url('uploads')}}/{{$item->image}}" class="w-20" alt="">
                                </td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge badge-primary ">Active</span>
                                    @else
                                        <span class="badge badge-danger">No Active</span>
                                    @endif
                                </td>
                                <td >
                                    
                                    @if ($user->can('admin.classify.destroy'))
                                        <form action="{{route('admin.classify.destroy',$item->id)}}" method="post" >
                                    @endif
                                    @if($user->can('admin.classify.edit') && $user->can('admin.classify.update'))
                                        <a href="{{route('admin.classify.edit',$item->id)}}"  class="btn btn-outline-success">Edit</a>
                                    @endif
                                        @csrf
                                        @method('delete')
                                        <button style="background-color: white; border: none;" onclick="return confirm('you want delete classify ?')" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    {{$classify->links() }}
</div>
@endsection