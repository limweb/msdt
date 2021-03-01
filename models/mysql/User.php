<?php

namespace  mysql;

//----------------------------------------------
//FILE NAME:  User.php gen for Servit Framework Model 
//Created by: Tlen<limweb@hotmail.com> 
//DATE: 2021-03-02(Tue)  00:13:45  

//----------------------------------------------


use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes; 
//use DB; 
 
class User extends Model 
{ 
        protected    $table='users'; 
        protected    $primaryKey='id'; 
        public       $timestamps = true; 
        protected    $guarded = array('id'); 
        protected    $fillable = []; 
        protected    $hidden = []; //สำหรับใส่ mutations 
        protected    $appends = []; 
        protected    $with = []; 
        protected    $connection = 'mysql'; 

}