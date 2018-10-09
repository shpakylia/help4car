<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use App\Page;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//    list of posts
    public function index(Request $request){
        $posts = Post::with('page')->get();
        return view('admin.posts.index', compact('posts'));

    }
    /*
     * create new post
     * */

    public function create(){
        $pages = Page::all()->lists('title', 'id');
        return view('admin.posts.create', compact('pages'));
    }

    /* save post
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

    /*
     * edit post
     */

    public function edit(Post $post){
        $pages = Page::all()->lists('title', 'id');
        return view('admin.posts.edit', compact('post', 'pages'));
    }
    /*
     * update post
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


    /*destroy page*/

    public function destroy(Post $post, Request $request){
        $post->delete();
        flash('Статья удалена')->success();
        return redirect('/admin/posts');
    }
}
