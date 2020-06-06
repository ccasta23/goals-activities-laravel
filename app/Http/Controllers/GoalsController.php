<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goal;
use App\Http\Requests\GoalRequest; //Lo voy a utilizar
use Illuminate\Support\Facades\Mail;
use App\Mail\GoalReport;

class GoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Goal::all();
        return view('goal.index', [
            'goals' => Goal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalRequest $request)
    {
        /* $request->validate([
            'goalName' => 'required',
            'goalDescription' => ['required', 'min:3'], //Colocar más de una validación usando arreglo
            'goalPriority' => 'required|integer',//Colocar más de una validación usando pipe |
            'goalMonths' => ['required', 'integer']//Colocar más de una validación usando arreglo
        ], 
        [
            'goalName.required' => 'Debe ingresar un nombre !!!',
            'goalDescription.required' => 'Oiga, llene el campo de descripción',
            'goalDescription.min' => 'Debe terner una descripción de al menos 3 caracteres'
            'goalPriority.required' => 'Debe ingresar una prioridad, Si no la conoce, escriba 0'
        ]
        ); */

        $goal = new Goal();
        $goal->name = $request->get('goalName');
        $goal->description = $request->get('goalDescription');
        $goal->priority = $request->get('goalPriority');
        $goal->months = $request->get('goalMonths');
        $goal->active = $request->get('goalActive');

        $goal->save();
        return redirect('/goals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * Usa Model Binding en donde Laravel consulta el recurso por nosotros
     */
    public function show(Goal $goal) //Type Hinting=>Escribir el tipo de dato de una variable
    {
        //Consultar en la base de datos si el recurso existe, si no existe error 404
        //$goal = Goal::findOrFail($id);

        return view('goal.show', [
            'goal' => $goal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goal = Goal::find($id);
        return view('goal.edit', [
            'goal' => $goal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoalRequest $request, $id)
    {
        /* $request->validate([
            'goalName' => 'required',
            'goalDescription' => ['required', 'min:3'], //Colocar más de una validación usando arreglo
            'goalPriority' => 'required|integer',//Colocar más de una validación usando pipe |
            'goalMonths' => ['required', 'integer']//Colocar más de una validación usando arreglo
        ], 
        [
            'goalName.required' => 'Debe ingresar un nombre !!!',
            'goalDescription.required' => 'Oiga, llene el campo de descripción',
            'goalDescription.min' => 'Debe terner una descripción de al menos 3 caracteres'
            'goalPriority.required' => 'Debe ingresar una prioridad, Si no la conoce, escriba 0'
        ]
        ); */

        $goal = Goal::find($id); //Obtener el registro de la base de datos
        $goal->name = $request->get('goalName');
        $goal->description = $request->get('goalDescription');
        $goal->priority = $request->get('goalPriority');
        $goal->months = $request->get('goalMonths');
        $goal->active = $request->get('goalActive');

        $goal->save();
        return redirect('/goals');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goal $goal)
    { 
       /* $goal = Goal::find($id); */
        $goal->delete();

        return back();
    }

    public function sendEmail(Request $request, Goal $goal){
        Mail::to(env('app_email_reports', 'carlos.castaneda@ucaldas.edu.co'))->send(new GoalReport($goal));
        return back()->with('status', 'Correo enviado satisfactoriamente');
    }
}
