<?php


namespace Modules\Common\Repository\Vacation;


use Illuminate\Support\Facades\Auth;
use Modules\Common\Entities\Vacation;
use Modules\Employee\Entities\Absence;

class VacationRepository
{

    private $VacationModel;

    public function __construct()
    {
        $this->VacationModel = new Vacation();
    }

    public function create(array $data)
    {
        // dd($data);
        foreach ($data['school_id'] as $value) {
            $vacation = $this->VacationModel->create([
                'title' => $data['title'],
                'date' => $data['date'],
                'school_id' => $value,
                'admin_id' => Auth::user()->id
            ]);

        }
        return $vacation->fresh();
    }

    public function update(array $data)
    {
        $vacation = $this->VacationModel->find($data['id']);
        $vacation->update($data);
        return $vacation->fresh();
    }

    public function find($id)
    {
        return $this->VacationModel->whereId($id)->first();
    }
    public function findByIds($ids)
    {
        return $this->VacationModel->whereIn('id', $ids)->get();
    }

    public function delete($id)
    {

        $items = $this->VacationModel->where('id', $id)->delete();
    }

    public function all($data, $relation)
    {
        //dd($data['date']);
        $vacation = $this->VacationModel->available();
        $vacation->with($relation)->when($data['date'] ?? null, function ($q) use ($data) {

            return $q->whereDate('date', '=', $data['date']);
        })->when($data['school_id'] ?? null, function ($q) use ($data) {
            return $q->where('school_id', $data['school_id']);
        })
            // ->when($data['date_to'] ?? null, function ($q) use ($data) {
            //     return $q->whereDate('date', '<=', $data['date_to']);
            // })
            ->orderBy('id', 'DESC');
        return getCaseCollection($vacation, $data);
    }
}
