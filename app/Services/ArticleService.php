<?php

namespace App\Services;

use App\Contracts\BaseService;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleService extends BaseService
{
    public function create(array $data)
    {
        return app(BaseService::class)(function () use($data){
            return Auth::user()->articles->create($data);
        });
    }

    public function update(Article $article, array $data)
    {
        return app(BaseService::class)(function () use($article , $data){
            return $article->update($data);
        });
        
    }

    public function delete(Article $article)
    {
        return app(BaseService::class)(function () use($article){
            return $article->delete();
        });
    }

    public function index()
    {
        return app(BaseService::class)(function (){
            return Article::all()->toResourceCollection();
        });
    }

    public function show(Article $article)
    {
        return app(BaseService::class)(function () use($article) {
            return $article->toResource();
        });
    }
}
