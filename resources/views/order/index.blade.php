@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
    <h1 class="card-header bg-primary text-light">Company - {{ __('menu.order') }}</h1>
    
    <div class="card-body">
        <table class="table table-striped table-sm table-hover">
          <thead>
            <tr>
              <th>Zamowienie Nr</th>
              <th>Klient</th>
              <th>Dostawa Ilosc</th>
              <th>Cena (suma)</th>
              <th>Status</th>
              <th>Druk</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $key => $order)
              <tr>
                <td><a href="{{ route('order.show',$order->id) }}" class="btn btn-primary">{{$order->name}}</a></td>
                <td>{{$order->customer->name}}</td>
                <td><p>{{$order->total}} mặt hàng</p> <p><em>{{ $order->products->sum('quantity') }} sản phẩm</em></p></td>
                <td>{{$order->price}} zł</td>
                <td
                  @if ($order->status == 0)
                    style="color:red;"
                  @else
                   style="color:green;"
                  @endif
                >{{$order->status == 0 ? 'CHƯA LÀM' : 'ĐÃ LÀM'}}</td>
                <td>
                  <form action="{{ route('prepare') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $order->id }}" name="order_id">
                    <button class="btn btn-primary"><i class="fas fa-print fa-2x"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection