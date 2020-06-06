@extends('layouts.app')

@section('content')

    <h1 class="alert alert-success text-center">Edit Activity</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/goals/{{$goal->id}}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/goals/{{$goal->id}}/activities/{{$activity->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="activityName">Name</label>
                        <input type="text" class="form-control" id="activityName" name="activityName" placeholder="Type the activity name" value="{{old('activityName', $activity->name)}}">
                    </div>
                    <div class="form-group col">
                        <label for="activityDate">Date</label>
                        <input type="date" class="form-control" id="activityDate" name="activityDate" value="{{old('activityDate', $activity->date)}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="activityStatus">Status</label>
                        <input type="text" class="form-control" id="activityStatus" name="activityStatus" placeholder="Type the activity status" value="{{old('activityStatus', $activity->status)}}">
                    </div>
                    <div class="form-group col">
                        <label for="activityPriority">Priority</label>
                        <input type="number" class="form-control" id="activityPriority" name="activityPriority" placeholder="Type the goal priority" value="{{old('activityPriority', $activity->priority)}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection