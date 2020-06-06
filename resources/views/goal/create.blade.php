@extends('layouts.app')

@section('content')

    <h1 class="alert alert-success text-center">New Goal</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/goals" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col shadow py-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/goals" method="POST" >
                @csrf
                <div class="form-group">
                    <label for="goalName">Name</label>
                    <input type="text" class="form-control" id="goalName" name="goalName" value="{{old('goalName')}}">
                </div>
                <div class="form-group">
                    <label for="goalDescription">Description</label>
                    <textarea name="goalDescription" id="goalDescription" name="goalDescription" class="form-control">{{old('goalDescription')}}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="goalMonths">Months</label>
                        <input type="number" class="form-control" id="goalMonths" name="goalMonths" placeholder="Type the goal months" value="{{old('goalMonths')}}">
                    </div>
                    <div class="form-group col">
                        <label for="goalPriority">Priority</label>
                        <input type="number" class="form-control" id="goalPriority" name="goalPriority" placeholder="Type the goal priority" value="{{old('goalPriority')}}">
                    </div>
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="goalActive" name="goalActive" 
                    {{old('goalActive') ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="goalActive">Active?</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection