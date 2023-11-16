<?php


namespace Modules\Common\Service\TeacherLevels;


use Illuminate\Support\Facades\DB;
use Modules\Common\Repository\TeacherLevels\TeacherLevelsRepository;

class TeacherLevelsService
{

    use TeacherLevelsServiceHelper;

    protected $techerlevelsRepository;

    public function __construct()
    {
        $this->techerlevelsRepository = new TeacherLevelsRepository();
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
            $item = $this->techerlevelsRepository->create($data);
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
            $item = $this->techerlevelsRepository->update($data);
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
            $items = $this->techerlevelsRepository->all($data);
            return return_msg(true,'Success',$items);
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

    public function find($id)
    {
        try {
            $item = $this->techerlevelsRepository->find($id);
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
            $item = $this->techerlevelsRepository->find($id);
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
