<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClusterAccountabilityModel;
use App\Models\ClusterModel;
use App\Models\AccountabilityModel;
use Auth;

class ClusterAccountabilityController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = ClusterAccountabilityModel::getRecord();

        $data['header_title'] = "Assign Accountability List";
        return view('admin.assign_accountability.list', $data);

    }

    public function add(Request $request)
    {
        $data['getCluster'] = ClusterModel::getCluster();
        $data['getAccountability'] = AccountabilityModel::getAccountability();
        $data['header_title'] = "Add  Assign Accountability";
        return view('admin.assign_accountability.add', $data);

    }
    public function insert(Request $request)
    {
        if(!empty($request->accountability_id))
        {
            foreach ($request->accountability_id  as $accountability_id)
            {

                $getAlreadyFirst = ClusterAccountabilityModel::getAlreadyFirst($request->cluster_id,$accountability_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                    
                }
                else
                {
                    $save = new ClusterAccountabilityModel;
                    $save->cluster_id = $request->cluster_id;
                    $save->accountability_id = $accountability_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            
            }
            return redirect('admin/assign_accountability/list')->with('success', "Accountability Group Successfully Assigned to the Cluster");

        }
        else
        {
            return redirect()->back()->with('error','Due to some error please try again');
        }
    
    }

    public function edit($id)
    {
        $getRecord = ClusterAccountabilityModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignAccountabilityID'] = ClusterAccountabilityModel::getAssignAccountabilityID($getRecord->cluster_id);
            $data['getCluster'] = ClusterModel::getCluster();
            $data['getAccountability'] = AccountabilityModel::getAccountability();
            $data['header_title'] = " Edit Assign Accountability";
            return view('admin.assign_accountability.edit', $data);
        }
        else
        {
            abort(404);
        }
        

    }
    public function update(Request $request)
    {
        ClusterAccountabilityModel::deleteAccountability($request->cluster_id);

        if(!empty($request->accountability_id))
        {
            foreach ($request->accountability_id  as $accountability_id)
            {

                $getAlreadyFirst = ClusterAccountabilityModel::getAlreadyFirst($request->cluster_id,$accountability_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                    
                }
                else
                {
                    $save = new ClusterAccountabilityModel;
                    $save->cluster_id = $request->cluster_id;
                    $save->accountability_id = $accountability_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            
            }
            return redirect('admin/assign_accountability/list')->with('success', "Record Successfully Updated");
            
        }

    }
    public function edit_single($id)
    {
        $getRecord = ClusterAccountabilityModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getCluster'] = ClusterModel::getCluster();
            $data['getAccountability'] = AccountabilityModel::getAccountability();
            $data['header_title'] = " Edit Single Assign Accountability";
            return view('admin.assign_accountability.edit_single', $data);
        }
        else
        {
            abort(404);
        }
        

    }
    public function delete($id)
    {
        $save = ClusterAccountabilityModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success','Record successfully Deleted');
    }

    public function update_single(Request $request)
    {

        if(!empty($request->accountability_id))
        {
            

                $getAlreadyFirst = ClusterAccountabilityModel::getAlreadyFirst($request->cluster_id, $request->accountability_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();

                    return redirect('admin/assign_accountability/list')->with('success', "Status Successfully Updated");
                    
                }
                else
                {
                    $save = ClusterAccountabilityModel::getSingle($request->cluster_id, $request->accountability_id);
                    $save->cluster_id = $request->cluster_id;
                    $save->accountability_id = $request->accountability_id;
                    $save->status = $request->status;
                    $save->save();

                    return redirect('admin/assign_accountability/list')->with('success', "Record Successfully Updated");
                }
            
            
            
            
        }

    }



}
