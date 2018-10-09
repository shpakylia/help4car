<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PageRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Support\Facades\App;

class AdminPageController extends Controller
{

    protected $pages;
    public function __construct(PageRepository $pages)
    {
        $this->middleware('auth');
        $this->pages = $pages;
    }

//    list of pages
    public function index(Request $request){
        return view('admin.pages.index', [
            'pages' => $this->pages->pages_list()
            ]
        );

    }
    /*
     * create new page
     * */

    public function create(){
        return view('admin.pages.create');
    }

    /* save page
    */

    public function store(Request $request){
        $this->validate($request,[
                'alias' => 'required|unique:pages,alias|string',
                'title' => 'required|string',
                'is_active' => 'required|boolean',
            ]
        );
        Page::create($request->all());
        flash('Страница <b>'. $request->alias .'</b> успешно создана')->success();
        return redirect('admin/pages');
    }

    /*
     * edit page
     */

    public function edit(Page $page){
        return view('admin.pages.edit', ['page' => $page]);
    }
    /*
     * update page
     */

    public function update(Page $page, Request $request){
        $this->validate($request,[
                'title' => 'required|string',
                'is_active' => 'required|boolean',
            ]
        );
        $page->update($request->all());
        return redirect('admin/pages');


    }


    /*destroy page*/

    public function destroy(Page $page, Request $request){
        $page->delete();
        return redirect('/admin/pages');
    }

}
