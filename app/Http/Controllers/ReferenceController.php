<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ReferenceController extends Controller
{
    //
    public function getNIK(Request $request){
        $d_arr = [];
        $incomplete_results = false;
        $q = (isset($request->q)) ? $request->q : '';
        $limit =  (isset($request->limit)) ? $request->limit : '5';
        $page = (isset($request->page)) ? $request->page : '1';

        $offset = ($page - 1) * $limit;

        $num_data = DB::connection('mdware')->table('absen_all')
                    ->where('status','aktif')
                    ->select([
                        'nik',
                    ]);

        if (isset($request->id) && $request->id) {
            $num_data->where('nik', $request->id);
        } else {
            $num_data->where(function ($query) use ($q) {
                $query->where(DB::raw("lower(nik)"),'like','%' . strtolower($q) . '%');
            });          
        }
        $total_count = $num_data->count();

        $row_data = DB::connection('mdware')->table('absen_all')
                        ->where('status','aktif')
                        ->select([
                            '*',
                        ]);

        if (isset($request->id) && $request->id) {
            $row_data->where('nik', $request->id);
        } else {
            $row_data->where(function ($query) use ($q) {
                $query->where(DB::raw("lower(nik)"),'like','%' . strtolower($q) . '%');
            });
        }
        $row_data->orderBy('nik');

        $row_data->offset($offset)->limit($limit);

        $items = $row_data->get();
        
        if (count($items) > 0) {
            $d_arr = [];
            foreach ($items as $value) {
                $factory_id = (int)substr($value->factory,-1,1);
                $email      = $value->nik.'@dummy.aoi.co.id';
                $d_arr[] = array(
                    'id'            => $value->nik,
                    'text'          => $value->nik,
                    'name'          => $value->name,
                    'factory_id'    => $factory_id,
                    'email'         => $email,
                );
            }
            $incomplete_results = true;
        }
        $data = array(
            'total_count' => $total_count,
            'incomplete_results' => $incomplete_results,
            'results' => $d_arr,
        );

        return json_encode($data);
    }

    public function getRole(Request $request){
        $d_arr = [];
        $incomplete_results = false;
        $q = (isset($request->q)) ? $request->q : '';
        $limit =  (isset($request->limit)) ? $request->limit : '5';
        $page = (isset($request->page)) ? $request->page : '1';

        $offset = ($page - 1) * $limit;



        $num_data = Role::where('is_active','Aktif')
                    ->select([
                        'id',
                    ]);

        if (isset($request->id) && $request->id) {
            $num_data->where('id', $request->id);
        } else {
            $num_data->where(function ($query) use ($q) {
                $query->where(DB::raw("lower(name)"),'like','%' . strtolower($q) . '%')
                        ->orWhere(DB::raw("lower(description)"),'like','%' . strtolower($q) . '%');
            });          
        }

        if($request->user_uuid){
            $userRole = DB::table('model_has_roles')->where('model_uuid', $request->user_uuid)->get();
            if($userRole){
                $arrData = [];
                foreach($userRole as $val){
                    array_push($arrData, $val->role_id);
                }
                
            }
        }
        
        // Jika ada parameter user_uuid
        if($request->user_uuid){
            $num_data->whereIn('id', $arrData);
        }

        $total_count = $num_data->count();

        $row_data = Role::where('is_active','Aktif')
                        ->select([
                            '*',
                        ]);

        if (isset($request->id) && $request->id) {
            $row_data->where('id', $request->id);
        } else {
            $row_data->where(function ($query) use ($q) {
                $query->where(DB::raw("lower(name)"),'like','%' . strtolower($q) . '%')
                        ->orWhere(DB::raw("lower(description)"),'like','%' . strtolower($q) . '%');
            });
        }

        if($request->user_uuid){
            $row_data->whereIn('id', $arrData);
        }

        $row_data->orderBy('name');

        $row_data->offset($offset)->limit($limit);

        $items = $row_data->get();
        
        if (count($items) > 0) {
            $d_arr = [];
            foreach ($items as $value) {
                $d_arr[] = array(
                    'id'            => $value->id,
                    'text'          => $value->name,
                    'description'   => $value->description,
                );
            }
            $incomplete_results = true;
        }
        $data = array(
            'total_count' => $total_count,
            'incomplete_results' => $incomplete_results,
            'results' => $d_arr,
        );

        return json_encode($data);
    }
}
