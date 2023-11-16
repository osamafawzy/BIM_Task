<?php

namespace Modules\Common\Http\Controllers\api;

use Illuminate\Routing\Controller;
use Modules\Common\Service\CommonService;
use Illuminate\Support\Facades\Mail;
use Modules\Common\Mail\contactUs;
use Modules\Common\Http\Requests\ContactUsRequest;
use Modules\Common\Service\HolidayTypes\HolidayTypesService;

class HolidayTypesController extends Controller
{

    private $holidayTypesService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->holidayTypesService = new HolidayTypesService();
        $this->middleware('auth:employee');
    }

    public function index(){
        $data['employee_id'] = auth('employee')->id();
        return $this->holidayTypesService->all($data);
    }

}
