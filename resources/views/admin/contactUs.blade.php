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
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 8%">Date & Time</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($contactUs as $index => $list)
                                    <tr class="ui-state-default">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            {{ $list['created_at']->format('d-m-Y') }}
                                            <br>
                                            {{ $list['created_at']->format('h:i A') }}
                                        </td>
                                        <td>{{ $list['name'] }}</td>
                                        <td>{{ $list['email'] }}</td>
                                        <td>{{ $list['message'] }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <span data-toggle="tooltip" title="Delete Contact" data-trigger="hover">
                                                    <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#myModal{{$list['id']}}"><i class="fa fa-trash"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <!--------------------------------DELETE MODEL-------------------------------->
                                    <div id="myModal{{$list['id']}}" class="modal modal-default" role="dialog">
                                        {{ Form::open(array('url' => 'admin/contactUs/'.$list['id'], 'method' => 'post','style'=>'display:inline')) }}
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content ml-0">
                                                <div class="modal-header bg-danger text-center">
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title">Delete Contact</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this contact?</p>
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
                            <div style="text-align:right;float:right;"> @include('admin.pagination.limit_links', ['paginator' => $contactUs])</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
