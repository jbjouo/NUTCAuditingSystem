<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class pdfController extends Controller
{
    public function pdftest(){
      PDF::SetTitle('Hello World');
      PDF::AddPage();
      PDF::Write(0, 'Hello World');
      PDF::Output('hello_world.pdf');
    }
}
