<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            @foreach($keys as $key=>$name)
                @if(!is_array($name))
                    @include('admin.include.grid.default')
                @else
                    @include('admin.include.grid.'.$name[0],['key'=>$key])
                @endif

            @endforeach
            <th>
                <div class="form-group">
                    <label class="col-form-label">#</label>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>

        @foreach($model as $value)
        <tr>
            @foreach($keys as $key=>$name)

                @if(is_array($name))
                    @php
                        $name=$key
                    @endphp
                @endif
                    <td>{{$value->$name}}</td>
            @endforeach
            <td>
                <a href="{{route('post_edit',$value->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                <a href="{{route('post_show',$value->id)}}"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{url('admin/post/remove',$value->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
