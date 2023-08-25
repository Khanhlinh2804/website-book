@extends('backend.index')
@section('title','list Account')
    
@section('content')
<div id="page-wrapper"> 
    <div class="container-fluid">
        <div class="row">
            <?php $user = Auth::user(); ?>
                <form class="form-inline my-2 my-lg-0" action="">
                
                <div class="col-lg-7">
                @if ($user->can('admin.account.index') )
                    <a href="{{ route('admin.account.index') }}" class="btn btn-outline-primary">LIST ACCOUNT</a>
                @endif
                
                </div>
                <div class="col-lg-5 right">
                    <input class="form-control mr-sm-2" style="width: 80%;" name="key" placeholder="Search by name..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

                </div>
            </form>
                </div>
                <h2>List of Account  delete</h2>
                <p></p>
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
                                
                                   
                                    @if ($user->can('admin.account.restore') )
                                    <a href="{{route('admin.account.restore',$items->id)}}" class="btn btn-outline-success">back</a>    
                                    @endif
                                    <a href="{{route('admin.account.deleteforce',$items->id)}}" class="btn btn-outline-success">clead</a>    
                                       
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