@extends('panel.dashboard.header')

@php
    $header = "Opening Balance";
@endphp

@section('title')
    Create {{ $header }}
@endsection

@section('content')

    @alert
    <p>Dashboard > {{ $header }} > Update {{ $header }} </p>
    @endalert
    

    <div style="margin-top: 20px;"></div>

    <div>

        @myform
        <form 
            id="myForm" 
            method="POST" 
            action="{{ route('openingBalance.update', ['openingBalance' => $openingBalance->id]) }}"
        >

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="amount">Today Opening Balance Amount:</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="amount" 
                    name="amount" 
                    value="{{ $openingBalance->amount }}"
                >
            </div>

            <div class="form-group">
                <label for="description">Description for entering opening balance:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="description" 
                    name="description" 
                    value="{{ $openingBalance->description }}"
                >
            </div>

            <div class="form-group ">

                <input type="submit" class="btn btn-success" value="Update">
            </div>

        </form>
        @endmyform

    </div>

    @include('/error')

@endsection

