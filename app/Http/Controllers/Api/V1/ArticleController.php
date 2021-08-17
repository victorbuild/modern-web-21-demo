<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Article(文章) Controller(控制器)
 *
 * 一個網址，對應到一個方法，控制流程
 */
class ArticleController extends Controller
{
    /**
     * 文章列表的資料
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Http status 200
        return new ArticleCollection(Article::get());
    }

    /**
     * 新建文章的功能
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO 驗證使用者傳來的資料

        // 存入資料庫
        $article = Article::create($request->only(['title', 'content']));
        $article->refresh();
        //TODO 其他商業邏輯

        // 回傳統一格式
        // Http status 201
        return new ArticleResource($article);
    }

    /**
     * 單一文章資料
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // Http status 200
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->only(['title', 'content']));

        // Http status 200
        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        // Http status 204
        return response(null, Response::HTTP_NO_CONTENT);
    }
}