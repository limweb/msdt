<?php

namespace  api;

//----------------------------------------------
//FILE NAME:  UserController.php gen for Servit Framework Controller
//Created by: Tlen<limweb@hotmail.com>
//DATE: 2021-03-02(Tue)  00:56:32 

//----------------------------------------------
use    Illuminate\Database\Capsule\Manager as Capsule;
use    \Jacwright\RestServer\RestException; 
use    Carbon\Carbon;


class UserController   {
    

   /**
     *@noAuth
     *@url GET /mysql/users
     *----------------------------------------------
     *FILE NAME:  UserController.php gen for Servit Framework Controller
     *DATE: 2021-03-02(Tue)  00:56:32

     *----------------------------------------------
     */
    public function alliddesc()
    {
        try {
            return \mysql\UserService::alliddesc();
        } catch (\Exception $e) {
        //throw new RestException($e->getCode(),$e->getMessage());
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


   /**
     *@noAuth
     *@url GET /mysql/users/vuetable
     *----------------------------------------------
     *FILE NAME:  UserController.php gen for Servit Framework Controller
     *DATE: 2021-03-02(Tue)  00:56:32

     *----------------------------------------------
     */
    public function vuetable()
    {
        try {
            return \mysql\UserService::vuetable();
        } catch (\Exception $e) {
            //throw new RestException($e->getCode(),$e->getMessage());
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


    /**
     *@noAuth
     *@url GET /mysql/user/$id/byid
     *----------------------------------------------
     *FILE NAME:  UserController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-03-02(Tue)  00:56:32

     *----------------------------------------------
     */
    public function byId($id)
    {
        try {
            return \mysql\UserService::byId($id);
        } catch (\Exception $e) {
            //throw new RestException($e->getCode(),$e->getMessage());
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


    /**
     *@noAuth
     *@url POST /mysql/user/update
     *----------------------------------------------
     *FILE NAME:  UserController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-03-02(Tue)  00:56:32

     *----------------------------------------------
     */
    public function update()
    {
        try {
            return \mysql\UserService::insertOrupdate();
        } catch (\Exception $e) {
            //throw new RestException($e->getCode(),$e->getMessage());
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     *@noAuth
     *@url POST /mysql/user/add
     *----------------------------------------------
     *FILE NAME:  UserController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE: 2021-03-02(Tue)  00:56:32

     *----------------------------------------------
     */
    public function add()
    {
        try {
            return \mysql\UserService::insert();
        } catch (\Exception $e) {
            //throw new RestException($e->getCode(),$e->getMessage());
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }

    /**
     *@noAuth
     *@url GET /mysql/user/del/$id
     *----------------------------------------------
     *FILE NAME:  UserController.php gen for Servit Framework Controller
     *Created by: Tlen<limweb@hotmail.com>
     *DATE:2021-03-02(Tue)  00:56:32

     *----------------------------------------------
     */
    public function del($id)
    {
        try {
            return \mysql\UserService::delete($id);
        } catch (\Exception $e) {
            //throw new RestException($e->getCode(),$e->getMessage());
            return [
                'status' => '0',
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }
    }


    

}
