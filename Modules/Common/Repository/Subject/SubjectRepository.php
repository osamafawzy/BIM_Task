<?php


namespace Modules\Common\Repository\Subject;


use Modules\Common\Entities\Subject;

class SubjectRepository
{

    private $subjectModel;

    public function __construct()
    {
        $this->subjectModel = new Subject();
    }

    public function create(array $data){

        $subject = $this->subjectModel->create($data);
        return $subject->fresh();
    }

    public function update(array $data){
        $subject = $this->subjectModel->find($data['id']);
        $subject->update($data);
        return $subject->fresh();
    }

    public function find($id){
        return $this->subjectModel->whereId($id)->first();
    }
    public function findByIds($ids){
        return $this->subjectModel->whereIn('id',$ids)->get();
    }

    public function delete($id){

        $items = $this->subjectModel->where('id',$id)->delete();

    }

    public function all(array $data)
    {
        $subjects = $this->subjectModel;
        return getCaseCollection($subjects,$data);
    }

}
