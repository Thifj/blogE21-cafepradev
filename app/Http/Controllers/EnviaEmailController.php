<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnviaEmailController extends Controller
{
    public function index(){
      $result = Mail::to("thifj.j@hotmail.com")->send(new SendMail("mensagem de teste", "thiago"));

      return($result) ? "E-mail enviado" : "erro";
    }
}
