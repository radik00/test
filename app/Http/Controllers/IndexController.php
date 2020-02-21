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
        $articles=Article::select(['title', 'description', 'img', 'id'])->get();
        return view('index')->with(['hw'=>$hw, 
                                    'ms'=>$ms, 
                                    'articles'=>$articles]);
        
    }
    public function page1(){
        return view('page1');
    }

    public function show($id){
        $article = Article::select(['id','title','text'])->where('id',$id)->first();
         return view('article-content')->with(['ms'=>$this->ms,'hw'=>$this->hw,'article'=>$article ]);}

    protected $ms;
    protected $hw;

    public function __construct(){
        $this->hw = 'Hello World!!';
        $this->ms = 'This is a template for a simple marketing or';
    }
}