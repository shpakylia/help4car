<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service;

/**
 * Class to work with services
 *
 * Class AdminServiceController
 * @package App\Http\Controllers\Admin
 */
class AdminServiceController extends Controller
{
    /**
     * AdminServiceController constructor.
     */
    public function __construct(){
        $this->middleware('auth');

    }

    /**
     * Get tree of service. Tree contain parent category and children category.
     *
     * @param Request $request
     * @param Service $service
     * @uses Service::rootServices() to get all services
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Service $service){
        $rootServices = $service->rootServices();
        return view('admin.services.index', ['services' => $rootServices]);
    }

    /**
     * Create new Service
     *
     * @uses Service::getParentsSelect() get all parent servicec with parent_id = 0
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Service $service){
        $parentsSelect =$service->getParentsSelect();
        return view('admin.services.create', ['parentsSelect' => $parentsSelect]);
    }

    /**
     * Store new Service
     *
     * @param Requests\ServiceRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Requests\ServiceRequest $request){
        Service::create($request->all());
        flash('Услуга <b>'. $request->title .'</b> успешно создана')->success();
        return redirect('admin/services');
    }

    /**
     * Edit Service by ID
     *
     * @uses Service::getParentsService() to get array of services ids for select
     * @param Service $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Service $service){
        $parentsSelect = $service->getParentsService();
        return view('admin.services.edit', compact('service', 'parentsSelect'));
    }

    /**
     * Update service by ID
     *
     * @param Service $service
     * @param Requests\ServiceRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Service $service, Requests\ServiceRequest $request){
        $service->update($request->all());
        return redirect('admin/services');


    }

    /**
     * Destroy image by current service
     *
     * @param Service $service
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyImg(Service $service, Request $request){
        $service->img = '';
        $service->save();
        return redirect('admin/services/'.$service->id.'/edit');


    }

    /**
     * Delete Service by ID
     *
     * @param Service $service
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Service $service, Request $request){
        $service->delete();
        return redirect('admin/services');
    }


}
