<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorModel;
use Auth;

class VisitorController extends Controller
{
    public function list()
    {
        $data[ 'getRecord' ] = VisitorModel::getRecord();

        $data['header_title'] = "visitor List";
        return view('admin.visitor.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add New Visitor";
        return view('admin.visitor.add', $data);
    }
    public function insert(Request $request)
    {
        $save = new VisitorModel;
        $save->name = $request->name;
        $save->category = $request->category;
        $save->visiting_date =$request->visiting_date;
        $save->status = $request->status;
        $save->location = $request->location;
        $save->phone= $request->phone;
        $save->pre_church = $request->pre_church;
        $save->created_by = Auth::user()->id;
        $save->save();
        
        return redirect('admin/visitor/list')->with('success', "Visitor successfully Added");
    }

    public function edit($id)
    {
        $data['getRecord'] = VisitorModel::getSingle($id);
        if(!empty($data['getRecord']))
        {

            $data['header_title'] = "Edit Visitor";
            return view('admin.visitor.edit', $data);

        }
        else
        {
            abort(404);
        }
        
    }
    public function update($id, Request $request)
    {
        $save = VisitorModel::getSingle($id);
        $save->name = $request->name;
        $save->category = $request->category;
        $save->visiting_date =$request->visiting_date;
        $save->status = $request->status;
        $save->location = $request->location;
        $save->phone= $request->phone;
        $save->pre_church = $request->pre_church;
        $save->save();
        
        return redirect('admin/visitor/list')->with('success', "Visitor successfully Updated");
    }

    public function delete($id, Request $request)
    {
        $save = VisitorModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        
        return redirect()->back()->with('success', "Visitor successfully Deleted");
    }
}
