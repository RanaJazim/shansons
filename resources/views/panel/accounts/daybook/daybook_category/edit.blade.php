@extends('panel.dashboard.header')

@php
    $header = "Daybook Category";
@endphp

@section('title')
    Update {{ $header }}
@endsection

@section('content')

    <h1 class="page-header">
        Dashboard
        <small>{{ $header }}</small>
    </h1>


    <div style="margin-top: 20px;"></div>

    <div>

        @myform
        <form id="myForm" method="POST" action="{{ route('daybookCategory.update', ['daybookCategory' => $category->id]) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Daybook Category Name:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    value="{{ $category->name }}"
                >
            </div>

            <div class="form-group ">
                <input type="submit" class="btn btn-success" value="Submit">
            </div>

        </form>
        @endmyform

    </div>

    @include('/error')

@endsection

