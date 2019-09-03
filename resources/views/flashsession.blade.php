@if(Session::has('status'))
    <div class="alert alert-success" style="margin-top:10px">
        <p><strong>{{session('status')}}</strong></p>
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger" style="margin-top:10px">
        <p><strong>{{session('error')}}</strong></p>
    </div>
@endif