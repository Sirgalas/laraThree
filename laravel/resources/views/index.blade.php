@extends ('layouts.master',['title'=>'Главная'])
@include('include.home_header')
@section('content')
    <!-- CENTERED POSTS -->
        <section id="centered-posts" class="centered-posts">
            <div class="container">
                <div class="row">
                    @foreach($tops as $key=>$top)

                        <div class="col-lg-{{$key==1?6:3}} col-md-12">
                            <div class="img-view">
                                <a href="{{url('/posts/one',$top->id)}}"><img class="img-responsive" src="{{$top->file->url}}" alt=""></a>
                            </div>
                            <div class="wrapper-title">
                                <h3><a class="underline" href="{{url('post',$top->id)}}">{{$top->title}}</a></h3>
                                <p>{{$top->desc}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- / CENTERED POSTS -->

        <!-- BOTTOM POSTS -->
        <section id="bottom-posts" class="section-bottom-blog">
            <div class="container">
                <div class="row">
                    @foreach($bottoms as $bottom)
                        <div class="img-wrapper">
                            <div class="col-lg-4 col-md-12">
                                <figure class="img-effect">
                                    <img class="img-responsive" src="{{$bottom->file->url}}" alt="">
                                    <figcaption>
                                        <h2>{{$bottom->title}}</h2>
                                        <p>{{$bottom->desc}}</p>
                                        <a href="{{url('/posts/one',$bottom->id)}}">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- / BOTTOM POSTS -->
@endsection
