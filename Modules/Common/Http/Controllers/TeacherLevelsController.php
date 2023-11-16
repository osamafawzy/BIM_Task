<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Service\TeacherLevels\TeacherLevelsService;

class TeacherLevelsController extends Controller
{
    private $teacherlevelsService;

    public function __construct()
    {
        $this->teacherlevelsService = new TeacherLevelsService();
         $this->middleware(['auth:admin', 'prevent-back-history']);
         $this->middleware('permission:Index-teacher_levels|Create-teacher_levels|Edit-teacher_levels|Delete-teacher_levels', ['only' => ['index', 'store']]);
         $this->middleware('permission:Create-teacher_levels', ['only' => ['create', 'store']]);
         $this->middleware('permission:Edit-teacher_levels', ['only' => ['edit', 'update', 'activate']]);
         $this->middleware('permission:Delete-teacher_levels', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $request_data = $request->all();
        $techer_levels = $this->teacherlevelsService->all($request_data)['data'];
        // dd($techer_levels);
        if ($request->ajax()) {
            return response()->json(['data' => $techer_levels]);
        }
        //dd(1);
        return view('common::teacher_levels.index', compact('techer_levels'));
    }

    public function create()
    {
        return view('common::teacher_levels.create');
    }

    public function store(Request $request)
    {
        $request_data = $request->all();
        $response = $this->teacherlevelsService->create($request_data);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('/admin/teacher_levels')->with('created', 'created');
    }

    public function edit(Request $request, $id)
    {
        $request_data = $request->all();
        $teacher_levels = $this->teacherlevelsService->find($id)['data'];
        return view('common::teacher_levels.edit', compact('teacher_levels'));
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request_data = $request->all();
        $response = $this->teacherlevelsService->update($request_data);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('admin/teacher_levels')->with('updated', 'updated');
    }

    public function destroy(Request $request)
    {
        $request_data = $request->all();
        $response = $this->teacherlevelsService->delete($request_data['id']);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return response()->json(['data' => 'success'], 200);
    }
}
