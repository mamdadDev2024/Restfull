<?php

use App\Contracts\BaseService;
use App\Models\Article;
use App\Models\Comment;
class CommentService extends BaseService 
{

    public function create(Article $article , array $data)
    {
        return app(BaseService::class)(function () use ($article , $data){
            return $article->comments->create($data);
        });
    }

    public function update(Comment $comment, array $data)
    {
        return app(BaseService::class)(function () use ($comment , $data){
            return $comment->update($data);
        });
    }

    public function delete(Comment $comment)
    {
        return app(BaseService::class)(function () use ($comment){
            return $comment->delete();
        });
    }
    public function index()
    {
        return app(BaseService::class)(function () {
            return Comment::all()->toResourceCollection();
        });
    }

    public function show(Comment $comment)
    {
        return app(BaseService::class)(function () use($comment) {
            return $comment->toResource();
        });
    }
}