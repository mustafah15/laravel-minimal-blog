<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Managers\PostManager;
use App\Post;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $postManager ;
    public function __construct()
    {
        $this->postManager = new PostManager();
    }

    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.home',['posts'=>$posts]);
    }

    /**
     * @param $postId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update ($postId, Request $request )
    {
        $post = $this->postManager->updatePostWithId($postId,$request->toArray());

        if(!$post)
            return redirect()->back()->withInput();

        return redirect(route('managePosts'));
    }

    /**
     * @param $postId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit ($postId )
    {
        $post = $this->postManager->getSinglePost($postId);
        $categories = (new CategoryRepository())->getAllItems();

        return view('admin.posts.edit',['post'=>$post,'categories'=>$categories]);
    }

    /**
     * @param $postId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy ( $postId )
    {
        return $this->postManager->deletePostWithId($postId);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = (new CategoryRepository())->getAllItems();

        return view('admin.posts.new',['categories'=>$categories]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (Request $request )
    {
        $post = $this->postManager->StoreNewPost($request->toArray());

        if (!$post)
            return redirect()->back()->withInput();

        return redirect(route('managePosts'));
    }
}