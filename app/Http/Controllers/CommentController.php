<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $post = Post::findOrFail($request->post_id);

        $post->comments()->save($comment);

        redirect()->route('post' , ['post'=>$post,
            'comments'=>$post->comments()->get(),
        ]);
    }

    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = Post::findOrFail($request->get('post_id'));

        $post->comments()->save($reply);

        return back();

    }
}
