<?php


namespace Modules\Common\Service\Vacation;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Modules\Common\Repository\Vacation\VacationRepository;
use Modules\Employee\Entities\Employee;
use Modules\Notification\Jobs\SendNotification;

// use Modules\Common\Service\Vacation\VacationServiceHelper;

class VacationService
{

    use VacationServiceHelper;

    protected $VacationRepository;

    public function __construct()
    {
        $this->VacationRepository = new VacationRepository();
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
            // dd($data);
            $item = $this->VacationRepository->create($data);
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
            $item = $this->VacationRepository->update($data);
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

    public function all($data ,$relation=[])
    {
        try {
            $items = $this->VacationRepository->all($data,$relation);
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
            $item = $this->VacationRepository->find($id);
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
            $item = $this->VacationRepository->find($id);
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

    public function sendNotification($id)
    {
        try {
            DB::beginTransaction();

            $item = $this->VacationRepository->find($id);

            $data['title'] = 'عطلة رسمية';
            $data['description'] = 'يوجد عطلة رسمية بمناسبة ' . $item['title'].' بتاريخ '.$item['date'];
            $data['group_by'] = getGroupByCounter();


            Employee::active()->where('school_id',$item['school_id'])->whereNotNull('fcm_token')->chunk(50, function ($clients) use ($data) {

                SendNotification::dispatch($clients,$data)->onConnection('database');
            });


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

}
