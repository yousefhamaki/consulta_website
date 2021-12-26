@extends('admin.admin')

@section('title')
    الطلبات
@stop

@section('content')
<style>
    .card{
        display: inline-block;
    }
    .container{
        text-align: center;
    }
    .order_num{
        color: red;
    }
</style>
<small id='active_button_bage' data-value='1'></small>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Chats</h5>
                <p class="card-text"><span class='order_num'>25</span> chat</p>
                <a href="{{url( MANAGE . '/orders/chats')}}" class="btn btn-primary">Go chats</a>
            </div>
            </div>

            <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Calls</h5>
                <p class="card-text"><span class='order_num'>20</span> phone number</p>
                <a href="{{url( MANAGE . '/orders/calls')}}" class="btn btn-primary">Go calls</a>
            </div>
            </div>

            <div class="card text-right" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Mails</h5>
                <p class="card-text"><span class='order_num'>13</span> mail</p>
                <a href="{{url( MANAGE . '/orders/mails')}}" class="btn btn-primary">Go mails</a>
            </div>
        </div>
    </div>
@stop