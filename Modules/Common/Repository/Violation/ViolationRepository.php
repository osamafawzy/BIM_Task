<?php


namespace Modules\Common\Repository\Violation;


use Illuminate\Support\Facades\Auth;
use Modules\Common\Entities\Vacation;
use Modules\Common\Entities\Violation;
use Modules\Employee\Entities\Absence;

class ViolationRepository
{

    private $ViolationModel;

    public function __construct()
    {
        $this->ViolationModel = new Violation();
    }

    public function create(array $data)
    {
        //dd($data);
        $vacation = $this->ViolationModel->create($data);
        return $vacation->fresh();
    }

    public function update(array $data)
    {
        $vacation = $this->ViolationModel->find($data['id']);
        $vacation->update($data);
        return $vacation->fresh();
    }

    public function find($id)
    {
        return $this->ViolationModel->whereId($id)->first();
    }
    public function findByIds($ids)
    {
        return $this->ViolationModel->whereIn('id', $ids)->get();
    }

    public function delete($id)
    {

        $items = $this->ViolationModel->where('id', $id)->delete();
    }

    public function all($data,$relation)
    {
        // dd($data);
        $vacation = $this->ViolationModel->with($relation)
             ->when($data['only_parent'] ?? null , function ($q){
                 $q->whereNull('violation_id');
             })
            ->orderBy('id', 'DESC');

        return getCaseCollection($vacation, $data);
    }
}
