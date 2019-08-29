@extends('layouts.app')
@section('content')
<h1>{{ __('menu.order') }} {{ __('menu.number') }}: {{ $order->id }} - {{ __('menu.client') }}: {{ $order->customer->name }}</h1>
<hr>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-6 col-sm-6">
        <div class="text-center">
                <table class="table table-striped table-hover table-bordered" style="table-layout:fixed;">
                    <thead>
                        <tr>
                            <th width="10%"><strong>ID</strong></th>
                            <th width="40%"><strong>{{ strtoupper(__('general.quantity')) }}:</strong></th>
                            <th width="50%"><strong>{{ strtoupper(__('general.note')) }}:</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $key => $product)
                            <tr id="{{ $product->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td class="col-lg-4 quantity"><input type="text" name="quantity" class="form-control text-center" value="{{ $product->quantity }}" autocomplete="off"></td>
                                <td class="col-lg-6 note"><input type="text" name="name" class="form-control text-center" placeholder="*{{ __('general.optional') }}*"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        <br>
        <button id="btn" class="btn btn-primary btn-block">{{ __('general.save') }}</button>
    </div>
</div>
<script>
    
</script>
@endsection
