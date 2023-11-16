<?php


namespace Modules\Transaction\Repository\Transaction;


use Modules\Transaction\Entities\Transaction;

class TransactionRepository
{

    private $transaction;

    public function __construct()
    {
        $this->transaction = new Transaction();
    }

    public function create(array $data){

            return $this->transaction->create($data);


    }

    public function update(array $data){
        $transaction = $this->transaction->find($data['id']);
        $transaction->update($data);
        return $transaction->fresh();
    }

    public function find($id){
        return $this->transaction->whereId($id)->first();
    }

    public function findByIds($ids){
        return $this->transaction->whereIn('id',$ids)->get();
    }

    public function delete($id){

        $item = $this->transaction->where('id',$id)->delete();

    }

    public function all(array $data,$relation=[])
    {
        $schools = $this->transaction->with($relation)
            ->when($data['client_id'] ?? null, function ($q) use ($data) {
            return $q->where('client_id',$data['client_id']);
        });
        return getCaseCollection($schools,$data);
    }

}
