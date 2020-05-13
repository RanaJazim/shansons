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
        <a 
            href="#"
            data-toggle="modal" 
            data-target="#passing-an-id"
            class="btn btn-primary"
        >
            Display {{ $header }}
        </a>
    </div>
    
    <!-- adding the modal -->
    @modal(['simpleId'=>"passing-an-id"])
    @slot('modalTitle')
        Display {{ $header }} for specific date
    @endslot
    @slot('modalHeader')
        <p class="alert alert-info">
            By default, current date is selected!
        </p>

        <form 
            action="{{ route('openingBalance.index') }}"
            method="GET"
        >
            <div class="form-group">
                <label for="date">Change Date if you want to see daybook for differnt day:</label>
                <input 
                    type="date"
                    id="date"
                    name="date"
                    class="form-control"
                    value="{{ date('Y-m-d') }}"
                >
            </div>
            <input 
                type="submit" 
                class="btn btn-success"
            >
        </form>
    @endslot

        <button 
            type="button" 
            class="btn btn-danger"
            data-dismiss="modal"
            >
            Close
        </button>
    @endmodal
    <!--  end adding the modal  -->

    <div style="margin-top: 20px;"></div>

    <div>

        @myform
        <form 
            id="myForm" 
            method="POST" 
            action="{{ route('openingBalance.store') }}"
        >

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

