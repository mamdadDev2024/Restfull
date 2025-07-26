<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Article;
use CommentService;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function __construct(private CommentService $service){}
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
    public function store(Article $article , StoreCommentRequest $request)
    {
        return $this->service->create($article , $request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $this->service->show($comment);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        return $this->service->update($comment , $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        return $this->service->delete($comment);
    }
}
