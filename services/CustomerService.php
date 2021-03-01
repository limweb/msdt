<?php

//----------------------------------------------
//FILE NAME:  CustomerService.php gen for Servit Framework Service
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2021-02-01(Mon)  13:37:47 
//----------------------------------------------
use Illuminate\Database\Capsule\Manager as Capsule;

class CustomerService 
{

    public static function all()
    {
        try {
            // Capsule::enableQueryLog();
            // Capsule::beginTransaction();
            $datas = \Customer::get();
            // Capsule::commit();
            return [
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                'datas' => $datas,
                //'columns' => $columns,
                //'info' => $info,
                //'infos' => $info,
                //'domains' => $domains,
                //'method' => $method,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
                //'func'=> __CLASS__.'/'.__FUNCTION__,
            ]; 
        }
    }

    public static function alliddesc()
    {
        try {
            // Capsule::enableQueryLog();
            // Capsule::beginTransaction();
            //$datas = \Customer::orderBy('id', 'desc')->get();
            $datas = self::getalliddesc();
            // Capsule::commit();
            return [
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                'datas' => $datas,
                //'columns' => $columns,
                //'info' => $info,
                //'infos' => $info,
                //'domains' => $domains,
                //'method' => $method,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
                //'func'=> __CLASS__.'/'.__FUNCTION__,
            ]; 
        }
    }


    public static function byId($id)
    {
        try {
            // Capsule::enableQueryLog();
            // Capsule::beginTransaction();
            $data = \Customer::find($id);
            // Capsule::commit();
            return [
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                'data' => $data,
                //'datas' => $datas,
                //'columns' => $columns,
                //'info' => $info,
                //'infos' => $info,
                //'domains' => $domains,
                //'method' => $method,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
                //'func'=> __CLASS__.'/'.__FUNCTION__,
            ]; 
        }
    }

    public static function insert()
    {
        try {
             // Capsule::enableQueryLog();
             // Capsule::beginTransaction();
             $req = new \Request();
             $arrdata = $req->input->toArray();
             $rs = new \Customer();
             $fills = ['name','addresss','province','zipcode'];
             foreach ($fills as $key) {
                 if (isset($arrdata[$key])) {
                     $rs->{$key} = $arrdata[$key];
                 }
             }

            if($req->user) { 
                $userid = $req->user->id;
                $rs->created_by = $userid;
                $rs->updated_by = $userid;
            }

            $rs->save();
            $datas = self::getalliddesc();
            // Capsule::commit();
            return [
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                'data' => $rs,
                'datas' => $datas,
                //'columns' => $columns,
                //'info' => $info,
                //'infos' => $info,
                //'domains' => $domains,
                //'method' => $method,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
                //'func'=> __CLASS__.'/'.__FUNCTION__,
            ]; 
        }
    }

    public static function insertOrupdate()
    {
        try {
           // Capsule::enableQueryLog();
           // Capsule::beginTransaction();
           $req = new \Request();
           $arrdata = $req->input->toArray();
           $rs = null;
           $newdata = false; 
           if (isset($arrdata['id'])) {
               $rs = \Customer::find($arrdata['id']);
           }
           if (!$rs) {
               $rs = new \Customer();
                $newdata = true; 
           }

           $fills = ['name','addresss','province','zipcode'];
           foreach ($fills as $key) {
               if (isset($arrdata[$key])) {
                   $rs->{$key} = $arrdata[$key];
               }
           }

           if($req->user) { 
               $userid = $req->user->id;
               if($newdata) { 
                  $rs->created_by = $userid;
               }
               $rs->updated_by = $userid;
           }

           $rs->save();
           $datas = self::getalliddesc();
           // Capsule::commit();
            return [
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                //'newdata' => $newdata 
                'data' => $rs,
                'datas' => $datas,
                //'columns' => $columns,
                //'info' => $info,
                //'infos' => $info,
                //'domains' => $domains,
                //'method' => $method,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
                //'func'=> __CLASS__.'/'.__FUNCTION__,
            ]; 
        }
    }

