<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save(Request $request) {
        $validate = $this->validate($request, [
            'figure_id' => ['integer', 'required'],
            'content' => ['string', 'required']
        ]);

        $user = Auth::user();
        $figure_id = $request->input('figure_id');
        $content = $request->input('content');

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->figure_id = $figure_id;
        $comment->content = $content;

        $comment->save();

        return redirect()->route('figure.detail', ['id' => $figure_id])->with([
            'message' => 'Comentario publicado con éxito'
        ]);
    }
}
