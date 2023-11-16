<?php

namespace Modules\Common\Http\Controllers\api;

use Illuminate\Routing\Controller;
use Modules\Common\Service\CommonService;
use Illuminate\Support\Facades\Mail;
use Modules\Common\Mail\contactUs;
use Modules\Common\Http\Requests\ContactUsRequest;
use Modules\Common\Service\HolidayTypes\HolidayTypesService;
use Modules\Common\Service\Violation\ViolationService;

class ViolationController extends Controller
{

    private $violationService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->violationService = new ViolationService();
        $this->middleware('auth:employee');
    }

    public function index(){
        $data['only_parent'] = 1;
        return $this->violationService->all($data,['childs']);
    }

}
