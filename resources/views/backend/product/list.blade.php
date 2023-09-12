@extends('backend.index')
@section('title','List Product')
    
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div style="display: inline;">
            <?php $user = Auth::user(); ?>
            <p></p>
            <form class="form-inline my-2 my-lg-0" action="">
                
                <div class="col-lg-7">
                @if ($user->can('admin.product.create') && $user->can('admin.product.store'))
                    <a href="{{ route('admin.product.create') }}" class="btn btn-outline-primary">ADD PRODUCT</a>
                @endif
                <a href="{{route('admin.product.trashed')}}" class="btn btn-outline-success">TRASH</a>
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
        <h2>List of product</h2>
        <hr> 

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>sale_price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Author</th>
                    {{-- <th>Classify</th> --}}
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->sale_price}}</td>
                        <td>{{$item->quantity}}</td>
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
                            {{$item->author->name}}
                        </td>
                        {{-- <td>{{$item->dataClassify->name}}</td> --}}
                        <td>{{$item->description}}</td>
                        <td>
                            @if ($item->status)
                                <span >stocking</span>
                                @else
                                <span >out of stock</span>
                                
                            @endif
                        </td>
                        <td class="">
                            
                            @if ($user->can('admin.product.edit'))
                            <a href="{{route('admin.product.edit',$item->id)}}" class="btn btn-outline-success">EDIT</a>
                            @endif
                            @if ($user->can('admin.product.destroy'))  
                            <form action="{{route('admin.product.destroy',$item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: white; border: none;">DELETE</button>
                            </form>
                            @endif
                            {{-- <a href="{{route('admin.product.trashed')}}" class="btn btn-outline-success">TRASH</a> --}}
                            
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{-- </div> --}}
    {{$products->appends(request()->all())->links()}}
</div>
@endsection
{{-- @endsection --}}