<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\StoreArticleRequest;
use Carbon\Carbon;
use App\Http\Requests;
use App\article;
use App\tag;
class ArticleController extends Controller
{
    public function index(){
    	//$articles=Article::all();
        //$articles = Article::where('published_at','<=',Carbon::now())->latest()->get();
        $articles = Article::latest()->published()->get();
    	return view("articles.index",compact('articles'));
    }

    public function create(){
        $tags = Tag::lists('name', 'id');
        //为了在界面中显示标签name，id为了在保存文章的时候使用。
        return view('articles.create',compact('tags'));
    	
    }

    public function store(Requests\StoreArticleRequest $request){
    	
    	$input = $request->all();
        $input['intro'] = mb_substr($request->get('content'),0,64);
        $article=Article::create($input);
          $article->tags()->attac($request->input('tag_list'));
        return redirect('/');
    }

    public function edit($id){

        $article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');
        return view('articles.edit',compact('article','tags'));
    }

    public function update(Requests\StoreArticleRequest $request)
    {       
        //根据id查询到需要更新的article
        $article = Article::find($request->get('id'));
        //使用Eloquent的update()方法来更新，
        //request的except()是排除某个提交过来的数据，我们这里排除id
        $article->update($request->except('id'));
        // 跟attach()类似，我们这里使用sync()来同步我们的标签
        //$article->tags()->sync($request->get('tag_list'));
        return redirect('/');
    }
}
