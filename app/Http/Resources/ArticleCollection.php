<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function($article){
            return [
                'id' => $article->id,
                'title' => $article->title,
                'created_at' => $article->created_at ? $article->created_at->toDateTimeString() : null,
                'updated_at' => $article->updated_at ? $article->updated_at->toDateTimeString() : null,
            ];
        });
    }
}
