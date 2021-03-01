<?php

namespace  api;

//----------------------------------------------
//FILE NAME:  DetailController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2021-02-01(Mon)  13:46:05 

//----------------------------------------------
use    Illuminate\Database\Capsule\Manager as Capsule;
use    Carbon\Carbon;

class DetailController   {
    

   /**
     *@noAuth
     *@url GET /details
     *----------------------------------------------
     *FILE NAME:  DetailController.php gen for Servit Framework Controller
     *DATE: 2021-02-01(Mon)  13:46:05

     *----------------------------------------------
     */
    public function alliddesc()
    {
        try {
            return \DetailService::alliddesc();
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
     *@url GET /details/vuetable
     *----------------------------------------------
     *FILE NAME:  DetailController.php gen for Servit Framework Controller
     *DATE: 2021-02-01(Mon)  13:46:05

     *----------------------------------------------
     */
    public function vuetable()
    {
        try {
            return \DetailService::vuetable();
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
     *@url GET /detail/$id/byid
     *----------------------------------------------
     *FILE NAME:  DetailController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:46:05

     *----------------------------------------------
     */
    public function byId($id)
    {
        try {
            return \DetailService::byId($id);
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
     *@url POST /detail/update
     *----------------------------------------------
     *FILE NAME:  DetailController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:46:05

     *----------------------------------------------
     */
    public function update()
    {
        try {
            return \DetailService::insertOrupdate();
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
     *@url POST /detail/add
     *----------------------------------------------
     *FILE NAME:  DetailController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-02-01(Mon)  13:46:05

     *----------------------------------------------
     */
    public function add()
    {
        try {
            return \DetailService::insert();
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
     *@url GET /detail/del/$id
     *----------------------------------------------
     *FILE NAME:  DetailController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE:2021-02-01(Mon)  13:46:05

     *----------------------------------------------
     */
    public function del($id)
    {
        try {
            return \DetailService::delete($id);
        } catch (\Exception $e) {
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }



}
