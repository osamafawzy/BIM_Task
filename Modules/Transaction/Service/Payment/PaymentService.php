<?php


namespace Modules\Transaction\Service\Payment;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Transaction\Entities\Payment;
use Modules\Transaction\Repository\Payment\PaymentRepository;
use Modules\Transaction\Service\Transaction\TransactionService;


class PaymentService
{

    use PaymentServiceHelper;

    protected $paymentRepository;

    public function __construct()
    {
        $this->paymentRepository = new PaymentRepository();
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
                ],'validation_error','api');
            }
            $item = $this->paymentRepository->create($data);

            $transaction = (new TransactionService())->find($data['transaction_id'])['data'];
            $payments_sum = Payment::query()->where('transaction_id',$data['transaction_id'])->sum('amount');
//
            if ($payments_sum >= $transaction['amount']) $status = 'Paid';
            else{
                if (Carbon::parse($transaction['due_on'])->greaterThan(Carbon::parse($item['created_at']))){
                    $status = 'Outstanding';
                }else{
                    $status = 'Overdue';
                }
            }
            $transaction['status'] = $status;
            (new TransactionService())->update($transaction->toArray());

            DB::commit();
            return return_msg(true,'Success',$item);

        }catch (\Exception $exception){
            DB::rollBack();
            handleExceptionDD($exception);
            return return_msg(false,'Success',[
                'validation_errors' => [
                    'error_id' => [__('messages.server_error')],
                ],
            ],'validation_error','api');

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
            $item = $this->paymentRepository->update($data);
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

    public function all(array $data,$relation=[])
    {
        try {
            $items = $this->paymentRepository->all($data,$relation);
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
            $item = $this->paymentRepository->find($id);
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
            $item = $this->paymentRepository->find($id);
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
