<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountabilityModel;
use App\Models\ClusterModel;
use App\Models\ClusterAccountabilityModel;
use Auth;

class AccountabilityController extends Controller
{
    
    public function list()
    {
        $data[ 'getRecord' ] = AccountabilityModel::getRecord();

        $data['header_title'] = "Accountability List";
        return view('admin.accountability.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Accountability";
        return view('admin.accountability.add', $data);
    }
    public function insert(Request $request)
    {
        $save = new AccountabilityModel;
        $save->name = $request->name;
        $save->category = $request->category;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        
        return redirect('admin/accountability/list')->with('success', "Accountability successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = AccountabilityModel::getSingle($id);
        if(!empty($data['getRecord']))
        {

            $data['header_title'] = "Edit Accountability";
            return view('admin.accountability.edit', $data);

        }
        else
        {
            abort(404);
        }
        
    }
    public function update($id, Request $request)
    {
        $save = AccountabilityModel::getSingle($id);
        $save->name = $request->name;
        $save->category = $request->category;
        $save->status = $request->status;
        $save->save();
        
        return redirect('admin/accountability/list')->with('success', "Accountability successfully Updated");
    }

    public function delete($id, Request $request)
    {
        $save = AccountabilityModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        
        return redirect()->back()->with('success', "Accountability successfully Deleted");
    }
    public function MyAccountability()
    {
    
        $data[ 'getRecord' ] = ClusterAccountabilityModel::MyAccountability(Auth::user()->cluster_id); 

        $data['header_title'] = "My Accountability Groups"; 
        return view('members.my_accountability', $data);
    }
}
