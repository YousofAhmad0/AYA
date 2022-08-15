@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex flex-column 
                justify-content-between">
        <div class="container" style="margin-top:7%">
            <div>
                <h2 align="center" style="color:white">{{ $ResName }}</h2>
                <h2 align="center" style="color:white">Click on a table to reserve it</h2>
            </div>
            <div class="row mb-1">

                @foreach ($tables as $table)
                    <div class="col-md-4">
                        @if ($table->isFree)
                            <div class="flip-card" style="margin-top:7%">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <ul class="list-group">
                                            <li class="list-group-item" align="center">
                                                <b>Table Number {{ $loop->iteration }}</b>
                                            </li>
                                            <li class="list-group-item">
                                                @if ($table->isOut)
                                                    The table is outside
                                                @else
                                                    The table is inside
                                                @endif
                                            </li>
                                            <li class="list-group-item">
                                                The capacity of the table is {{ $table->capacity }}
                                            </li>
                                            <li class="list-group-item">
                                                @if ($table->isFree)
                                                    The table is empty
                                                @else
                                                    The table is not empty
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="flip-card-back">
                                        <form action="{{ route('reservation.submit') }}" method="post">
                                            @csrf
                                            <input type="hidden" id="ResID" name="ResID" value="{{ $ResID }}">
                                            <input type="hidden" id="resName" name="resName" value="{{ $ResName }}">
                                            <input type="hidden" id="tid" name="tid" value="{{ $table->id }}">
                                            <div class="form-group">
                                                <label for="number">Number of people</label>
                                                <input type="number" min="1" max="{{ $table->capacity }}" name="nop"
                                                    id="nop">
                                            </div>
                                            <div class="form-group">
                                                <label for="datetime">Date and Time</label>
                                                <input type="datetime-local" name="dat" id="dat">
                                            </div>
                                            <button type="submit" class="btnLogin"
                                                style="margin-top:4%">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a role="link" aria-disabled="true">
                                <ul class="list-group" style="margin-top:7%">
                                    <li class="list-group-item">
                                        <b>Table Number {{ $loop->iteration }}</b>
                                    </li>
                                    <li class="list-group-item">
                                        Table is not available
                                    </li>
                                </ul>
                            </a>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
