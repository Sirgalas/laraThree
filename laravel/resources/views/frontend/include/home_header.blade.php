<header id="top" class="featured-posts">
    <div class="container">
        <div class="row">
            @foreach($headers as $key=>$header)
            <div class="img-wrapper">
                <div class="col-lg-{{$key==1?4:8}} col-md-12">
                    <figure class="img-effect">
                        <img class="img-responsive" src="{{$header->file->url}}" alt="">
                        <figcaption>
                            <h2>{{$header->author->fullName}}</h2>
                            <p>{{$header->title}}</p>
                            <a href="{{url('/posts/one',$header->id)}}">View more</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</header>
