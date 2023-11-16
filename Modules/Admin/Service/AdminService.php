<?php


namespace Modules\Admin\Service;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\Admin\Entities\Admin;
use Modules\Common\Helper\UploaderHelper;

class AdminService
{
    use UploaderHelper;
    function findAll(){
        $admins = Admin::with('roles:name')->where('id','!=',auth()->id())->get();
        return $admins;
    }

    function findById($id){
        $admin = Admin::with('roles:name')->findOrFail($id);
        return $admin;
    }

    function findBy($key, $value)
    {
        $admin = Admin::where($key, $value)->get();
        return $admin;
    }

    function save($data){
        if (request()->hasFile('image')){
            $image = request()->file('image');
            $imageName = $this->upload($image, 'admin');
            $data['image'] = $imageName;
        }
        $admin = Admin::create($data);
        $admin->assignRole($data['role_id']);
        return $this->findById($admin['id']);
    }

    function update($id,$data){
        $admin = $this->findById($id);
        if (request()->hasFile('image')){
            File::delete(public_path('uploads/admin/'.$admin->image));
            $image = request()->file('image');
            $imageName = $this->upload($image, 'admin');
            $data['image'] = $imageName;
        }
        $admin->update($data);
        DB::table('model_has_roles')->where('model_id',$id)->where('model_type',Admin::class)->delete();
        $admin->assignRole($data['role_id']);
        return $admin;
    }

    function activate($id){
        $admin = $this->findById($id);
        $admin->is_active = !$admin->is_active;
        $admin->save();
    }
    function delete($id)
    {
        $admin = $this->findById($id);
        File::delete(public_path('uploads/admin/'.$admin->image));
        $admin->delete();
    }

}
