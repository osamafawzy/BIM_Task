<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Service\HolidayTypes\HolidayTypesService;

class HolidayTypesController extends Controller
{

    private $holidayTypesService;

    public function __construct()
    {
        $this->holidayTypesService = new HolidayTypesService();
        $this->middleware(['auth:admin', 'prevent-back-history']);
        $this->middleware('permission:Index-holiday|Create-holiday|Edit-holiday|Delete-holiday', ['only' => ['index', 'store']]);
        $this->middleware('permission:Create-holiday', ['only' => ['create', 'store']]);
        $this->middleware('permission:Edit-holiday', ['only' => ['edit', 'update', 'activate']]);
        $this->middleware('permission:Delete-holiday', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $request_data = $request->all();
        $holiday = $this->holidayTypesService->all($request_data)['data'];
        if ($request->ajax()) {
            return response()->json(['data' => $holiday]);
        }
        return view('common::holiday_types.index',compact('holiday'));
    }

    public function create()
    {
        return view('common::holiday_types.create');
    }

    public function store(Request $request)
    {
        $request_data = $request->all();
        $response = $this->holidayTypesService->create($request_data);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('/admin/holiday_types')->with('created', 'created');
    }

    public function edit(Request $request, $id)
    {
        $request_data = $request->all();
        $holiday = $this->holidayTypesService->find($id)['data'];
        return view('common::holiday_types.edit', compact('holiday'));
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request_data = $request->all();
        $response = $this->holidayTypesService->update($request_data);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('admin/holiday_types')->with('updated', 'updated');
    }

    public function destroy(Request $request)
    {
        $request_data = $request->all();
        $response = $this->holidayTypesService->delete($request_data['id']);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return response()->json(['data' => 'success'], 200);
    }
 
}
