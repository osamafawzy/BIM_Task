<?php


namespace Modules\Common\Repository\News;
use Illuminate\Support\Facades\File;
use Modules\Common\Helper\UploaderHelper;


use Modules\Common\Entities\News;

class NewsRepository
{

    private $newsModel;
    use UploaderHelper;
    public function __construct()
    {
        $this->newsModel = new News();
    }

    public function create(array $data){

        $news = $this->newsModel->create($data);
        return $news->fresh();
    }

    public function update(array $data){
        $news = $this->newsModel->find($data['id']);
        if (request()->hasFile('image')){
            File::delete(public_path('uploads/news/'.$this->getImageName('news', $news->image)));
            $image = request()->file('image');
            $imageName = $this->upload($image, 'news');
            $data['image'] = $imageName;
        }
        if (request()->hasFile('file')) {
            File::delete(public_path('uploads/news/PDFs/' . $this->getImageName('PDFs', $news->file)));
            $file = request()->file('file');
            $fileName = $this->uploadFile($file, 'news/PDFs');
            $data['file'] = $fileName;
        }
        $news->update($data);
        return $news->fresh();
    }

    public function find($id){
        return $this->newsModel->whereId($id)->first();
    }
    public function findByIds($ids){
        return $this->newsModel->whereIn('id',$ids)->get();
    }

    public function delete($id){

        $items = $this->newsModel->where('id',$id)->delete();

    }

    public function all(array $data)
    {
        $news = $this->newsModel;
        return getCaseCollection($news,$data);
    }

}
