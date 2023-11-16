<?php


namespace Modules\Common\Service\HolidayTypes;


use Illuminate\Support\Facades\DB;
use Modules\Common\Repository\HolidayTypes\HolidayTypesRepository;
//use Modules\HolidayTypes\Service\HolidayTypes\HolidayServiceHelper;

class HolidayTypesService
{

    use HolidayServiceHelper;

    protected $HolidayTypesRepository;

    public function __construct()
    {
        $this->HolidayTypesRepository = new HolidayTypesRepository();
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
            $item = $this->HolidayTypesRepository->create($data);
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
            $item = $this->HolidayTypesRepository->update($data);
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

    public function all(array $data)
    {
        try {
            $items = $this->HolidayTypesRepository->all($data);
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
            $item = $this->HolidayTypesRepository->find($id);
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
            $item = $this->HolidayTypesRepository->find($id);
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
