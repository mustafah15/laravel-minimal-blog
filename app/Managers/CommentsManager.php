<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 3/23/17
 * Time: 1:25 AM
 */

namespace App\Managers;


use App\Repositories\CommentRepository;

class CommentsManager extends BaseManager
{

    protected $commentsRepository;

    /**
     * CommentsManager constructor.
     */
    public function __construct()
    {
        $this->commentsRepository = new CommentRepository();
    }


    /**
     * @param $postId
     * @return array
     */
    public function getCommentsForPostShow($postId)
    {
        return $this->commentsRepository->getCommentsByPostId($postId);
    }

    /**
     * @param $comment
     * @return array
     */
    public function wrap($comment)
    {
        return [
            'content' =>$comment['content'],
            'created' =>$comment['created_at'],
            'user'=>[
                'name'=> $comment['user']['name'],
            ]
        ];
    }
}