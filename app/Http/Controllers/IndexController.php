<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class IndexController extends Controller
{
    //
    public function index(){
        $hw='Hello world!';
        $ms='This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';
        $articles=Article::select(['title', 'description', 'img', 'id', 'text'])->get();
        //dump($articles);
        return view('index')->with(['hw'=>$hw, 
                                    'ms'=>$ms, 
                                    'articles'=>$articles]);
    }

    public function page1(){
        $articles=Article::select(['title', 'description', 'img', 'id', 'text'])->get();
        return view('page1')->with(['articles'=>$articles]);
    }

    protected $ms;
    protected $hw;
    public function _construct(){
        $this->hw='Hello world!';
        $this->ms='This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';
    }

    public function show($id){
        $article=Article::select(['id', 'title', 'text', 'img'])->where('id', $id)->first();
        return view('article-content')->with(['ms'=>$this->ms,
                                            'hw'=>$this->hw,
                                            'article'=>$article
                                            ]);
    }

    public function add(){
        return view('add-content')->with(['hw'=>$this->hw, 'ms'=>$this->ms]);
    }

    public function store(Request $request){
        echo $request;
        $this->validate($request, ['title'=>'required | max:25',
                                    'description'=>'required',
                                    'text'=>'required',
                                    'img'=>'required']);
        $data = $request->all();
        $article = new Article;
        $article -> fill($data);
        $article -> save();

        return redirect('/');
    }
    
}