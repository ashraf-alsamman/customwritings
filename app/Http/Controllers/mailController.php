<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class mailController extends Controller
{
  public  function send()
    {
            Mail::send(['text'=>'mail'],['name'=>'ashraf', "body" => "Test mail"],function ($message){
            $message->to('ashraf.alsamman@gmail.com','just for test')->subject('tile') ;
            $message->from('laraveltest2018@gmail.com','just for test');       
            });

       
    }
}
