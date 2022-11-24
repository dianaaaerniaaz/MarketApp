<?php

namespace App\Http\Controllers;

use App\Models\Clothes;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request){
        $validated = $request->validate([
            'content' => 'required',
            'clothes_id' => 'required|numeric|exists:clothes,id',
        ]);
        Comment::create($validated + ['user_id'=>Auth::user()->id]);
        return back()->with('massage','comment is created');
    }
    public function destroy(Comment $comment){
        $this->authorize('delete',$comment);
        $comment->delete();
        return back()->with('massage','comment is delete');
    }
    public function show(Comment $comment,Clothes $clothes){
        return view('clothes.show', ['clothes'=>$comment->clothes,'comment' => $clothes->comments]);
    }
    public function edit(Comment $comment)
    {
        $this->authorize('update',$comment);
        return view('comments.edit', ['comment' => $comment,'clothes'=>$comment->clothes]);
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'content'=>$request->input('content'),
        ]);
        return redirect()->route('clothes.show',$comment->clothes_id);
    }

}
