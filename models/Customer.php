<?php

//----------------------------------------------
//FILE NAME:  Customer.php gen for Servit Framework Model 
//Created by: Tlen<limweb@hotmail.com> 
//DATE: 2021-02-01(Mon)  13:29:34  
//----------------------------------------------


use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes; 
 
class Customer extends Model 
{ 
        protected    $table='customers'; 
        protected    $primaryKey='id'; 
        public       $timestamps = true; 
        protected    $guarded = array('id'); 
        protected    $fillable = []; 
        protected    $hidden = []; //สำหรับใส่ mutations 
        protected    $appends = []; 
        protected    $with = []; 
        protected    $connection = ''; 

        public function orders() {
           return $this->belongsTo('\Order', 'customer_id', 'id');
        }

}