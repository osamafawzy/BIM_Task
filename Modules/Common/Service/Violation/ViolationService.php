<?php


namespace Modules\Common\Service\Violation;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Modules\Common\Repository\Violation\ViolationRepository;
use Modules\Employee\Entities\Employee;
use Modules\Notification\Jobs\SendNotification;

// use Modules\Common\Service\Vacation\VacationServiceHelper;

class ViolationService
{

    use ViolationServiceHelper;

    protected $violationRepository;

    public function __construct()
    {
        $this->violationRepository = new ViolationRepository();
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            //validate Data
            $validation = $this->validationCreate($data);
            if ($validation->fails()){
                return return_msg(false,'Validation Errors',[
                    'validation_errors' => $validation->getMessageBag()->getMessages(),
                ]);
            }
            $item = $this->violationRepository->create($data);
            DB::commit();
            return return_msg(true,'Success',$item);

        }catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);

        }

    }

    public function update(array $data)
    {
        try {
            DB::beginTransaction();
            //validate Data
            $validation = $this->validationUpdate($data);
            if ($validation->fails()){
                return return_msg(false,'Validation Errors',[
                    'validation_errors' => $validation->getMessageBag()->getMessages(),
                ]);
            }
            $item = $this->violationRepository->update($data);
            DB::commit();

            return return_msg(true,'Success',$item);
        }catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }

    public function all($data=[] ,$relation=[])
    {
        // dd($data);
        try {
            $items = $this->violationRepository->all($data,$relation);
            return return_msg(true,'Success',$items);
        }catch (\Exception $exception){
            DB::rollBack();
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }

    public function find($id)
    {
        try {
            $item = $this->violationRepository->find($id);
            return return_msg($item ? true : false,'Success',$item);
        }catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $item = $this->violationRepository->find($id);
            if (!$item){
                return return_msg(false,'Success',[
                    'validation_errors' => [
                        'error_id' => ['Not Found'],
                    ],
                ]);
            }
            $item->delete();
            return return_msg(true,'Success');
        }catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ]);
        }
    }


}
