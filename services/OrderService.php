<?php

//----------------------------------------------
//FILE NAME:  OrderService.php gen for Servit Framework Service
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2021-02-01(Mon)  13:45:11 
//----------------------------------------------
use Illuminate\Database\Capsule\Manager as Capsule;

class OrderService 
{

    public static function all()
    {
        try {
            // Capsule::enableQueryLog();
            // Capsule::beginTransaction();
            $datas = Order::get();
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
            //$datas = Order::orderBy('id', 'desc')->get();
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
            $data = Order::find($id);
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
             Capsule::enableQueryLog();
             Capsule::beginTransaction();
             $req = new \Request();
             $arrdata = $req->input->toArray();
             $od = new Order();

             $amount = 0;   
             $customer_id = $arrdata['customer_id'];
             $fills = ['customer_id','order_date','order_no','vat'];
             foreach ($fills as $key) {
                 if (isset($arrdata[$key])) {
                     $od->{$key} = $arrdata[$key];
                 }
             }
            $od->save();

            $details =[];
            foreach ($arrdata['details'] as $key => $detail) {
                $detail['customer_id'] = $customer_id;
                $detail['price'] = $detail['product']['price'];
                $detail['product_id'] = $detail['product']['id'];
                $detail['amount'] = $detail['price'] * $detail['qty'];
                $amount += $detail['amount'];
                
                $de = new \Detail();
                $de->amount = $detail['amount'];
                $de->customer_id = $detail['customer_id'];
                $de->price = $detail['price'];
                $de->product_id = $detail['product_id'];
                $de->qty = $detail['qty'];
                $details[] = $de;
            }
            $od->details()->saveMany($details);
            $od->refresh();
            $od->amount = $amount;
            $od->save();
            Capsule::commit();
            $datas = self::getalliddesc();
            return [
                'customer_id' => $customer_id,
                'input' => $arrdata,
                'data' => $od,
                'details' => $details,
                'datas' => $datas,
                'amount' => $amount,
                'status' => '1',
                'success'=> true,
                'sql' => Capsule::getQueryLog(),
                'func'=> __CLASS__.'/'.__FUNCTION__
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
           Capsule::enableQueryLog();
           Capsule::beginTransaction();
           $req = new \Request();
           $arrdata = $req->input->toArray();
           $od = Order::find($arrdata['id']);
           if(!$od) {
                 throw new Exception("ไม่มี Order รายการนี้", 1);
           }
           $amount = $arrdata['amount'];
           $fills = ['customer_id','order_date','order_no','vat','amount'];
           foreach ($fills as $key) {
               if (isset($arrdata[$key])) {
                   $od->{$key} = $arrdata[$key];
               }
           }
            $newitems = [];
            $edititems = [];
            foreach ($arrdata['details'] as $key => $dt) {
                if(isset($dt['isnew']) && $dt['isnew']){
                    $de = new \Detail();
                    $de->customer_id = $od->customer_id;
                    $de->price = $dt['product']['price'];
                    $de->product_id = $dt['product']['id'];
                    $de->qty = $dt['qty'];
                    $de->amount = $de->price * $de->qty;
                    $newitems[] = $de;

                } else if(isset($dt['isedit']) && $dt['isedit']){
                    $de = \Detail::find($dt['id']);
                    $de->customer_id = $dt['customer_id'];
                    $de->price = $dt['product']['price'];
                    $de->product_id = $dt['product']['id'];
                    $de->qty = $dt['qty'];
                    $de->amount = $de->price * $de->qty;
                    $de->save();
                    $edititems[] = $de;
                }
            }
            foreach ($arrdata['dels'] as $key => $dt) {
                $de = \Detail::find($dt['id']);
                $de->delete();
            }

            if($newitems){
                $od->details()->saveMany($newitems);
            }
            $od->save();
            Capsule::commit();
            $datas = self::getalliddesc();
            return [
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                //'newdata' => $newdata 
                'arrdata' => $arrdata,
                'data' => $od,
                'datas' => $datas,
                'newitems' => $newitems,
                'edititems' => $edititems,
                'amount'=>$amount,
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
            Capsule::enableQueryLog();
            Capsule::beginTransaction();
            $od = Order::find($id);
            if ($od) {
                $od->details()->delete();
                $od->delete();
            }
            Capsule::commit();
            $datas = self::getalliddesc();
            return [
                //'ajax' => $ajax,
                //'page' => $page,
                //'perpage' => $perpage,
                //'skip' => $skip,
                //'total' => $total,
                //'count' => count($datas),
                'data' => $od,
                'datas' => $datas,
                //'columns' => $columns,
                //'info' => $info,
                //'infos' => $info,
                //'domains' => $domains,
                //'method' => $method,
                'status' => '1',
                'success'=> true,
                'sql' => Capsule::getQueryLog(),
                'func'=> __CLASS__.'/'.__FUNCTION__
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
            $qry = Order::query();
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

    public static function orderdetails()
    {
        try {
            // Capsule::enableQueryLog();
            // Capsule::beginTransaction();
            $req = new \Request();
            $qry = Order::with(['details','details.product','customer']);
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
                'datas' => $datas,
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
            return Order::with(['customer','details','details.product'])->orderBy('id', 'desc')->get(); 
        } catch (\Exception $e) { 
            return [];  
        } 
    } 
 
} 

