<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\ClusterModel;

class ClusterController extends Controller
{
    public function list()
    {
        $data[ 'getRecord' ] = ClusterModel::getRecord();

        $data['header_title'] = "Cluster List";
        return view('admin.cluster.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Cluster";
        return view('admin.cluster.add', $data);
    }
    public function insert(Request $request)
    {
        $save = new ClusterModel;
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        
        return redirect('admin/cluster/list')->with('success', "Cluster successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = ClusterModel::getSingle($id);
        if(!empty($data['getRecord']))
        {

            $data['header_title'] = "Edit Cluster";
            return view('admin.cluster.edit', $data);

        }
        else
        {
            abort(404);
        }
        
    }
    public function update($id, Request $request)
    {
        $save = ClusterModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->save();
        
        return redirect('admin/cluster/list')->with('success', "Cluster successfully Updated");
    }

    public function delete($id, Request $request)
    {
        $save = ClusterModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        
        return redirect()->back()->with('success', "Cluster successfully Deleted");
    }
}
