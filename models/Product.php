<?php

//----------------------------------------------
//FILE NAME:  Product.php gen for Servit Framework Model 
//Created by: Tlen<limweb@hotmail.com> 
//DATE: 2021-02-01(Mon)  13:25:38  

//----------------------------------------------


use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes; 
//use DB; 
 
class Product extends Model 
{ 
        protected    $table='products'; 
        protected    $primaryKey='id'; 
        public       $timestamps = true; 
        protected    $dateFormat = 'U';
        protected    $guarded = array('id'); 
        protected    $fillable = []; 
        protected    $hidden = []; //สำหรับใส่ mutations 
        protected    $appends = []; 
        protected    $with = []; 
        protected    $connection = ''; 

}