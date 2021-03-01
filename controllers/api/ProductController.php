<?php

namespace  api;

//----------------------------------------------
//FILE NAME:  ProductController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2021-02-01(Mon)  13:39:55 

//----------------------------------------------
use    Illuminate\Database\Capsule\Manager as Capsule;
use    Carbon\Carbon;

class ProductController   {
    

   /**
     *@noAuth
     *@url GET /products
     *----------------------------------------------
     *FILE NAME:  ProductController.php gen for Servit Framework Controller
     *DATE: 2021-02-01(Mon)  13:39:55

     *----------------------------------------------
     */
    public function alliddesc()
    {
        try {
            return \ProductService::alliddesc();
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
     *@url GET /products/vuetable
     *----------------------------------------------
     *FILE NAME:  ProductController.php gen for Servit Framework Controller
     *DATE: 2021-02-01(Mon)  13:39:55

     *----------------------------------------------
     */
    public function vuetable()
    {
        try {
            return \ProductService::vuetable();
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
     *@url GET /product/$id/byid
     *----------------------------------------------
     *FILE NAME:  ProductController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:39:55

     *----------------------------------------------
     */
    public function byId($id)
    {
        try {
            return \ProductService::byId($id);
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
     *@url POST /product/update
     *----------------------------------------------
     *FILE NAME:  ProductController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:39:55

     *----------------------------------------------
     */
    public function update()
    {
        try {
            return \ProductService::insertOrupdate();
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
     *@url POST /product/add
     *----------------------------------------------
     *FILE NAME:  ProductController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:39:55

     *----------------------------------------------
     */
    public function add()
    {
        try {
            return \ProductService::insert();
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
     *@url GET /product/del/$id
     *----------------------------------------------
     *FILE NAME:  ProductController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE:2021-02-01(Mon)  13:39:55

     *----------------------------------------------
     */
    public function del($id)
    {
        try {
            return \ProductService::delete($id);
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }



}
