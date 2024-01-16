<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ClusterModel;
use Auth;
use Hash;
use Str;

class UserController extends Controller
{
    public function MyAccount()
    {
        $data['getCluster'] = ClusterModel::getCluster();
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type ==2)
        {
            return view('pastors.my_account', $data);

        }
        elseif(Auth::user()->user_type == 4)
        {
            return view('members.my_account', $data);
        }
        elseif(Auth::user()->user_type == 3)
        {
            return view('leaders.my_account', $data);
        }
        
    }

    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;

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
        $pastors->email = trim($request->email);
        $pastors->save();

        return redirect()->back()->with('success',"Account Successfully Updated");
    }
    public function UpdateMyAccountMember(Request $request)
    {
        $id = Auth::user()->id;

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
        $members->email = trim($request->email);
        $members->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
        
    }
    public function UpdateMyAccountLeader(Request $request)
    {
        $id = Auth::user()->id;

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
        $leaders->email = trim($request->email);
        $leaders->save();

        return redirect()->back()->with('success', "Account Successfully Updated");
        
    }


    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Password successfully changed");
        }
        else
        {
            return redirect()->back()->with('error', "Old Password is not correct");
        }
    }

    
}
