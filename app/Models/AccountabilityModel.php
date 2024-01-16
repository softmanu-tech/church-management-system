<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class AccountabilityModel extends Model
{
    use HasFactory;

    protected $table = 'accountability';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = AccountabilityModel::select('accountability.*', 'users.name as created_by_name')
                        ->join('users', 'users.id', 'accountability.created_by');

                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('accountability.name', 'like', '%'.Request::get('name').'%');
                        }
                        if(!empty(Request::get('category')))
                        {
                            $return = $return->where('accountability.category', '=', Request::get('category'));
                        }
                        if(!empty(Request::get('date')))
                        {
                            $return = $return->whereDate('accountability.created_at', '=', Request::get('date'));
                        }

                        $return = $return->where('accountability.is_delete', '=', 0)
                        ->orderBy('accountability.id', 'desc')
                        ->paginate(2);

        return $return;
    }

    static public function getAccountability()
    {
        $return = AccountabilityModel::select('accountability.*')
                        ->join('users', 'users.id', 'accountability.created_by')
                        ->where('accountability.is_delete', '=', 0)
                        ->where('accountability.status', '=', 0)
                        ->orderBy('accountability.name', 'asc')
                        ->get();

        return $return;
    }
}
