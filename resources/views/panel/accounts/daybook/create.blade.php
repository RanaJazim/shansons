@extends('panel.dashboard.header')

@php
    $header = "Daybook";
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
            Display Daybook
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

        <form action="">
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

        <div class="alert alert-info">
            <p>
                Today Remaining Balance: 5000
            </p>
        </div>

        @myform
        <form id="myForm" method="POST" action="">

            @csrf

            <div class="form-group">
                <label for="daybookCategory_id">Select Daybook Category:</label>
                <select 
                    class="form-control" 
                    id="daybookCategory_id" 
                    name="daybookCategory_id"
                >
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
              </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="description" 
                    name="description" 
                    value="{{old('description')}}"
                >
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="price" 
                    name="price" 
                    value="{{old('price')}}"
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

