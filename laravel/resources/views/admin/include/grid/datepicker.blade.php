@php
/**
* @var string $key
* @var string $name
*/

    $keyTo=$key.'_to';
    $keyFrom=$key.'_from';
@endphp
<th>
    <div class="form-group input-daterange">
        <label for="id_{{$key}}" class="col-form-label">{{$key}}</label>
        <input id="id_{{$key}}"  type="text" name="{{$keyTo}}" class="form-control" value="{{ old($keyTo) }}">
        <div class="input-group-addon">to</div>
        <input class="form-control" name="{{$keyFrom}}" value="{{ old($keyFrom) }}">
    </div>
</th>
