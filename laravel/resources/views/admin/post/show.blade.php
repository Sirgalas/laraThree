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
                    <h3 class="box-title">{{$model->title}}</h3>
                </div>
                <div class="box-body">
                    @include('admin.include.detail',['name'=>'Post '.$model->name,'model'=>$model])
                </div>
            </div>
        </div>
    </div>
@endsection
