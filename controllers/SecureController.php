<?php

class SecureController   {
    
    public function __construct()
    {

    }

    public function init()
    {
    }

    public function authorize()
    {
        return \Request::getInstance()->verify;
    }

}
