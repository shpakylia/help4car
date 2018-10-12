<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\PageRepository;
use App\Page;

/**
 * Class for working with pages
 *
 * Class AdminPageController
 * @package App\Http\Controllers\Admin
 */
class AdminPageController extends Controller
{
    /**
     * @var PageRepository
     */
    protected $pages;

    /**
     * AdminPageController constructor.
     * @param PageRepository $pages
     */
    public function __construct(PageRepository $pages)
    {
        $this->middleware('auth');
        $this->pages = $pages;
    }

    /**
     * get all pages
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $pages = $this->pages->pages_list();
        return view('admin.pages.index', compact('pages'));

    }

    /**
     * create new page. return form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('admin.pages.create');
    }

    /**
     * save page with request
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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

    /**
     * Edit a page by ID
     *
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit(Page $page){
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update page by ID with request
     *
     * @param Page $page
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
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

    /**
     * Delete Page by ID
     *
     * @param Page $page
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Page $page, Request $request){
        $page->delete();
        return redirect('/admin/pages');
    }

}
