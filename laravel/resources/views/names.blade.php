@extends ('master')

@section('content')
    <div class="content">
        <div class="title m-b-md">Имена</div>
        @foreach ($names as $name)
                <p>{{$name->fullName}}</p>
        @endforeach
    </div>

@endsection
