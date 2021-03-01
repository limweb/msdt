<?php

namespace  api;

//----------------------------------------------
//FILE NAME:  OrderController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2021-02-01(Mon)  13:46:27 

//----------------------------------------------
use    Illuminate\Database\Capsule\Manager as Capsule;
use    Carbon\Carbon;

class OrderController   {
    

   /**
     *@noAuth
     *@url GET /orders
     *----------------------------------------------
     *FILE NAME:  OrderController.php gen for Servit Framework Controller
     *DATE: 2021-02-01(Mon)  13:46:27

     *----------------------------------------------
     */
    public function alliddesc()
    {
        try {
            return \OrderService::alliddesc();
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


   /**
     *@noAuth
     *@url GET /orders/vuetable
     *----------------------------------------------
     *FILE NAME:  OrderController.php gen for Servit Framework Controller
     *DATE: 2021-02-01(Mon)  13:46:27

     *----------------------------------------------
     */
    public function vuetable()
    {
        try {
            return \OrderService::vuetable();
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


    /**
     *@noAuth
     *@url GET /order/$id/byid
     *----------------------------------------------
     *FILE NAME:  OrderController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:46:27

     *----------------------------------------------
     */
    public function byId($id)
    {
        try {
            return \OrderService::byId($id);
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


    /**
     *@noAuth
     *@url POST /order/update
     *----------------------------------------------
     *FILE NAME:  OrderController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:46:27

     *----------------------------------------------
     */
    public function update()
    {
        try {
            return \OrderService::insertOrupdate();
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     *@noAuth
     *@url POST /order/add
     *----------------------------------------------
     *FILE NAME:  OrderController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:46:27

     *----------------------------------------------
     */
    public function add()
    {
        try {
            return \OrderService::insert();
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     *@noAuth
     *@url GET /order/del/$id
     *----------------------------------------------
     *FILE NAME:  OrderController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE:2021-02-01(Mon)  13:46:27

     *----------------------------------------------
     */
    public function del($id)
    {
        try {
            return \OrderService::delete($id);
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }

    
    /**
    *@noAuth
    *@url GET /order/details
    *----------------------------------------------
    *FILE NAME:  OrderController.php gen for Servit Framework Controller
    *Created by: Tlen<limweb@hotmail.com>
    *DATE:  2021-02-01(Mon)  13:55:15 
    
    *----------------------------------------------
    */
    public function orderdetails(){
        try {
            return \OrderService::orderdetails();
        } catch (\Exception $e) {
            return[
                'status' => '0',
                'success'=> false,
                'msg'=> $e->getMessage(),
            ]; 
        }
    }
    
    



}
