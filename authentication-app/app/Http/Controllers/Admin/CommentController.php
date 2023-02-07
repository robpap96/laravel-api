<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     *  Remove the specified resource from storage.
     * 
     * @param \App\Models\Comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment) {
        $project = $comment->project;

        $comment->delete();

        return redirect()->route('admin.projects.show', $project);
    }
}
