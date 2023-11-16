<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Service\Violation\ViolationService;
use Modules\Common\ViewModel\VacationViewModel;
use Modules\Common\ViewModel\ViolationViewModel;

class ViolationsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $violationService;

    public function __construct()
    {
        $this->violationService = new ViolationService();
        $this->middleware(['auth:admin', 'prevent-back-history']);
        $this->middleware('permission:Index-violation|Create-violation|Edit-violation|Delete-violation', ['only' => ['index', 'store']]);
        $this->middleware('permission:Create-violation', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit-violation', ['only' => ['edit', 'update', 'activate']]);
        $this->middleware('permission:Delete-violation', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $data['paginated'] = 50;
        $data['only_parent'] = 1;
        $violation = $this->violationService->all($data,['childs']);
        if ($request->ajax()) {
            return response()->json(['data' => $violation['data']]);
        }
        return view('common::violation.index', [
            'violation' => $violation['data'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $viewModel = new ViolationViewModel();
        return view('common::violation.create',compact('viewModel'));
    }


    public function store(Request $request)
    {
        $request_data = $request->all();
        $response = $this->violationService->create($request_data);
         if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('/admin/violations')->with('created', 'created');
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
        $viewModel = new ViolationViewModel();
        $violation = $this->violationService->find($id)['data'];
       // dd($violation->school_id);
        return view('common::violation.edit', [
            'viewModel'=>$viewModel,
            'violation'=>$violation
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request_data = $request->all();
        $response = $this->violationService->update($request_data);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('admin/violations')->with('updated', 'updated');
    }


    public function destroy($id,Request $request)
    {
        // dd($id);
        $request_data = $request->all();
        $response = $this->violationService->delete($id);
        // if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return response()->json(['data' => 'success'], 200);
    }

}
