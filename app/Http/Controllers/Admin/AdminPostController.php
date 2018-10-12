<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Page;

/**
 * Class AdminPostController
 * @package App\Http\Controllers\Admin
 */
class AdminPostController extends Controller
{
    /**
     * add a middleware auth
     *
     * AdminPostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * get all posts with assosiate page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $posts = Post::with('page')->get();
        return view('admin.posts.index', compact('posts'));

    }

    /**
     * create new post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $pages = Page::all()->lists('title', 'id');
        return view('admin.posts.create', compact('pages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $this->validate($request,[
                'title' => 'required',
                'text' => 'required',
                'is_active' => 'required|boolean',
            ]
        );
        Post::create($request->all());
        flash('Статья <b>'. $request->title .'</b> успешно создана')->success();
        return redirect('admin/posts');
    }

    /**
     * edit post by ID
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post){
        $pages = Page::all()->lists('title', 'id');
        return view('admin.posts.edit', compact('post', 'pages'));
    }

    /**
     * Update post by ID
     *
     * @param Post $post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Post $post, Request $request){
        $this->validate($request,[
                'title' => 'required|string',
                'text' => 'required',
                'is_active' => 'required|boolean',
            ]
        );
        $post->update($request->all());
        flash('Статья <b>'. $request->title .'</b> успешно cохранена')->success();
        return redirect('admin/posts');
    }


    /**
     * Destroy post by ID
     *
     * @param Post $post
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Post $post, Request $request){
        $post->delete();
        flash('Статья удалена')->success();
        return redirect('/admin/posts');
    }
}
