<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClusterModel;
use Hash;
use Auth;
use Str;

class LeaderController extends Controller
{
   
    public function list()
    {
        $data['getRecord'] = User::getLeader();
        $data['header_title'] = "leaders List";
        return view('admin.leaders.list',$data);
    }
    public function add()
    {

        $data['getCluster'] = ClusterModel::getCluster();
        $data['header_title'] = " Add New leaders";
        return view('admin.leaders.add',$data);

    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:10|min:10',
            //'roll_number' => 'required|roll_number|unique:users',
            

        ]);



        $leaders = new User;
        $leaders->name = trim($request->name);
        $leaders->last_name = trim($request->last_name);
        $leaders->roll_number = trim($request->roll_number);
        $leaders->cluster_id = trim($request->cluster_id);
        $leaders->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $leaders->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $leaders->profile_pic = $filename;
        }
        
        $leaders->location = trim($request->location);
        $leaders->join_date = trim($request->join_date);
        $leaders->prev_altar = trim($request->prev_altar);
        $leaders->department = trim($request->department);
        $leaders->mobile_number = trim($request->mobile_number);
        $leaders->nhif = trim($request->nhif);
        $leaders->status = trim($request->status);
        $leaders->email = trim($request->email);
        $leaders->password = Hash::make($request->password);
        $leaders->user_type = 3;
        $leaders->save();

        return redirect('admin/leaders/list')->with('success',"Leader Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);

        if(!empty($data['getRecord']))
        {
            $data['getCluster'] = ClusterModel::getCluster();
            $data['header_title'] = " Edit Leader";
            return view('admin.leaders.edit',$data);
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



        $leaders = User::getSingle($id);
        $leaders->name = trim($request->name);
        $leaders->last_name = trim($request->last_name);
        $leaders->roll_number = trim($request->roll_number);
        $leaders->cluster_id = trim($request->cluster_id);
        $leaders->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $leaders->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            if(!empty($leaders->getProfile()))
            {
                unlink('upload/profile/'.$leaders->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $leaders->profile_pic = $filename;
        }
        
        $leaders->location = trim($request->location);
        $leaders->join_date = trim($request->join_date);
        $leaders->prev_altar = trim($request->prev_altar);
        $leaders->department = trim($request->department);
        $leaders->mobile_number = trim($request->mobile_number);
        if(!empty($request->nhif))
        {
            $leaders->nhif = trim($request->nhif);
        }
        $leaders->status = trim($request->status);
        $leaders->email = trim($request->email);
        if(!empty($request->password))
        {
            $leaders->password = Hash::make($request->password);
        }
        
        $leaders->save();

        return redirect('admin/leaders/list')->with('success',"Leader Successfully Updated");
    }

    public function delete($id)
    {
        $save = User::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success','Record successfully Deleted');
    }


   
    
}
