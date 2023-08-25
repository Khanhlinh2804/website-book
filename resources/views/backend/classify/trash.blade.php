@extends('backend.index')
@section('title','List Classily')
    
@section('content')
<div id="page-wrapper"> 
    <div class="container-fluid">
        <div class="row">
                <form class="form-inline my-2 my-lg-0" action="">
                
                <div class="col-lg-7">
                {{-- @if ($user->can('admin.classify.create') && $user->can('admin.classify.store')) --}}
                    <a href="{{ route('admin.classify.index') }}" class="btn btn-outline-primary">LIST CLASSIFY</a>
                {{-- @endif --}}
               
                </div>
                <div class="col-lg-5 right">
                    <input class="form-control mr-sm-2" style="width: 80%;" name="key" placeholder="Search by name..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </div>
            </form>
                 <h2>List of classify delete</h2>
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
                                    
                                    {{-- @if ($user->can('admin.classify.destroy')) --}}
                                        <a href="{{route('admin.classify.destroy',$item->id)}}" > CLEAD </a>
                                    {{-- @endif --}}
                                    {{-- @if($user->can('admin.classify.edit') && $user->can('admin.classify.update')) --}}
                                        <a href="{{route('admin.classify.restore',$item->id)}}"  class="btn btn-outline-success">BACK</a>
                                    {{-- @endif --}}
                                        
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