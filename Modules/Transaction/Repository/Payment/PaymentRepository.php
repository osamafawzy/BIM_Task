<?php


namespace Modules\Transaction\Repository\Payment;



use Modules\Transaction\Entities\Payment;

class PaymentRepository
{

    private $payment;

    public function __construct()
    {
        $this->payment = new Payment();
    }

    public function create(array $data){

            return $this->payment->create($data);


    }

    public function update(array $data){
        $payment = $this->payment->find($data['id']);
        $payment->update($data);
        return $payment->fresh();
    }

    public function find($id){
        return $this->payment->whereId($id)->first();
    }

    public function findByIds($ids){
        return $this->payment->whereIn('id',$ids)->get();
    }

    public function delete($id){

        $item = $this->payment->where('id',$id)->delete();

    }

    public function all(array $data,$relation=[])
    {
        $schools = $this->payment->with($relation)
            ->when($data['transaction_id'] ?? null, function ($q) use ($data) {
            return $q->where('transaction_id',$data['transaction_id']);
        });
        return getCaseCollection($schools,$data);
    }

}
