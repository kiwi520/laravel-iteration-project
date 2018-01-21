@extends("front.layout.main")
@section("content")
    @if($article)
        <div class="col-sm-8 blog-main">
            <form action="/front/index/update/{{$article->id}}" method="POST">
                {{method_field("PUT")}}
                {{csrf_field()}}
                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" placeholder="这里是标题" value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea id="content" name="content" class="form-control" style="height:400px;max-height:500px;"  placeholder="这里是内容">{!! $article->content !!}</textarea>
                </div>
                @include("front.layout.error")
                <button type="submit" class="btn btn-default">提交</button>
            </form>
            <br>
        </div><!-- /.blog-main -->
    @endif
@endsection
