<?php


namespace Modules\Common\Repository\TeacherLevels;


use Modules\Common\Entities\TeacherLevels;

class TeacherLevelsRepository
{

    private $teacherlevelsModel;

    public function __construct()
    {
        $this->teacherlevelsModel = new TeacherLevels();
    }

    public function create(array $data){

        $teacher_level = $this->teacherlevelsModel->create($data);
        return $teacher_level->fresh();
    }

    public function update(array $data){
        $teacher_level = $this->teacherlevelsModel->find($data['id']);
        $teacher_level->update($data);
        return $teacher_level->fresh();
    }

    public function find($id){
        return $this->teacherlevelsModel->whereId($id)->first();
    }
    public function findByIds($ids){
        return $this->teacherlevelsModel->whereIn('id',$ids)->get();
    }

    public function delete($id){

        $items = $this->teacherlevelsModel->where('id',$id)->delete();

    }

    public function all(array $data)
    {
       
        $teacher_levels = $this->teacherlevelsModel->when($data['for'] ?? null,function ($query) use ($data){
            $query->where('for',$data['for']);
        });
        return getCaseCollection($teacher_levels,$data);
    }

}
