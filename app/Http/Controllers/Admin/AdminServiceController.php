<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service;

class AdminServiceController extends Controller
{
    protected $model;

    public function __construct(Service $model){
        $this->model = $model;

    }
    /*
     Show all services

     */
    public function index(Request $request, Service $service){
        $rootServices = $service->rootServices();
        return view('admin.services.index', ['services' => $rootServices]);
    }

    /*
     * create new service
     * */

    public function create(){
        $parentsSelect =$this->model->getParentsSelect();
        return view('admin.services.create', ['parentsSelect' => $parentsSelect]);
    }

    /* save service
    */

    public function store(Requests\ServiceRequest $request){
        Service::create($request->all());
        return redirect('admin/services');
    }

    /*
     * edit service
     */

    public function edit(Service $service){
        $parentsSelect = $this->model->getParentsSelect($service->id);
        return view('admin.services.edit', ['service' => $service, 'parentsSelect' => $parentsSelect]);
    }
    /*
     * update service
     */

    public function update(Service $service, Requests\ServiceRequest $request){
        $service->update($request->all());
        return redirect('admin/services');


    }

    public function updateImg(Service $service, Request $request){
        $service->img = '';
        $service->save();
        return redirect('admin/services/'.$service->id.'/edit');


    }

    /*destroy service*/

    public function destroy(Service $service, Request $request){
        $service->where('id',$service->id)->delete();
        return redirect('admin/services');
    }


}
