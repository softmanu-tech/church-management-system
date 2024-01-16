<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class VisitorModel extends Model
{
    use HasFactory;

    protected $table = 'visitor';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = VisitorModel::select('visitor.*', 'users.name as created_by_name')
                        ->join('users', 'users.id', 'visitor.created_by');

                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('visitor.name', 'like', '%'.Request::get('name').'%');
                        }
                        if(!empty(Request::get('category')))
                        {
                            $return = $return->where('visitor.category', '=', Request::get('category'));
                        }
                        if(!empty(Request::get('visiting_date')))
                        {
                            $return = $return->whereDate('visitor.visiting_date', '=', Request::get('visiting_date'));
                        }
                        if(!empty(Request::get('location')))
                        {
                            $return = $return->where('visitor.location', 'like', '%'.Request::get('location').'%');
                        }
                        if(!empty(Request::get('phone')))
                        {
                            $return = $return->where('visitor.phone', 'like', '%'.Request::get('phone').'%');
                        }
                        if(!empty(Request::get('pre_church')))
                        {
                            $return = $return->where('visitor.pre_church', 'like', '%'.Request::get('pre_church').'%');
                        }

                        $return = $return->where('visitor.is_delete', '=', 0)
                        ->orderBy('visitor.id', 'desc')
                        ->paginate(8);

        return $return;
    }

    static public function getVisitor()
    {
        $return = VisitorModel::select('visitor.*')
                        ->join('users', 'users.id', 'visitor.created_by')
                        ->where('visitor.is_delete', '=', 0)
                        ->where('visitor.status', '=', 0)
                        ->orderBy('visitor.name', 'asc')
                        ->get();

        return $return;
    }
}
