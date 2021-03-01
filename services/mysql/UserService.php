<?php

namespace  mysql;

//----------------------------------------------
//FILE NAME:  UserService.php gen for Servit Framework Service
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2021-03-02(Tue)  00:55:46 
//----------------------------------------------
use Illuminate\Database\Capsule\Manager as Capsule;


class UserService 
{

    public static function all()
    {
        try {
            // Capsule::enableQueryLog();
            // Capsule::beginTransaction();
            $req = new \Request(); 
            $jwtuser = $req->user; 
            $msg = 'สำเร็จ'; 
            $type='success'; //success,info,error,warning 
            $title='Successed!'; 
            $success = true; 
             
            if(!$jwtuser) { 
                throw new \Exception('401 Unauthorized',401);  
                $success = false; 
                $type ='error'; 
                $title = 'Error!'; 
                $msg = '401 Unauthorized';     
            } 
            $datas = \mysql\User::get();
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
                'success' => $success,
                'msg' => $msg,
                'type' => $type,
                'title' => $title,
                'jwtuser' => $jwtuser,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            //throw new \Exception($e->getMessage(),$e->getCode());
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
            $req = new \Request(); 
            $jwtuser = $req->user; 
 
            $msg = 'สำเร็จ'; 
            $type='success'; //success,info,error,warning 
            $title='Successed!'; 
            $success = true; 

            // if(!$jwtuser) { 
            //     throw new \Exception('401 Unauthorized',401);  
            //     $success = false; 
            //     $type ='error'; 
            //     $title = 'Error!'; 
            //     $msg = '401 Unauthorized';     
            // } 
        
            //$datas = \mysql\User::orderBy('id', 'desc')->get();
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
                'success' => $success,
                'msg' => $msg,
                'type' => $type,
                'title' => $title,
                'jwtuser' => $jwtuser,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            //throw new \Exception($e->getMessage(),$e->getCode());
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
            $req = new \Request(); 
            $jwtuser = $req->user; 
 
            $msg = 'สำเร็จ'; 
            $type='success'; //success,info,error,warning 
            $title='Successed!'; 
            $success = true; 

            if(!$jwtuser) { 
                throw new \Exception('401 Unauthorized',401);  
                $success = false; 
                $type ='error'; 
                $title = 'Error!'; 
                $msg = '401 Unauthorized';     
            } 
        
            $data = \mysql\User::find($id);
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
                'success' => $success,
                'msg' => $msg,
                'type' => $type,
                'title' => $title,
                'jwtuser' => $jwtuser,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            //throw new \Exception($e->getMessage(),$e->getCode());
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
            $jwtuser = $req->user; 
 
            $msg = 'สำเร็จ'; 
            $type='success'; //success,info,error,warning 
            $title='Successed!'; 
            $success = true; 

            if(!$jwtuser) { 
                throw new \Exception('401 Unauthorized',401);  
                $success = false; 
                $type ='error'; 
                $title = 'Error!'; 
                $msg = '401 Unauthorized';     
            } 
        
             $rs = new \mysql\User();
             $fills = $rs->getFillable();
             foreach ($fills as $key) {
                 if (isset($arrdata[$key])) {
                     $rs->{$key} = $arrdata[$key];
                 }
             }

            if($jwtuser) { 
                $userid = $jwtuser->id;
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
                'success' => $success,
                'msg' => $msg,
                'type' => $type,
                'title' => $title,
                'jwtuser' => $jwtuser,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            //throw new \Exception($e->getMessage(),$e->getCode());
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
            $jwtuser = $req->user; 
 
            $msg = 'สำเร็จ'; 
            $type='success'; //success,info,error,warning 
            $title='Successed!'; 
            $success = true; 

            if(!$jwtuser) { 
                throw new \Exception('401 Unauthorized',401);  
                $success = false; 
                $type ='error'; 
                $title = 'Error!'; 
                $msg = '401 Unauthorized';     
            } 
        
           $rs = null;
           $newdata = false; 
           if (isset($arrdata['id'])) {
               $rs = \mysql\User::find($arrdata['id']);
           }
           if (!$rs) {
               $rs = new \mysql\User();
                $newdata = true; 
           }

           $fills = $rs->getFillable();
           foreach ($fills as $key) {
               if (isset($arrdata[$key])) {
                   $rs->{$key} = $arrdata[$key];
               }
           }

           if($jwtuser) { 
               $userid = $jwtuser->id;
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
                'success' => $success,
                'msg' => $msg,
                'type' => $type,
                'title' => $title,
                'jwtuser' => $jwtuser,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            //throw new \Exception($e->getMessage(),$e->getCode());
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
            $req = new \Request(); 
            $jwtuser = $req->user; 
 
            $msg = 'สำเร็จ'; 
            $type='success'; //success,info,error,warning 
            $title='Successed!'; 
            $success = true; 

            if(!$jwtuser) { 
                throw new \Exception('401 Unauthorized',401);  
                $success = false; 
                $type ='error'; 
                $title = 'Error!'; 
                $msg = '401 Unauthorized';     
            } 
        
            $rs = \mysql\User::find($id);
            if ($rs) {

                if($jwtuser) { 
                      $userid = $jwtuser->id; 
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
                'success' => $success,
                'msg' => $msg,
                'type' => $type,
                'title' => $title,
                'jwtuser' => $jwtuser,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            //throw new \Exception($e->getMessage(),$e->getCode());
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
            $jwtuser = $req->user; 
 
            $msg = 'สำเร็จ'; 
            $type='success'; //success,info,error,warning 
            $title='Successed!'; 
            $success = true; 

            if(!$jwtuser) { 
                throw new \Exception('401 Unauthorized',401);  
                $success = false; 
                $type ='error'; 
                $title = 'Error!'; 
                $msg = '401 Unauthorized';     
            } 
        
            $qry = \mysql\User::query();
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
                'success' => $success,
                'msg' => $msg,
                'type' => $type,
                'title' => $title,
                'jwtuser' => $jwtuser,
                //'sql' => Capsule::getQueryLog(),
                //'func'=> __CLASS__.'/'.__FUNCTION__
            ];
        } catch (\Exception $e) {
            // Capsule::rollback();
            //throw new \Exception($e->getMessage(),$e->getCode());
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
            return \mysql\User::orderBy('id', 'desc')->get(); 
        } catch (\Exception $e) { 
            return [];  
        } 
    } 
 
} 

