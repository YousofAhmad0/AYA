@extends('layouts.app')
@section('content')
    <div class="min-vh-100 d-flex flex-column 
                justify-content-between">
        <form action="{{ route('feedback.index') }}" method="post">
            @csrf
            <div class="container" style="margin-top:10%;color:white">
                <div class="card">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <label for="feedback">Your Feedback: </label>
                            <hr>
                            <textarea name="feedback" id="feedback" cols="110"></textarea>
                            <footer class="card-blockquote">
                                <input class="btn btn-dark" style="float:right" type="submit" value="Send">
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
