<?php

//----------------------------------------------
//FILE NAME:  Order.php gen for Servit Framework Model 
//Created by: Tlen<limweb@hotmail.com> 
//DATE: 2021-02-01(Mon)  13:26:33  

//----------------------------------------------


use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes; 
 
class Order extends Model 
{ 
        protected    $table='orders'; 
        protected    $primaryKey='id'; 
        public       $timestamps = true; 
        protected    $guarded = array('id'); 
        protected    $fillable = []; 
        protected    $hidden = []; //สำหรับใส่ mutations 
        protected    $appends = []; 
        protected    $with = []; 
        protected    $connection = ''; 
 
        public function details(){
            return $this->hasMany('\Detail','order_id','id');
        }

        public function customer(){
            return $this->hasOne('\Customer','id','customer_id');
        }

        

}