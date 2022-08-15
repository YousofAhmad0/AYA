@extends('layouts.app')
@php
$curr = request()->redirect;
@endphp
@section('content')
    <div class="min-vh-100 d-flex flex-column 
                justify-content-between">
        <div class="container" style="margin-top: 70px;">
            <div class="row justify-content-center">
                <div class="col-sm">
                    <form action="#" method="post">
                        @csrf

                        <h5>{{ $resName }}</h5>
                        <div>
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
                                        Quantity
                                    </th>
                                    <th>
                                        Net Price
                                    </th>
                                </tr>
                                @foreach ($foods as $food)
                                    <tr>
                                        <td>
                                            <div class="jumbotron">
                                                <img src=" {{ url(glob("images/dishPics/$food->name.*")[0]) }}"
                                                    width="70px" alt="">
                                            </div>
                                        </td>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $food->name }}
                                        </td>
                                        <td>
                                            @if ($curr)
                                                {{ $food->price }} L.L.
                                            @else
                                                {{ $food->price }} $
                                            @endif

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input style="width:80px" class="form-control" type="number"
                                                    name="{{ $food->id }}" value="{{ $quantity[$food->id] }}" min="1">
                                            </div>
                                        </td>
                                        <td>
                                            @if ($quantity)
                                                @if ($curr)
                                                    {{ $food->price * $quantity[$food->id] }} L.L.
                                                @else
                                                    {{ $food->price * $quantity[$food->id] }} $
                                                @endif
                                            @else
                                                @if ($curr)
                                                    {{ $food->price }} L.L.
                                                @else
                                                    {{ $food->price }} $
                                                @endif
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                        <div>
                            <div class="form-group" style="display: inline-block">
                                <label for="text" style="color:white; font-size:30px;">Address: </label>
                                <input class="form-control" type="text" name="address" value="{{ $address }}">
                            </div>
                            <div style="display: inline-block; float:right">
                                @if ($curr)
                                    <b>
                                        <p style="color:white; font-size:30px;">Total
                                            price: {{ $totalPrice }} L.L.</p>
                                    </b>
                                @else
                                    <b>
                                        <p style="color:white; font-size:30px;">Total
                                            price: {{ $totalPrice }} $</p>
                                    </b>
                                @endif
                            </div>

                        </div>
                        <div style="margin-top:2%">
                            <div style="display: inline-block;">
                                <button type=" submit" class="btnLogin"
                                    formaction="{{ route('order.update') . '?redirect=' . $curr }}"
                                    style="margin-top:4%">
                                    Update</button>
                            </div>
                            <div style="display: inline-block; float:right">
                                <button type="submit" class="btnLogin"
                                    formaction="{{ route('order.placeOrder') . '?redirect=' . $totalPrice . '&curr=' . $curr }}"
                                    style="margin-top:4%">Place Order</button>
                            </div>
                        </div>
                        <input type="hidden" name="resID" value="{{ $resID }}">
                        <input type="hidden" name="resName" value="{{ $resName }}">
                    </form>
                </div>
            </div>
        </div>
    @endsection
