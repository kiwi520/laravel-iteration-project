<?php
/**
 * Created by PhpStorm.
 * User: kiwi
 * Date: 2018/1/21
 * Time: 11:35
 */

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $articles = Article::orderBy("updated_at","desc")->paginate(7);
        return view("front.index.index",compact('articles'));
    }

    public function show(Article $article){
//        if ($id && is_numeric($id)){
//            $article = Article::where(["id"=>$id])->get();
//            echo "<br>";
//            print_r($article);
            return view("front.index.show",compact('article'));
//        }
//        return view("front.index.show");
    }
    public function create(){
        return view("front.index.create");
    }
    public function store(Request $request){
        if($request->isMethod('post')){
            $article = new Article();
            $this->validate($request,[
                "title"=>"required|string|min:6|max:100",
                "content"=>"required|string|min:10",
            ],[
                'title.required' => '标题必须填写',
                'title.min' => '标题长度不能少于6个字符',
                'title.max' => '标题长度不能大于100个字符',
                'content.required'  => '内容必须填写',
                'content.min'  => '内容不能少于10个字符',
            ]);
            $data = $request->except("_token");
            $article->title = $data['title'];
            $article->content = $data['content'];
            if($article->save()){
               return redirect("front/index/list");
            };
        }

    }

    public function upload(Request $request){
        $path = $request->file("wangEditorH5File")->storePublicly(md5(time()));

        return asset("storage/" .$path);
    }

    public function edit(Article $article){

        return view("front.index.edit",compact('article'));
    }

    public function update(Article $article){
        $this->validate(request(),[
            "title"=>"required|string|min:6|max:100",
            "content"=>"required|string|min:10",
        ],[
            'title.required' => '标题必须填写',
            'title.min' => '标题长度不能少于6个字符',
            'title.max' => '标题长度不能大于100个字符',
            'content.required'  => '内容必须填写',
            'content.min'  => '内容不能少于10个字符',
        ]);

        $article->title = request("title");
        $article->content = request("content");
        if($article->save()){
            return redirect("front/index/show/{$article->id}");
        };
//        return view("front.index.update");
    }

    public function delete(Article $article){
        $article->delete();
        return redirect("front/index/list");
    }
}