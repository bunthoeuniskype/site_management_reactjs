<?php

namespace App\Api\Controllers;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use App\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticlesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ArticlesResource
     */
    public function index(Request $request)
    {   
        $limit = 3;
        if(isset($request->limit)){
            $limit = $request->limit;
        }
        return new ArticlesResource(Article::with(['author', 'comments.author'])->orderBy('id','desc')->paginate($limit));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,JWTAuth $JWTAuth)
    {
        //$token =  JWTAuth::parseToken();
        $user  = $JWTAuth->parseToken()->authenticate();       

        $article =  new Article;
        $article->content =  $request->content;
        $article->author_id = $user->id;
        $article->save();
       //  $data = ['img'=>$request->ss];
       //  $arr = [];
       //  foreach ($request->ss as $key => $value) {
       //     $arr[] = array('image' => $value);
       //  }
       // return json_encode($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article $article
     *
     * @return ArticleResource
     */
    public function show(Article $article)
    {
        ArticleResource::withoutWrapping();

        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
