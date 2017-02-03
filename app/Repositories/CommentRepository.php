<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository
{
    protected $comment;

    /**
     * CommentRepository constructor.
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param $user_id, $meal_id, $request
     * @return 
     */
     public function createComment($user_id, $meal_id, $request)
     {
         return $this->comment->create([
             'user_id' => $user_id,
             'meal_id' => $meal_id,
             'content' => $request->content,
             'score' => $request->score
         ]);
     }
}