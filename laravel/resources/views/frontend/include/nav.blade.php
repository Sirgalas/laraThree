<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed text-center" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Mondrian</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li {{request()->is('/')?"class=active":''}}> <a href="{{ url('/') }}">Home</a> </li>
                <li {{request()->is('posts')?"class=active":''}}><a href="{{ url('/posts')}}">Blog</a></li>
                <li {{request()->is('names')?"class=active":''}}><a href="{{ url('/names')}}">Contact</a></li>
                @if(!Auth::check())
                    <li><a href="{{url('/login')}}">Log in</a> </li>
                    <li><a href="{{url('/register')}}">Sig in</a> </li>
                @else
                    <li><a href='#'>{{(Auth::user())->fullName}}"</a></li>
                @endif
                <li>
                    <form role="search" method="get" class="search-form">
                        <label> <input type="search" class="search-field" placeholder="Search" value="" name="s"></label>
                        <input type="submit" class="search-submit" value="">
                    </form>
                </li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>
