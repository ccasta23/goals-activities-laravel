<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    
    // function suma(int $a, $b){

    // }

    //Type Hinting: Opcionalmente puedo colocar el tipo de dato del parámetro que voy a recibir
    function inicio(Request $request) { //Inyección de dependencias
        //var_dump($request->query('title')); die;
        //dd($request->query('title'));
        $title = $request->query('title', 'Curso Laravel - Dashboard');
        return view('test', [
            'title' => $title
        ]);
    }

    function testDB() {
        try {
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                return "Yes! Successfully connected to the DB: " . DB::connection()->getDatabaseName();
            }else{
                die("Could not find the database. Please check your configuration.");
            }
        } catch (\Exception $e) {
            die("Could not open connection to database server.  Please check your configuration.");
        }
    }

}
