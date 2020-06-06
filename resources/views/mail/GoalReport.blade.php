@extends('layouts.base')

@section('content')
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
                        <thead style="background-color: cornsilk">
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Priority</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($goal->activities as $activity)
                                <tr>
                                    <td>{{$activity->name}}</td>
                                    <td>{{$activity->date}}</td>
                                    <td>{{$activity->status}}</td>
                                    <td>{{$activity->priority}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection