<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClusterAccountabilityModel extends Model
{
    use HasFactory;

    protected $table = 'cluster_accountability';
    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = self::select('cluster_accountability.*','cluster.name as cluster_name','accountability.name as accountability_name', 'users.name 
        as created_by_name')
                    ->join('accountability','accountability.id', '=','cluster_accountability.accountability_id')
                    ->join('cluster','cluster.id', '=','cluster_accountability.cluster_id')
                    ->join('users','users.id', '=','cluster_accountability.created_by')
                    ->where('cluster_accountability.is_delete', '=', 0);

                    
                    if(!empty(Request::get('cluster_name')))
                    {
                        $return = $return->where('cluster.name', 'like', '%'.Request::get('cluster_name').'%');
                    }
                    if(!empty(Request::get('accountability_name')))
                    {
                        $return = $return->where('accountability.name', 'like', '%'.Request::get('accountability_name').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('cluster_accountability.created_at', '=', Request::get('date'));
                    }

        
        $return= $return->orderBy('cluster_accountability.id', 'desc')
                    ->paginate(5);

        return $return;

    
    }
    static public function MyAccountability($cluster_id)
    {
        return  self::select('cluster_accountability.*','accountability.name as accountability_name', 'accountability.category as accountability_category')
                    ->join('accountability','accountability.id', '=','cluster_accountability.accountability_id')
                    ->join('cluster','cluster.id', '=','cluster_accountability.cluster_id')
                    ->join('users','users.id', '=','cluster_accountability.created_by')
                    ->where('cluster_accountability.cluster_id', '=', $cluster_id)
                    ->where('cluster_accountability.is_delete', '=', 0)
                    ->where('cluster_accountability.status', '=', 0)
                    ->orderBy('cluster_accountability.id', 'desc')
                    ->get();
    }


    static public function getAlreadyFirst($cluster_id, $accountability_id)
    {
        return self::where('cluster_id','=', $cluster_id)->where('accountability_id', '=', $accountability_id)->first();
    }

    static public function getAssignAccountabilityID($cluster_id)
    {
        return self::where('cluster_id','=', $cluster_id)->where('is_delete', '=', 0)->get();
    }

    static public function deleteAccountability($cluster_id)
    {
        return self::where('cluster_id','=', $cluster_id)->delete();
    }

    
}
