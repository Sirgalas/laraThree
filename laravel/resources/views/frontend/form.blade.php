@extends('frontend.layouts.master',['title'=>'Создать'])
@section('content')

    <!-- CONTENT POST -->
    <section id="post" class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="post-title text-center">
                        <h2>Contact</h2>
                        <div class="subtitle-underline">
                            <p>let's get going</p>
                        </div>
                    </div>
                    <div class="content-post">
                        <h4>Have a new project? Let's work on it together. We’re always looking to collaborate with local sponsors who align with our values. Connect with us at <a href="mailto:hello@email.com">hello@email.com</a> or drop us a line in the form below!</h4>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 col-md-offset-2 contact-form">
                    <div class="col-md-12 contact-wrapper">

                        {{Form::open(['route'=>['post_create',$post],'method'=>'post','class'=>"form-control-contact",'files'=>'true'])}}
                            <div class="col-md-6 col-sm-6 col-xs-12 control-group">
                                <div class="controls">
                                    {{Form::text('title',$post->title,['class'=>"form-control-contact-page", 'placeholder'=>"Title*", "id"=>"name",'required'=>true, 'data-validation-required-message'=>"Please enter title post"])}}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-group">
                                <div class="controls">
                                    {{Form::hidden('user_id',Auth::user()->id)}}
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 control-group">
                                <div class="controls">
                                    {{Form::textarea('desc',$post->desc,["class"=>"form-control-contact-page", "placeholder"=>"description *", "id"=>"message", "required"=>true, "data-validation-required-message"=>"Please enter your description", "maxlength"=>"999"])}}
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 control-group">
                                <div class="controls">
                                    {{Form::file('image',["class"=>"btn btn-default btn-lg pull-right send"])}}
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="success"></div> <!-- For success / fail messages -->
                                <button type="submit" class="btn btn-default btn-lg pull-right send">Send</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / CONTENT POST -->
@endsection


