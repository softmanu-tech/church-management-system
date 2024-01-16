<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClusterModel extends Model
{
    use HasFactory;

    protected $table = 'cluster';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = ClusterModel::select('cluster.*', 'users.name as created_by_name')
                        ->join('users', 'users.id', 'cluster.created_by');

                        if(!empty(Request::get('name')))
                        {
                            $return = $return->where('cluster.name', 'like', '%'.Request::get('name').'%');
                        }
                        if(!empty(Request::get('date')))
                        {
                            $return = $return->whereDate('cluster.created_at', '=', Request::get('date'));
                        }
                        $return = $return->where('cluster.is_delete', '=', 0)
                        ->orderBy('cluster.id', 'desc')
                        ->paginate(1);

        return $return;
    }

    static public function getCluster()
    {
        $return = ClusterModel::select('cluster.*')
                        ->join('users', 'users.id', 'cluster.created_by')
                        ->where('cluster.is_delete', '=', 0)
                        ->where('cluster.status', '=', 0)
                        ->orderBy('cluster.name', 'asc')
                        ->get();

        return $return;
    }
}
