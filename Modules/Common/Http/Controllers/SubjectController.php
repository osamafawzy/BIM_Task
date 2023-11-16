<?php


namespace Modules\Common\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Repository\Subject\SubjectRepository;
use Modules\Common\Service\Subject\SubjectService;

class SubjectController extends Controller
{
    private $subjectService;

    public function __construct()
    {
        $this->subjectService = new SubjectService();
        $this->middleware(['auth:admin','prevent-back-history']);
        $this->middleware('permission:Index-subject|Create-subject|Edit-subject|Delete-subject', ['only' => ['index','store']]);
        $this->middleware('permission:Create-subject', ['only' => ['create','store']]);
        $this->middleware('permission:Edit-subject', ['only' => ['edit','update','activate']]);
        $this->middleware('permission:Delete-subject', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $request_data = $request->all();
        $subjects = $this->subjectService->all($request_data)['data'];
        if($request->ajax()){
            return response()->json(['data' => $subjects]);
        }
        return view('common::subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('common::subjects.create');
    }

    public function store(Request $request)
    {
        $request_data = $request->all();
        $response = $this->subjectService->create($request_data);
        if(!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('/admin/subjects')->with('created','created');

    }

    public function edit(Request $request, $id)
    {
        $request_data = $request->all();
        $subject = $this->subjectService->find($id)['data'];
        return view('common::subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request_data = $request->all();
        $response=$this->subjectService->update($request_data);
        if(!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('admin/subjects')->with('updated','updated');

    }

    public function destroy(Request $request)
    {
        $request_data = $request->all();
        $response = $this->subjectService->delete($request_data['id']);
        if(!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return response()->json(['data' => 'success'],200);
    }
}
