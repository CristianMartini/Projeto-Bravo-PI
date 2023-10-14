<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
   public function index(){
   
    return view ('home',['produtos'=>Produto::all()]);
   }
   public function show(Produto $produto){
     return view( 'produto.show',['produto'=>$produto]);
   }
}
