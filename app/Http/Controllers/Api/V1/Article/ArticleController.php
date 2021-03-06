<?php

namespace App\Http\Controllers\Api\V1\Article;

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
     * @return \App\Http\Resources\ArticleCollection
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
     * @return \App\Http\Resources\ArticleResource
     */
    public function store(Request $request)
    {
        // 存入資料庫
        $article = Article::create($request->all());

        // $request->all() 使用者輸入的值轉換成陣列。
        // [
        //     'title' => 'ModernWeb 21 好棒！',
        //     'content' => 'Victor 很開心，感謝你來聽'
        // ];

        // 回傳統一格式
        // Http status 201
        return new ArticleResource($article);
    }

    /**
     * 查詢單一文章資料
     *
     * @param  \App\Models\Article  $article
     * @return \App\Http\Resources\ArticleResource
     */
    public function show(Article $article)
    {
        // Http status 200
        return new ArticleResource($article);
    }

    /**
     * 更新文章資料
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \App\Http\Resources\ArticleResource
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        // $request->all() 使用者輸入的值轉換成陣列。
        // [
        //     'title' => 'ModernWeb 21 好棒！- 修改後',
        // ]

        // Http status 200
        return new ArticleResource($article);
    }

    /**
     * 刪除文章資料
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
