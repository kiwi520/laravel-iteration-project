@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            <li style="padding-left: 10px">{{$error}}</li>
        @endforeach
    </div>
@endif