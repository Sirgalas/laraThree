@extends ('frontend.layouts.master',['title'=>$post->tilte])

@section('content')
    <section id="post" class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="post-title text-left">
                        <h2>{{$post->title}}</h2>
                        <div class="subtitle-underline">
                            <p class="col-md-6">The first manifesto of Spatialism</p>
                            <p class="col-md-6">{{$post->created_at}}</p>
                        </div>
                        @role('author'))
                            <a href="{{url('/posts/form')}}" class="btn btn-default">Создать новый</a>
                         @endrole
                    </div>
                    <div class="content-post">
                        <p>{{$post->desc}}</p>
                        <figure class="img-post">
                            <img class="img-responsive" src="{{$post->file->url}}" alt="">
                            <figcaption>{{$post->author->fullName}}</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
