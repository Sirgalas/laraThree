<div class="box">
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-condensed">
            <tr>
                <th>key</th>
                <th>value</th>
            </tr>
            @foreach($model->getAttributes() as $key=>$value)
            <tr>
                <td>{{$key}}</td>
                <td>{{$value}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.box-body -->
</div>
