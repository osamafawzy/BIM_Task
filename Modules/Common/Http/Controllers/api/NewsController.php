<?php

namespace Modules\Common\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Common\Service\CommonService;
use Illuminate\Support\Facades\Mail;
use Modules\Common\Mail\contactUs;
use Modules\Common\Http\Requests\ContactUsRequest;
use Modules\Common\Service\HolidayTypes\HolidayTypesService;
use Modules\Common\Service\News\NewsService;
use Modules\Common\Service\Subject\SubjectService;

class NewsController extends Controller
{

    private $newsService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->newsService = new NewsService();
//        $this->middleware('auth:employee');
    }

    public function index(Request $request){
        $data = $request->all();
        return $this->newsService->all($data);
    }

}
