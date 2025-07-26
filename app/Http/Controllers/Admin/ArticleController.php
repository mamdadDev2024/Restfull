<?php

namespace App\Http\Controllers\Admin;

use App\Http\ApiRequest\Admin\Article\ArticleCreateRequest;
use App\Http\ApiRequest\Admin\Article\ArticleUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(private ArticleService $service){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleCreateRequest $request)
    {
        return $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return $this->service->show($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, Article $article)
    {
        return $this->service->update($article , $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        return $this->service->delete($article);
    }
}
