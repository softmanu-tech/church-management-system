<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClusterModel;
use Hash;
use Auth;
use Str;

class PastorController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getPastor();
        $data['header_title'] = "pastors List";
        return view('admin.pastors.list',$data);
    }
    public function add()
    {

        $data['getCluster'] = ClusterModel::getCluster();
        $data['header_title'] = " Add New pastors";
        return view('admin.pastors.add',$data);

    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:10|min:10',
            //'roll_number' => 'required|roll_number|unique:users',
            

        ]);



        $pastors = new User;
        $pastors->name = trim($request->name);
        $pastors->last_name = trim($request->last_name);
        $pastors->roll_number = trim($request->roll_number);
        $pastors->cluster_id = trim($request->cluster_id);
        $pastors->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $pastors->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $pastors->profile_pic = $filename;
        }
        
        $pastors->location = trim($request->location);
        $pastors->join_date = trim($request->join_date);
        $pastors->prev_altar = trim($request->prev_altar);
        $pastors->department = trim($request->department);
        $pastors->mobile_number = trim($request->mobile_number);
        $pastors->nhif = trim($request->nhif);
        $pastors->status = trim($request->status);
        $pastors->email = trim($request->email);
        $pastors->password = Hash::make($request->password);
        $pastors->user_type = 2;
        $pastors->save();

        return redirect('admin/pastors/list')->with('success',"Pastor Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if(!empty($data['getRecord']))
        {
            $data['getCluster'] = ClusterModel::getCluster();
            $data['header_title'] = " Edit Pastor";
            return view('admin.pastors.edit',$data);
        }
        else
        {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:10|min:10',
            //'roll_number' => 'required|roll_number|unique:users,roll_number,'.$id,
            

        ]);



        $pastors = User::getSingle($id);
        $pastors->name = trim($request->name);
        $pastors->last_name = trim($request->last_name);
        $pastors->roll_number = trim($request->roll_number);
        $pastors->cluster_id = trim($request->cluster_id);
        $pastors->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $pastors->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            if(!empty($pastors->getProfile()))
            {
                unlink('upload/profile/'.$pastors->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $pastors->profile_pic = $filename;
        }
        
        $pastors->location = trim($request->location);
        $pastors->join_date = trim($request->join_date);
        $pastors->prev_altar = trim($request->prev_altar);
        $pastors->department = trim($request->department);
        $pastors->mobile_number = trim($request->mobile_number);
        if(!empty($request->nhif))
        {
            $pastors->nhif = trim($request->nhif);
        }
        $pastors->status = trim($request->status);
        $pastors->email = trim($request->email);
        if(!empty($request->password))
        {
            $pastors->password = Hash::make($request->password);
        }
        
        $pastors->save();

        return redirect('admin/pastors/list')->with('success',"Pastor Successfully Updated");
    }

    public function delete($id)
    {
        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success','Record successfully Deleted');
    }


   
    
}