    public static function delete($id)
    {
        try {
            // Capsule::enableQueryLog();
            // Capsule::beginTransaction();
            $rs = \Customer::find($id);
            if ($rs) {

                $req = new \Request();
                if($req->user) { 
                      $userid = $req->user->id; 
                      $rs->deleteBy = $userid;
                }

                $rs->delete();
            }
            $datas = self::getalliddesc();
            // Capsule::commit();
            return [
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                'data' => $rs,
                'datas' => $datas,
                //'columns' => $columns,
                //'info' => $info,
                //'infos' => $info,
                //'domains' => $domains,
                //'method' => $method,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
                //'func'=> __CLASS__.'/'.__FUNCTION__,
            ]; 
        }
    }

    public static function vuetable()
    {
        try {
            // Capsule::enableQueryLog();
            // Capsule::beginTransaction();
            $req = new \Request();
            $qry = \Customer::query();
            $perpage = $req->gets->has('per_page') ? (int)$req->gets->per_page : 10 ;
            $current_page = $req->gets->has('page') ? (int)$req->gets->page : 1 ;
            $from = ( $current_page - 1 ) * $perpage ;
            $to= ($current_page)*$perpage;
            $host = $req->servers->HTTP_HOST;
            if($host){
                $protocal = explode('/',$req->servers->SERVER_PROTOCOL)[0]=='HTTP'?'http':'https';
                $urlnext = $protocal.'://'.$host.$req->servers->PATH_INFO;
                $urlprev = $protocal.'://'.$host.$req->servers->PATH_INFO;
                if($req->gets->has('sort')){
                    $urlnext .= '&sort='.$req->gets->sort;
                    $urlprev .= '&sort='.$req->gets->sort;
                }
                if($req->gets->has('filter')){
                    $urlnext .= '&filter='.$req->gets->filter;
                    $urlprev .= '&filter='.$req->gets->filter;
                }
            }
            if($req->gets->has('sort')){
                $sorts = explode(',',$req->gets->sort);
                foreach($sorts as $sort){
                    list($s,$ds) =  explode('|',$sort);
                    $qry->orderBy($s,$ds);
                }

            }
            if($req->gets->has('kw')){
                $fills = []; //['name','nickname'];
                foreach ($fills as $key) {
                    $qry->orWhere($key,'like','%'.$req->gets->kw.'%');
                }
                $urlnext .= '&kw='.$req->gets->kw;
                $urlprev .= '&kw='.$req->gets->kw;
            }
            if($req->gets->has('filter')){
                $filters = explode(',',$req->gets->filter);
                foreach($filters as $filter){
                    list($f,$kw) =  explode('|',$filter);
                    $qry->orWhere($f,'like','%'.$kw.'%');
                }
            }

            $total = $qry->count();
            $lastpage = ceil($total/$perpage);
            $datas = $qry->take($perpage)->skip($from)->get();

            if($current_page == $lastpage || $total==0 || $lastpage == 0 ){
                $next_page_url= null;
            } else {
                $next_page_url= $urlnext.'&page='.($current_page+1).'&perpage='.$perpage;
            }
            if($current_page <= 1){
                $prev_page_url = null;
            } else {
                $prev_page_url= $urlprev.'&page='.($current_page-1).'&perpage='.$perpage;
            }
            // Capsule::commit();
            return [
                'total' => $total,
                'per_page'=> $perpage,
                'current_page'=> $current_page,
                'last_page'=> $lastpage,
                'next_page_url'=> $next_page_url,
                'prev_page_url'=> $prev_page_url,
                'from'=> $from+1,
                'to'=> $to,
                'data' => $datas,
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                //'columns' => $columns,
                //'info' => $info,
                //'infos' => $info,
                //'domains' => $domains,
                //'method' => $method,
                'status' => '1',
                'success'=> true,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
                //'func'=> __CLASS__.'/'.__FUNCTION__,
            ]; 
        }
    }
    private static function getalliddesc(){ 
        try { 
            return \Customer::orderBy('id', 'desc')->get(); 
        } catch (\Exception $e) { 
            return [];  
        } 
    } 
 
} 

