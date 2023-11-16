<?php

namespace Modules\Common\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Service\News\NewsService;

class NewsController extends Controller
{
    private $newsService;

    public function __construct()
    {
        $this->newsService = new NewsService();
         $this->middleware(['auth:admin', 'prevent-back-history']);
         $this->middleware('permission:Index-news|Create-news|Edit-news|Delete-news', ['only' => ['index', 'store']]);
         $this->middleware('permission:Create-news', ['only' => ['create', 'store']]);
         $this->middleware('permission:Edit-news', ['only' => ['edit', 'update', 'activate']]);
         $this->middleware('permission:Delete-news', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $request_data = $request->all();
        $news = $this->newsService->all($request_data)['data'];
        if ($request->ajax()) {
            return response()->json(['data' => $news]);
        }
        //dd(1);
        return view('common::news.index', compact('news'));
    }

    public function create()
    {
        return view('common::news.create');
    }

    public function store(Request $request)
    {
        $request_data = $request->all();
        $response = $this->newsService->create($request_data);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('/admin/news')->with('created', 'created');
    }

    public function edit(Request $request, $id)
    {
        $request_data = $request->all();
        $news = $this->newsService->find($id)['data'];
        //dd($teacher_levels);
        return view('common::news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);
        $request_data = $request->all();
        $response = $this->newsService->update($request_data);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return redirect('admin/news')->with('updated', 'updated');
    }

    public function destroy(Request $request)
    {
        $request_data = $request->all();
        $response = $this->newsService->delete($request_data['id']);
        if (!$response['status']) return redirect()->back()->withInput()->withErrors($response['data']['validation_errors']);
        return response()->json(['data' => 'success'], 200);
    }
}
