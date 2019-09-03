@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Utwórz nowe zamówienie</h1>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
            <form action="{{ route('order.store') }}" method="POST">
                {{ csrf_field() }}
                <h3>Klient:</h3>
                <select name="customer_id" class="form-control" required>
                    <option selected disabled>Wybierz Klient</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                <h3>Dostawa Ilosc: </h3>
                <input type="number" name="total" class="form-control" placeholder="Số Lượng Hàng cho Đơn Hàng này (Số)" required autocomplete="off"> 
                <h3>Cena: </h3>
                <input type="number" step="0.01" name="price" class="form-control" placeholder="Tổng Giá Trị Đơn Hàng" required autocomplete="off">
                <br>
                <button class="btn btn-primary">Utwórz</button>
            </form>
        </div>
    </div>
</div>
@endsection