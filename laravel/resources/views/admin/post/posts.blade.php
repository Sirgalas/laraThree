@extends('admin.layouts.main',['title'=>'Posts'])
@section('breadcrumb')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Version 2.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                    <a href="{{route('post_create')}}" class="btn btn-primary">Create</a>
                </div>
                <div class="box-body">
                    @include('admin.include.grid')
                </div>
            </div>
        </div>
    </div>
@endsection