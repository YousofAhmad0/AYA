@extends('layouts.app')
@php
if (isset($_POST['submit'])) {
    if (isset($_POST['select'])) {
        $p = $_POST['select'];
        print_r($p);
    }
}
@endphp
@section('content')
    <div class="min-vh-100 d-flex flex-column 
                justify-content-between">
        <div class="container" style="margin-top: 70px;">
            <div class="row">
                <div class="col">
                    <div class="jumbotron" style="margin-bottom: 100px;margin-right:60%">
                        <img src=" {{ url(glob("images/pics/$resName.*")[0]) }}" style="margin-left:38%" width="130px"
                            alt="">
                    </div>
                </div>
                <div class="col" style="padding-left: 45%">
                    <a href="{{ route('reservation.index', [$resID, $resName]) }}" class="btnLBP"
                        style="background-color: chocolate;margin-left:1%;display: inline-block">Reserve Your Table</a>
                    {{-- <form action="{{ route('restaurant.index', [$resID, $resName]) }}" method="GET">
                    <input type="checkbox" class="liradollar" name="liradollar" checked data-toggle="toggle"
                        data-on="LBP" data-off="USD">
                </form> --}}
                    @if ($curr == 0)
                        <a href="{{ route('restaurant.index', [$resID, $resName, 1]) }}" class="btnLBP"
                            style="background-color: rgb(210, 183, 30)">Change to LBP</a>
                    @endif
                    @if ($curr == 1)
                        <a href="{{ route('restaurant.index', [$resID, $resName, 0]) }}" class="btnUSD"
                            style="background-color: rgb(39, 100, 44)">Change to USD</a>
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col">

                    <form action="{{ route('order.index') . '?redirect=' . $curr }}" method="post">
                        @csrf
                        <input type="hidden" name="resID" value="{{ $resID }}">
                        <input type="hidden" name="resName" value="{{ $resName }}">
                        @foreach ($foods as $menu => $food)
                            <h4 style="color:white;width:max-content">{{ $menu }}</h4>
                            <table class="table">
                                <tr>
                                    <th>

                                    </th>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Select
                                    </th>
                                </tr>
                                @foreach ($food as $f)
                                    <tr>
                                        <td>
                                            <div class="jumbotron">
                                                <img src=" {{ url(glob("images/dishPics/$f->name.*")[0]) }}" width="70px"
                                                    alt="">
                                            </div>
                                        </td>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $f->name }}
                                        </td>
                                        <td>
                                            @if ($curr)
                                                {{ $f->price }} L.L.
                                            @else
                                                {{ $f->price }} $
                                            @endif

                                        </td>
                                        <td>
                                            <input type="checkbox" class="form-check-input" name="select[]"
                                                value="{{ $f->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endforeach
                        <button type="submit" class="btnLogin" style="margin-top:4%;margin-left:65%">Submit</button>
                    </form>
                </div>
                <div class="col">
                    <img src=" {{ url('images/PizzaTower.gif') }}" style="margin-bottom:20px"
                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                        width="500px" alt="">
                </div>
            </div>
        </div>
    @endsection
