@extends('layouts.app')
@section('content')
<h1>PITAYA.PL REPORT</h1>
<hr>
<div>
    <form action="" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-group">
                    <div class="row col-sm-12">
                        <label for="start" class="col-sm-6 col-md-6 col-lg-6">Begin:</label>
                        <input type="date" name="start" class="form-control col-sm-6 col-md-6 col-lg-6" required id="start">
                    </div>
                    <div class="row col-sm-12">
                        <label for="end" class="col-sm-6 col-md-6 col-lg-6">End:</label>
                        <input type="date" class="col-sm-6 col-md-6 col-lg-6 form-control" name="end" required id="end">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div style="display: flex">
                    <button id="today" class="btn btn-outline-primary form-control">Dzis</button>
                    <button id="yesterday" class="btn btn-outline-primary form-control">Wczoraj</button>
                    <button id="7days" class="btn btn-outline-primary form-control">7 Dni</button>
                    <button id="thismonth" class="btn btn-outline-primary form-control">Ten Miesiąc</button>
                    <button id="lastmonth" class="btn btn-outline-primary form-control">W Zeszłym Miesiącu</button>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-outline-primary form-control" id="gun">Continue</button>
            </div>
            @include('reportscript')
    </form>
</div>
<script>
        $(document).ready(function(){
            let setInputToday = () => {
                let date = new Date();
                $('#start').val(date.toISOString().slice(0,10));
                $('#end').val(date.toISOString().slice(0,10));
            };
            let setInputYesterday = () => {
                let date = new Date();
                date.setDate(date.getDate() -1);
                $('#start').val(date.toISOString().slice(0,10));
                $('#end').val(date.toISOString().slice(0,10));
            };
    
            let setInput2Days = () => {
                let date = new Date();
                let sevenday = new Date();
                sevenday.setDate(sevenday.getDate() -2);
                $('#start').val(sevenday.toISOString().slice(0,10));
                $('#end').val(date.toISOString().slice(0,10));
            };
            let setInput3Days = () => {
                let date = new Date();
                let sevenday = new Date();
                sevenday.setDate(sevenday.getDate() -3);
                $('#start').val(sevenday.toISOString().slice(0,10));
                $('#end').val(date.toISOString().slice(0,10));
            };
            let setInput4Days = () => {
                let date = new Date();
                let sevenday = new Date();
                sevenday.setDate(sevenday.getDate() -4);
                $('#start').val(sevenday.toISOString().slice(0,10));
                $('#end').val(date.toISOString().slice(0,10));
            };
            let setInput7Days = () => {
                let date = new Date();
                let sevenday = new Date();
                sevenday.setDate(sevenday.getDate() -7);
                $('#start').val(sevenday.toISOString().slice(0,10));
                $('#end').val(date.toISOString().slice(0,10));
            };
            let setInputThisMonth = () => {
                let date = new Date();
                let firstday = new Date();
                firstday.setDate(1);
                $('#start').val(firstday.toISOString().slice(0,10));
                $('#end').val(date.toISOString().slice(0,10));
            };
            let setInputLastMonth = () => {
                let first = new Date();
                let last = new Date();
                first.setDate(1);
                first.setMonth(first.getMonth()-1);
                last.setDate(1);
                last.setDate(last.getDate()-1);
                $('#start').val(first.toISOString().slice(0,10));
                $('#end').val(last.toISOString().slice(0,10));
            };
            let clickBtn = () => {
                $('#gun').click();
                }
            $('#today').click(function (e) {
                    e.preventDefault();
                    setInputToday();
                    //clickBtn();
                }
            );
            $('#yesterday').click(function (e) {
                    e.preventDefault();
                    setInputYesterday();
                    //clickBtn();
                }
            )
            $('#7days').click(function (e) {
                    e.preventDefault();
                    setInput7Days();
                    //clickBtn();
                }
            )
            $('#2days').click(function (e) {
                    e.preventDefault();
                    setInput2Days();
                    //clickBtn();
                }
            )
            $('#3days').click(function (e) {
                    e.preventDefault();
                    setInput3Days();
                    //clickBtn();
                }
            )
            $('#4days').click(function (e) {
                    e.preventDefault();
                    setInput4Days();
                    //clickBtn();
                }
            )
            $('#thismonth').click(function (e) {
                    e.preventDefault();
                    setInputThisMonth();
                    //clickBtn();
                }
            )
            $('#lastmonth').click(function (e) {
                    e.preventDefault();
                    setInputLastMonth();
                    //clickBtn();
                }
            )
        });
    
    </script>

@endsection
