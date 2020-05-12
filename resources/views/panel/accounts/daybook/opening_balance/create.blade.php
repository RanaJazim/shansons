@extends('panel.dashboard.header')

@php
    $header = "Opening Balance";
@endphp

@section('title')
    Create {{ $header }}
@endsection

@section('content')

    <h1 class="page-header">
        Dashboard
        <small>{{ $header }}</small>
    </h1>

    <div>
        <a href="" class="btn btn-primary">Dsiaplay All Today {{ $header }}</a>
    </div>

    <div style="margin-top: 20px;"></div>

    <div>

        @myform
        <form id="myForm" method="POST" action="">

            @csrf

            <div class="form-group">
                <label for="amount">Today Opening Balance Amount:</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="amount" 
                    name="amount" 
                    value="{{old('amount')}}"
                >
            </div>

            <div class="form-group">
                <label for="description">Description for entering opening balance:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="description" 
                    name="description" 
                    value="{{old('description')}}"
                >
            </div>

            <div class="form-group ">

                <input type="submit" class="btn btn-success" value="Submit">
                @btnclear(['title'=>'Clear Fields'])
                @endbtnclear
            </div>

        </form>
        @endmyform

    </div>

    @include('/error')

@endsection

