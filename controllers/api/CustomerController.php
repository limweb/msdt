<?php

namespace  api;

//----------------------------------------------
//FILE NAME:  CustomerController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2021-02-01(Mon)  13:37:13 

//----------------------------------------------
use    Illuminate\Database\Capsule\Manager as Capsule;
use    Carbon\Carbon;

class CustomerController   {
    

   /**
     *@noAuth
     *@url GET /customers
     *----------------------------------------------
     *FILE NAME:  CustomerController.php gen for Servit Framework Controller
     *DATE: 2021-02-01(Mon)  13:37:13

     *----------------------------------------------
     */
    public function alliddesc()
    {
        try {
            return \CustomerService::alliddesc();
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
     *@url GET /customers/vuetable
     *----------------------------------------------
     *FILE NAME:  CustomerController.php gen for Servit Framework Controller
     *DATE: 2021-02-01(Mon)  13:37:13

     *----------------------------------------------
     */
    public function vuetable()
    {
        try {
            return \CustomerService::vuetable();
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
     *@url GET /customer/$id/byid
     *----------------------------------------------
     *FILE NAME:  CustomerController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:37:13

     *----------------------------------------------
     */
    public function byId($id)
    {
        try {
            return \CustomerService::byId($id);
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
     *@url POST /customer/update
     *----------------------------------------------
     *FILE NAME:  CustomerController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:37:13

     *----------------------------------------------
     */
    public function update()
    {
        try {
            return \CustomerService::insertOrupdate();
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
     *@url POST /customer/add
     *----------------------------------------------
     *FILE NAME:  CustomerController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:37:13

     *----------------------------------------------
     */
    public function add()
    {
        try {
            return \CustomerService::insert();
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
     *@url GET /customer/del/$id
     *----------------------------------------------
     *FILE NAME:  CustomerController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE:2021-02-01(Mon)  13:37:13

     *----------------------------------------------
     */
    public function del($id)
    {
        try {
            return \CustomerService::delete($id);
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }



}
