<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ url('/js/JsBarcode.all.min.js') }}"></script>
        <title>Print</title>
    </head>
    <body style="margin-top: 0;">
        <style type="text/css">
            button { font-size: 3rem; padding: 5px 15px; border: 1px solid black; border-radius: 5px }
            @media print {
                .hidden-print { display: none !important; }
            }
        </style>
        <div class="hidden-print">
            <button onclick="window.print();">{{ __('Print') }}</button>
            <form action="{{ route('pitaya.confirm') }}" method="POST" onsubmit="return confirm('Bạn đã hoàn thành đơn hàng này chưa???');" style="display: inline;">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $order->id }}" name="order_id">
                <button>Panel</button>
            </form>
        </div>
        <div style="float: left">
                @for ($i = 0; $i < $order->total; $i++)
                    <div style="page-break-after: right; width: 276px; text-align: center;">
                        <div style="font-size: 1.5rem; font-family: arial">
                            <div><strong><em>Zamowienie nr: {{ $order->name }}</em></strong></div>
                            <div><strong>{{ strtoupper($order->customer->name) }}</strong></div>
                            <div><strong>{{ $order->created_at->toDateString() }}</strong></div>
                            <div style="font-size: 3.5rem"><strong>{{ $i + 1 }}</strong></div>
                        </div>
                    </div> 
                @endfor      
        </div>
    </body>
</html>