@extends('layouts.app')
@section('content')
    <div class="min-vh-100 d-flex flex-column 
                justify-content-between">

        <div class="row" style="margin-top:10%; width:100%">
            <div class="col">
                <img src=" {{ url('images/allFood.gif') }}"
                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    width="500px" alt="">
            </div>
            <div class="col-md-7">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                Restaurant name
                            </th>
                            <th scope="col">
                                Location
                            </th>
                            <th scope="col">
                                Rate
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userData as $user)
                            <tr>

                                <td><a class="btn btn-outline-warning"
                                        href="{{ route('restaurant.index', [$user->id, $user->ResName, 1]) }}">{{ $user->ResName }}</a>
                                </td>

                                <td>{{ $user->Location }}</td>
                                <td>{{ $user->Rate }}</td>
                            </tr>
                        @endforeach


                    </tbody>

                </table>
            </div>
            <div class="col">

                <img src=" {{ url('images/allFood.gif') }}"
                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    width="500px" alt="">

            </div>
        </div>
    @endsection
