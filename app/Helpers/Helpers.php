<?php

use Vinkla\Hashids\Facades\Hashids;

if(!function_exists('trimInput')){

    function trimInput($input){
        return str_replace(['/', ' ','*', '+', '=', '<', '>', '&', '^', '%', '$', '#', '@', '!', '[', ']', ], '', $input);
    }
}

if(!function_exists('moneyFormat')){
    function moneyFormat($currency){
        return '₦'.number_format($currency, 2);
    }

if(!function_exists('auth_user')){

    function auth_user(){
        return auth()->user();
    }
}

if(!function_exists('addHashId')){
    function addHashId($data){
        foreach($data as $dd){
            $dd->hashid = Hashids::connection('products')->encode($dd->id);
        }
    return $data;
    }
}
}