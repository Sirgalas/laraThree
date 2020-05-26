@extends('admin.layouts.main',['title'=>'Admin'])
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
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {{Form::model([$post,'route'=>'post_store','method'=>'put','class'=>"form-control-contact",'files'=>'true'])}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    {{Form::text('title',$post->title,['class'=>"form-control", 'placeholder'=>"Title*", "id"=>"title"])}}
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    {{Form::select('user_id',$users,$post->user_id,['class'=>"form-control select2","id"=>"user_id"])}}
                </div>
                <div  class="form-group">
                    <label for="editor1">Description</label>
                    {{Form::textarea('desc',$post->desc,["class"=>"form-control", "placeholder"=>"description *", "id"=>"editor1", "maxlength"=>"999"])}}
                </div>
                <div  class="form-group">
                    {{Form::file('image',["class"=>"fileinput",'data_src'=>$file,'data_config'=>$config])}}
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        {{ Form::close() }}
    </div>
@endsection
