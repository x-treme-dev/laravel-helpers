<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
 

class FormController extends Controller
{
    //Вывод формы; работа с массивом данных
    public function index(){
        return view('form');
    }
    
    public function store(Request $request){
        $request->validate([
            'path' => 'required',
        ]);
        // записать url в переменную
        $path =  $request->input('path');
        // получить данные по url
        $data = Http::timeout(5) -> get($path)->json();
        $dataDot = Arr::take(Arr::dot($data),66);
        $dataFlatten = Arr::flatten($data);
        $query = Arr::query(Arr::random($data));
        $random = Arr::random($data);
        // dump($dataDot);
        // dump($dataFlatten);
        //($data);
        
         return redirect()->back()->with([
            'success' => 'JSON is uploaded', 
            'random' => $random,
            'query' => $query,
            'dataFlatten' => $dataFlatten,
            'dataDot' => $dataDot,
         ]);
    }
  
}
