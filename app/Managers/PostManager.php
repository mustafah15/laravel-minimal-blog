<?php

namespace App\Managers;

use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostManager extends BaseManager
{
    protected $postRepository ;

    /**
     * PostManager constructor.
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    /**
     * @param $postId
     * @return array
     */
    public function getSinglePost($postId)
    {
        $post = $this->postRepository->getPostWithUserById($postId);

        return $this->wrap($post[0]->toArray());
    }

    /**
     * @param $postId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deletePostWithId($postId)
    {
        $post = $this->postRepository->getItemByID($postId);

        //if post not exist
        if (!$post) {
            return redirect(route('managePosts'));
        }

        $post->delete();

        return redirect(route('managePosts'));
    }

    /**
     * @param $postId
     * @param $data
     * @return mixed
     */
    public function updatePostWithId($postId, $data)
    {
        unset($data['_token']);

        return $this->postRepository->editItem($postId, $data);
    }
    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function storeNewPost($data)
    {
        unset($data['_token']);
        $data['user_id'] = Auth::user()->id;

        return $this->postRepository->addItem($data);
    }
    /**
     * return all posts
     * @return array
     */
    public function getAllPosts()
    {
        $posts =  $this->postRepository->getPostsFullData();
        return $this->wrapCollection($posts->toArray());
    }

    /**
     * Default Wrapper for post API
     * @param $post
     * @return array
     */
    public function wrap($post)
    {
        return [
            'title' => $post['title'],
            'content'=> $post['content'],
            'id'=>$post['id'],
            'url'=>route('post.show', ['postId'=>$post['id']]),
            'user' =>
                [
                    'name' => $post['user']['name'],
                    'email' => $post['user']['email'],
                ],
            'category'=>
                [
                    'name'=>$post['category']['name'],
                    'id'=>$post['category']['id']
                ],
            'created'=> $post['created_at'],
        ];
    }

    /**
     * @param $post
     * @return array
     */
    public function wrapperForCategoryListing($post)
    {
        return [
            'title' => $post['title'],
            'content'=> $post['content'],
            'id' => $post['id'],
            'url' => route('post.show', ['postId'=>$post['id']]),
            'created' => $post['created_at'],
        ];
    }
}