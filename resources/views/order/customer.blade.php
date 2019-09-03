@extends('layouts.app')
@section('content')
    <h1>Utwórz adres klienta</h1>
    <hr>
    @include('errors')
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                <table class="table table-striped table-sm table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Klient</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($customers as $customer)
                            <tr>
                              <td>{{ $customer->id }}</td>
                              <td>{{ $customer->name }}</td>
    
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
            <form action="{{ route('customerstore') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>Nazwa:</h3>
                    <input type="text" class="form-control" name="name" autocomplete="off" autofocus required>
                </div>
                <button class="btn btn-primary">Utwórz</button>
            </form>
        </div>
    </div>
@endsection