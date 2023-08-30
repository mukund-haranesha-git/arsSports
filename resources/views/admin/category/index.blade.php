@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$menu}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/')}}">Home</a></li>
                            <li class="breadcrumb-item active">{{$menu}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @include ('admin.error')
            <div id="responce" class="alert alert-success" style="display: none">
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            {!! Form::open(['url' => url('admin/category'), 'method' => 'get', 'class' => 'form-horizontal','files'=>false]) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 mar-bot">
                                            <input  class="form-control" type="text" @if(!empty($search)) value="{{$search}}" @else placeholder="Search" @endif name="search" id="search">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-info mr-1" name="submit" value="Search">Search</button>
                                            <a href="{{url('admin/category')}}"><button type="button" class="btn btn-danger" name="submit" value="Search">Clear</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('admin/category') }}" ><button class="btn btn-default pull-right" type="button"><span class="fa fa-refresh"></span></button></a>
                                    <a href="{{ url('admin/category/create') }}"><button class="btn btn-info pull-right" type="button" style="margin-right: 1.5%;"><span class="fa fa-plus pr-1"></span> Add New</button></a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">#</th>
                                        <th>Name</th>
                                        <th style="width: 15%;">Status</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($category as $index => $list)
                                    <tr class="ui-state-default">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $list['name'] }}</td>
                                        <td>
                                            @if($list['status'] == 'active')
                                                <div class="btn-group-horizontal" id="assign_remove_{{ $list['id'] }}" >
                                                    <button class="btn btn-success unassign ladda-button" data-style="slide-left" id="remove" url="{{url('admin/category/unassign')}}" ruid="{{ $list['id'] }}"  type="button" style="height:28px; padding:0 12px"><span class="ladda-label">Active</span> </button>
                                                </div>
                                                <div class="btn-group-horizontal" id="assign_add_{{ $list['id'] }}"  style="display: none"  >
                                                    <button class="btn btn-danger assign ladda-button" data-style="slide-left" id="assign" uid="{{ $list['id'] }}" url="{{url('admin/category/assign')}}" type="button"  style="height:28px; padding:0 12px"><span class="ladda-label">In Active</span></button>
                                                </div>
                                            @endif
                                            @if($list['status'] == 'inactive')
                                                <div class="btn-group-horizontal" id="assign_add_{{ $list['id'] }}"   >
                                                    <button class="btn btn-danger assign ladda-button" id="assign" data-style="slide-left" uid="{{ $list['id'] }}" url="{{url('admin/category/assign')}}"  type="button" style="height:28px; padding:0 12px"><span class="ladda-label">In Active</span></button>
                                                </div>
                                                <div class="btn-group-horizontal" id="assign_remove_{{ $list['id'] }}" style="display: none" >
                                                    <button class="btn  btn-success unassign ladda-button" id="remove" ruid="{{ $list['id'] }}" data-style="slide-left" url="{{url('admin/category/unassign')}}" type="button" style="height:28px; padding:0 12px"><span class="ladda-label">Active</span></button>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                {{ Form::open(array('url' => 'admin/category/'.$list['id'].'/edit', 'method' => 'get','style'=>'display:inline')) }}
                                                <button class="btn btn-sm btn-info tip mr-2" data-toggle="tooltip" title="Edit Category" data-trigger="hover" type="submit" ><i class="fa fa-edit"></i></button>
                                                {{ Form::close() }}
                                                <span data-toggle="tooltip" title="Delete Category" data-trigger="hover">
                                                    <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#myModal{{$list['id']}}"><i class="fa fa-trash"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--------------------------------DELETE MODEL-------------------------------->
                                    <div id="myModal{{$list['id']}}" class="modal modal-default" role="dialog">
                                        {{ Form::open(array('url' => 'admin/category/'.$list['id'], 'method' => 'delete','style'=>'display:inline')) }}
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content ml-0">
                                                <div class="modal-header bg-danger text-center">
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title">Delete Category</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this category?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-outline pull-right">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align:right;float:right;"> @include('admin.pagination.limit_links', ['paginator' => $category])</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
