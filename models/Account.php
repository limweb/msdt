<?php

//----------------------------------------------
//FILE NAME:  Account.php gen for Servit Framework Model 
//Created by: Tlen<limweb@hotmail.com> 
//DATE: 2021-03-02(Tue)  00:03:28  

//----------------------------------------------

use Jenssegers\Mongodb\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes; 
//use DB; 
 
class Account extends Model 
{ 
        protected    $table='accounts'; 
        protected    $primaryKey='id'; 
        public       $timestamps = false; 
        protected    $guarded = array('id'); 
        protected    $fillable = []; 
        protected    $hidden = []; //สำหรับใส่ mutations 
        protected    $appends = []; 
        protected    $with = []; 
        protected    $connection = 'mongodb'; 

}