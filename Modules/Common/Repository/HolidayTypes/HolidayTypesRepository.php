<?php


namespace Modules\Common\Repository\HolidayTypes;


use Modules\Common\Entities\HolidayType;
use Modules\Employee\Entities\Absence;

class HolidayTypesRepository
{

    private $HolidayTypesModel;

    public function __construct()
    {
        $this->HolidayTypesModel = new HolidayType();
    }

    public function create(array $data){

        $holiday = $this->HolidayTypesModel->create($data);
        return $holiday->fresh();
    }

    public function update(array $data){
        $holiday = $this->HolidayTypesModel->find($data['id']);
        $holiday->update($data);
        return $holiday->fresh();
    }

    public function find($id){
        return $this->HolidayTypesModel->whereId($id)->first();
    }
    public function findByIds($ids){
        return $this->HolidayTypesModel->whereIn('id',$ids)->get();
    }

    public function delete($id){

        $items = $this->HolidayTypesModel->where('id',$id)->delete();

    }

    public function all(array $data)
    {
        $holiday = $this->HolidayTypesModel->when($data['employee_id'] ?? null, function ($query) use ($data) {
            $query->withSum(['absences' => function($q) use ($data){
                $q->where('employee_id',$data['employee_id'])->where('status','accept');
            }],'days_count');
            $query->withSum(['holidays' => function($q) use ($data){
                $q->where('employee_id',$data['employee_id'])->where('status','accept');
            }],'days_count');
        });
        return getCaseCollection($holiday,$data);
    }

}
