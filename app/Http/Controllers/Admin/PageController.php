<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PageRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Support\Facades\App;

class PageController extends Controller
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

    /** add new pages **/
    public function store(Request $request){
        if ($request->isMethod('post')) {
            $this->validate($request,[
                'alias' => 'required|unique:pages,alias|string',
                'title_ru' => 'required|string',
                'is_active' => 'required|boolean',
                    ]
                );
            $fields = $request->all();
            $fields['alias'] = $request->alias;
            Page::create($fields);

            return redirect("/admin/pages");
        }else{
            return view('admin.pages.store');
        }
    }

    /** update pages **/
    public function edit(Request $request, Page $page){
        if ($request->isMethod('patch')) {
            $this->validate($request,[
                'title_ru' => 'required|string',
                'is_active' => 'required|boolean',
                    ]
                );
            $page->fill($request->all());
            $page->save();

            return redirect("/admin/pages");
        }else{
            return view('admin.pages.edit',['page'=> $page]);
        }
    }
    /** delete pages **/
    public function destroy(Request $request, Page $page){
        $page->delete();
        return redirect('/admin/pages');
    }
}
