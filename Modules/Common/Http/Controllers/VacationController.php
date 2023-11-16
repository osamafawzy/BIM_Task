<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Service\Vacation\VacationService;
use Modules\Common\ViewModel\VacationViewModel;

class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $VacationService;

    public function __construct()
    {
        $this->VacationService = new VacationService();
        $this->middleware(['auth:admin', 'prevent-back-history']);
        $this->middleware('permission:Index-vacation|Create-vacation|Edit-vacation|Delete-vacation', ['only' => ['index', 'store']]);
        $this->middleware('permission:Create-vacation', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit-vacation', ['only' => ['edit', 'update', 'activate']]);
        $this->middleware('permission:Delete-vacation', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $request_data = $request->all();
        $relation = ['admin', 'school'];
        $viewModel = new VacationViewModel();

        $vacation = $this->VacationService->all($request_data,$relation);
        //dd($vacation);
        if ($request->ajax()) {
            return response()->json(['data' => $vacation['data']]);
        }
        return view('common::vacation.index', [
            'vacation' => $vacation,
            'viewModel' => $viewModel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $viewModel = new VacationViewModel();

        return view('common::vacation.create',compact('viewModel'));
    }


    public function store(Request $request)
    {
        $request_data = $request->all();
        $response = $this->VacationService->create($request_data);
         if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('/admin/vacation')->with('created', 'created');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('common::show');
    }

    public function edit(Request $request, $id)
    {
        $request_data = $request->all();
        $viewModel = new VacationViewModel();
        $vacation = $this->VacationService->find($id)['data'];
       // dd($vacation->school_id);
        return view('common::vacation.edit', [
            'viewModel'=>$viewModel,
            'vacation'=>$vacation
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request_data = $request->all();
        $response = $this->VacationService->update($request_data);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('admin/vacation')->with('updated', 'updated');
    }


    public function destroy(Request $request)
    {
        $request_data = $request->all();
        $response = $this->VacationService->delete($request_data['id']);
        // if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return response()->json(['data' => 'success'], 200);
    }

    public function sendNotification($id)
    {
        $response = $this->VacationService->sendNotification($id);
        return redirect('/admin/vacation')->with('notification', 'notification');
    }
}
