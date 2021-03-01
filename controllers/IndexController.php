<?php

//----------------------------------------------
//FILE NAME:  IndexController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2020-12-24(Thu)  16:51:28 

//----------------------------------------------
use    Illuminate\Database\Capsule\Manager as Capsule;
use    Illuminate\Support\Collection;
use    Carbon\Carbon;


class IndexController   extends SecureController {

   /**
     *@noAuth
     *@url GET /
     *----------------------------------------------
     *FILE NAME:  IndexController.php gen for Servit Framework Controller
     *DATE: 2020-12-24(Thu)  16:51:28
     *----------------------------------------------
     */
    public function index()  
    {
        include SRVPATH.'/publics/app.html';
    }


   
   /**
   *@noAuth
   *@url GET /index
   *----------------------------------------------
   *FILE NAME:  IndexController.php gen for Servit Framework Controller
   *Created by: Tlen<limweb@hotmail.com>
   *DATE:  2021-02-01(Mon)  13:04:01 
   
   *----------------------------------------------
   */
   public function test(){
       try {
           
           return [
               //'ajax' => $ajax,
               //'page' => $page,
               //'perpage' => $perpage,
               //'skip' => $skip,
               //'total' => $total,
               //'count' => count($datas),
               //'datas' => $datas,
               //'columns' => $columns,
               //'info' => $info,
               //'infos' => $info,
               //'domains' => $domains,
               //'method' => $method,
               'status' => '1',
               'success'=> true,
               //'sql' => Capsule::getQueryLog(),
               'func'=> __CLASS__.'/'.__FUNCTION__
           ];
       } catch (\Exception $e) {
           return[
               'status' => '0',
               'success'=> false,
               'msg'=> $e->getMessage(),
               'func'=> __CLASS__.'/'.__FUNCTION__,
           ]; 
       }
   }
   

    
    /**
    *@noAuth
    *@url GET /products
    *----------------------------------------------
    *FILE NAME:  IndexController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2021-02-01(Mon)  14:01:40 
    
    *----------------------------------------------
    */
    public function products(){
                include SRVPATH.'/publics/product.html';
    }
    
    /**
    *@noAuth
    *@url GET /customers
    *----------------------------------------------
    *FILE NAME:  IndexController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2021-02-01(Mon)  14:01:40 
    
    *----------------------------------------------
    */
    public function customers(){
        include SRVPATH.'/publics/customer.html';
    }
    
    /**
    *@noAuth
    *@url GET /orders
    *----------------------------------------------
    *FILE NAME:  IndexController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2021-02-01(Mon)  14:01:40 
    
    *----------------------------------------------
    */
    public function orders(){
        include SRVPATH.'/publics/order.html';
    }
    
        



}
