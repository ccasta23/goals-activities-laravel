@extends('layouts.app')

@section('content')

    <h1 class="alert alert-success text-center">{{$goal->name}}</h1>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <a href="/goals" class="btn btn-danger btn-block mb-3">Back</a>
            </div>
            <div class="col-6">
                <form action="{{route('goals.sendEmail', $goal)}}" method="post">
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-primary btn-block mb-3"
                        onclick="return confirm('¿Desea enviar el reporte del objetivo?')"
                    >Send Email</button>
                </form>
            </div>
        </div>
        @if (session('status'))
            <div class="row">
                <div class="alert alert-success col-12" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">{{$goal->name}}</h1>
                    <p class="lead">
                        <ul>
                            <li><strong>Description:</strong> {{$goal->description}}</li>
                            <li><strong>Months:</strong> {{$goal->months}}</li>
                            <li><strong>Priority:</strong> {{$goal->priority}}</li>
                        </ul>
                    </p>
                    <hr class="my-4">
                    <h3>Activities</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($goal->activities as $activity)
                                <tr>
                                    <td>{{$activity->name}}</td>
                                    <td>{{$activity->date}}</td>
                                    <td>{{$activity->status}}</td>
                                    <td>{{$activity->priority}}</td>
                                    <td>
                                        <a href="/goals/{{$goal->id}}/activities/{{$activity->id}}/edit" class="btn btn-outline-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('activities.destroy', [$goal, $activity])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-outline-danger"
                                                onclick="return confirm('¿Realmente desea borrar la actividad?')"
                                            >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-primary btn-lg" href="/goals/{{$goal->id}}/activities/create" role="button">Create Activity</a>
                </div>
            </div>
        </div>
    </div>

@endsection