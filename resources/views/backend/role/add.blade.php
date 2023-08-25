@extends('backend.index')
@section('title', 'add role')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid" ng-app="role" ng-controller="RoleController">
        <div class="row">
            <form action="{{ route('admin.role.store') }}" method="post" role="form">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name permission</label>
                            <input type="text" name="name" class="form-control" placeholder="Product's Name"
                                value="{{ old('name') }}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <label for="">Route</label>
                        <div class="form-check" style="height: 300px; overflow: auto;">

                             {{-- c1: khó tìm hơn và nhiều data  --}}
                                @foreach ($routes as $item)  
                                <div>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="role-item" name="route[]"  value="{{$item}}">
                                        {{$item}}
                                    </label>
                                    </div> 
                                @endforeach

                                {{-- c2:de nhin hon --}}
                            {{-- <input type="text" name="keyname" class="form-control" placeholder="Filter Route"
                                ng-model="keyname">

                            <div class="checkbox" ng-repeat="key in roles | filter:keyname">
                                <label class="form-check-label ">
                                    <input type="checkbox" class="role-item" name="route[]" id=""
                                        ng-model="selectedRoles[key]" ng-true-value="'@{{ key }}'">
                                    @{{ key }}
                                </label>
                            </div> --}}
                        </div>

                    </div>
                </div>
                <div style="padding-top: 30px">

                    <button type="submit" style="padding-left: 20px; padding-right: 20px; padding-top: 5px; padding-bottom: 5px; ">Submit</button>
                    <label for="">
                        <input type="checkbox" class="" id="check-all">
                        Check all
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.0/angular.min.js"
    integrity="sha512-jiG+LwJB0bmXdn4byKzWH6whPpnLy1pnGA/p3VCXFLk4IJ/Ftfcb22katPTapt35Q6kwrlnRheK6UPOIdJhYTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" >
        var app = angular.module('role',[]);
        app.controller('roleController',function($scope){
            var roles = '<?php echo json_encode($routes) ; ?>';
            $scope.roles = angular.fromJson(roles);

            // jQuery
            $('#check-all').click(function () {
                $('.role-item').prop('checked', this.checked);
            });
        });
    </script>
@endsection
