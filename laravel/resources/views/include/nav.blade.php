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
                <li> <a href="{{ url('/') }}">Home</a> </li>
                <li class=""><a href="{{ url('/posts')}}">Blog</a></li>
                <li class=""><a href="store.html">Store</a></li>
                <li class=""><a href="{{ url('/names')}}">Contact</a></li>
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
