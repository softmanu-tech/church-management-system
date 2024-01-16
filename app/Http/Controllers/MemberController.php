<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClusterModel;
use Hash;
use Auth;
use Str;


class MemberController extends Controller

{
    public function list()
    {
        $data['getRecord'] = User::getMember();
        $data['header_title'] = "Members List";
        return view('admin.members.list',$data);
    }
    public function add()
    {

        $data['getCluster'] = ClusterModel::getCluster();
        $data['header_title'] = " Add New Members";
        return view('admin.members.add',$data);

    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:10|min:10',
            //'roll_number' => 'required|roll_number|unique:users',
            

        ]);



        $members = new User;
        $members->name = trim($request->name);
        $members->last_name = trim($request->last_name);
        $members->roll_number = trim($request->roll_number);
        $members->cluster_id = trim($request->cluster_id);
        $members->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $members->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $members->profile_pic = $filename;
        }
        
        $members->location = trim($request->location);
        $members->join_date = trim($request->join_date);
        $members->prev_altar = trim($request->prev_altar);
        $members->department = trim($request->department);
        $members->mobile_number = trim($request->mobile_number);
        $members->nhif = trim($request->nhif);
        $members->status = trim($request->status);
        $members->email = trim($request->email);
        $members->password = Hash::make($request->password);
        $members->user_type = 4;
        $members->save();

        return redirect('admin/members/list')->with('success',"Member Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if(!empty($data['getRecord']))
        {
            $data['getCluster'] = ClusterModel::getCluster();
            $data['header_title'] = " Edit Member";
            return view('admin.members.edit',$data);
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



        $members = User::getSingle($id);
        $members->name = trim($request->name);
        $members->last_name = trim($request->last_name);
        $members->roll_number = trim($request->roll_number);
        $members->cluster_id = trim($request->cluster_id);
        $members->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $members->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            if(!empty($members->getProfile()))
            {
                unlink('upload/profile/'.$members->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $members->profile_pic = $filename;
        }
        
        $members->location = trim($request->location);
        $members->join_date = trim($request->join_date);
        $members->prev_altar = trim($request->prev_altar);
        $members->department = trim($request->department);
        $members->mobile_number = trim($request->mobile_number);
        if(!empty($request->nhif))
        {
            $members->nhif = trim($request->nhif);
        }
        $members->status = trim($request->status);
        $members->email = trim($request->email);
        if(!empty($request->password))
        {
            $members->password = Hash::make($request->password);
        }
        
        $members->save();

        return redirect('admin/members/list')->with('success',"Member Successfully Updated");
    }

    public function delete($id)
    {
        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success','Record successfully Deleted');
    }


   
    

}
