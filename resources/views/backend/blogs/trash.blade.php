@extends('backend.index')
@section('title','list blog delete')
    
@section('content')
<div id="page-wrapper"> 
    <div class="container-fluid">
        <div class="row">
             <?php $user = Auth::user(); ?>
                <form class="form-inline my-2 my-lg-0" action="">
                
                <div class="col-lg-7">
                @if ($user->can('admin.blog.index') )
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-primary">LIST BANNER</a>
                @endif
                
                </div>
                <div class="col-lg-5 right">
                    <input class="form-control mr-sm-2" style="width: 80%;" name="key" placeholder="Search by name..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </div>
            </form>
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
                
                <h2>List of blog </h2>
                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NAME</th>
                            <th>IMAGE</th>
                            <th>TEXT</th>
                            <th>CONTENT</th>
                            <th>CRUD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog as $item)
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
                                
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge badge-primary ">Active</span>
                                    @else
                                        <span class="badge badge-danger">No Active</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    
                                    <a href="{{route('admin.blog.restore',$item->id)}}" class="btn btn-outline-success">BACK</a>
                                    <a href="{{route('admin.blog.deleteforce',$item->id)}}" onclick="return confirm('You want delete blog ?')" class="btn btn-outline-success">CLEAD</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    {{$blog->appends(request()->all())->links() }}
</div>
{{-- @endsection --}}
@endsection