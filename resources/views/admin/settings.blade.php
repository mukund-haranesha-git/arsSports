@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper" style="min-height: 946px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$menu}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('admin/settings')}}">{{$menu}}</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            @include ('admin.error')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit {{$menu}}</h3>
                        </div>
                        {!! Form::model($settings,['url' => url('admin/settings/'.$settings->id),'method'=>'post','id' => 'foodForm','class' => 'form-horizontal','files'=>true]) !!}
                        <div class="card-body">
                            <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" for="phone2">Phone Number <span class="text-red"></span></label>
                                <div class="col-md-6">
                                    {!! Form::text('phone2', null, ['class' => 'form-control', 'placeholder' => 'Enter Phone']) !!}
                                    @if ($errors->has('phone2'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('phone2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" for="email">Email <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email']) !!}
                                    @if ($errors->has('email'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" for="address1">Address Line 1 <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                    {!! Form::text('address1', null, ['class' => 'form-control', 'placeholder' => 'Enter Address Line 1']) !!}
                                    @if ($errors->has('address1'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('address1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" for="address2">Address Line 2 <span class="text-red"></span></label>
                                <div class="col-md-6">
                                    {!! Form::text('address2', null, ['class' => 'form-control', 'placeholder' => 'Enter Address Line 2']) !!}
                                    @if ($errors->has('address2'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('address2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" for="facebook">Facebook Link <span class="text-red"></span></label>
                                <div class="col-md-6">
                                    {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'Enter Facebook Link']) !!}
                                    @if ($errors->has('facebook'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('facebook') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                                <label class="col-md-12 control-label" for="instagram">Instagram Link <span class="text-red"></span></label>
                                <div class="col-md-6">
                                    {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'Enter Instagram Link']) !!}
                                    @if ($errors->has('instagram'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('instagram') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info pull-right" type="submit">Update</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

