@extends('admin.layouts.app')
@section('content')
	<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$menu}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!--**********************************************COUNTERS**********************************************-->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <a href="{{url('admin/banner')}}" class="small-box-footer">
                            <div class="small-box bg-info-gradient">
                                <div class="inner">
                                    <h3>{{$total_banner}}</h3>
                                    <h4>Banners</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-image"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-6">
                        <a href="{{url('admin/category')}}" class="small-box-footer">
                            <div class="small-box bg-warning-gradient">
                                <div class="inner">
                                    <h3>{{$total_category}}</h3>
                                    <h4>Category</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-sitemap"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3 col-6">
                        <a href="{{url('admin/contactUs')}}" class="small-box-footer">
                            <div class="small-box bg-success-gradient">
                                <div class="inner">
                                    <h3>{{$total_contact}}</h3>
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
