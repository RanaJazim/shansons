@extends('panel.dashboard.header')

@php
    $header = "Employee";
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
        <form id="myForm" method="POST" action="">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Employee Name:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    value="{{ $employee->name }}"
                >
            </div>

            <div class="form-group">
                <label for="salary">Employee Salary:</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="salary" 
                    name="salary" 
                    value="{{ $employee->salary }}"
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

