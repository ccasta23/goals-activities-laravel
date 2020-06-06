@extends('layouts.app')

@section('content')

    <h1 class="alert alert-success text-center">Goals</h1>
    <div class="container">
        <div class="row">
            <div class="col text-right">
                <a href="/goals/create" class="btn btn-primary">New Goal</a>
            </div>
        </div>
    </div>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Months</th>
                <th>Priority</th>
                <th>Active</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($goals as $goal)
                <tr>
                    <td>{{$goal->name}}</td>
                    <td>{{$goal->description}}</td>
                    <td>{{$goal->months}}</td>
                    <td>{{$goal->priority}}</td>
                    <td>{{$goal->active}}</td>
                    <td>
                        <a href="goals/{{$goal->id}}" class="btn btn-outline-primary">Show</a>
                    </td>
                    <td>
                        <a href="goals/{{$goal->id}}/edit" class="btn btn-outline-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('goals.destroy', $goal)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-outline-danger"
                                onclick="return confirm('¿Realmente desea borrar el objetivo?')"
                            >Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>   

    
@endsection