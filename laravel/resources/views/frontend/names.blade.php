@extends ('frontend.layouts.master',['title'=>'Контакты'])

@section('content')
    <div class="content">
        <div class="title m-b-md">Имена</div>
        @foreach ($names as $name)
                <p>{{$name->fullName}}</p>
        @endforeach
    </div>

@endsection
