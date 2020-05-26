@extends('admin.layouts.main',['title'=>'Admin'])
@section('breadcrumb')
    <section class="content-header">
        <h1>@lang('admin.Post')</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('admin.Create') </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {{Form::open(['route'=>['post_store',$post],'method'=>'post','class'=>"form-control-contact",'files'=>'true','enctype'=>"multipart/form-data"])}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">@lang('admin.Title')</label>
                    {{Form::text('title','',['class'=>"form-control", 'placeholder'=>"Title*", "id"=>"title"])}}
                </div>
                <div class="form-group">
                    <label for="user_id">@lang('admin.User')</label>
                    {{Form::select('user_id',$users,'',['class'=>"form-control select2","id"=>"user_id"])}}
                </div>
                <div  class="form-group">
                    <label for="editor1">@lang('admin.Description')</label>
                    {{Form::textarea('desc','',["class"=>"form-control", "placeholder"=>"description *", "id"=>"editor1", "maxlength"=>"999"])}}
                </div>
                <div  class="form-group">
                    {{Form::file('image',["class"=>"fileinput"])}}
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('admin.Save')</button>
            </div>
        {{ Form::close() }}
    </div>
@endsection
