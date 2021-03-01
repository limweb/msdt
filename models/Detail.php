<?php

//----------------------------------------------
//FILE NAME:  Detail.php gen for Servit Framework Model 
//Created by: Tlen<limweb@hotmail.com> 
//DATE: 2021-02-01(Mon)  13:27:06  

//----------------------------------------------


use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes; 
//use DB; 
 
class Detail extends Model 
{ 
        protected    $table='details'; 
        protected    $primaryKey='id'; 
        public       $timestamps = true; 
        protected    $guarded = array('id'); 
        protected    $fillable = []; 
        protected    $hidden = []; //สำหรับใส่ mutations 
        protected    $appends = []; 
        protected    $with = []; 
        protected    $connection = ''; 


        public function product(){
            return $this->hasOne('\Product','id','product_id');
        }
 
}