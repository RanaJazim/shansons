@extends('panel.dashboard.header')

@php
    $header = "Daybook Category";
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
        <a href="{{ route('daybookCategory.index') }}" class="btn btn-primary">
            Dsiaplay All {{ $header }}
        </a>
    </div>

    <div style="margin-top: 20px;"></div>

    <div>

        @myform
        <form id="myForm" method="POST" action="{{ route('daybookCategory.store') }}">

            @csrf

            <div class="form-group">
                <label for="name">Daybook Category Name:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    value="{{old('name')}}"
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

