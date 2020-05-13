@extends('panel.dashboard.main')

@php
    $header = "Opening Balance";
@endphp

@section('title')
    All {{ $header }} List
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > {{ $header }} > Display All Today {{ $header }} </p>
        @endalert

        @btn
        <a href="{{ route('openingBalance.create') }}" class="btn btn-primary">
            Create {{ $header }}
        </a>
        @endbtn

        <div class="alert alert-info" style="margin-top: 20px">
            <p>You can edit or delete record only when record date is matched with today date.</p>
        </div>

        <div class="alert alert-info" style="margin-top: 10px">
            <p>Date: {{ $date }}</p>
            <p>Today Total {{ $header }}: {{ $todayOpeningBalance }}</p>
        </div>


        @mytable
            <div>
                <p style="font-weight: bold; font-size: 17px">
                    List of Today {{ $header }} which were added
                </p>
                
                <table class="table table-bordered">
                    <tr>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    @foreach($balanceList as $openingBalance)
                        <tr>
                            <td>{{ $openingBalance->description }}</td>
                            <td>{{ $openingBalance->amount }}</td>

                            <!-- edit and delete buttons here -->
                            <td>
                                @if ($date == date("Y-m-d"))
                                <a 
                                    href="{{ route('openingBalance.edit', ['openingBalance' => $openingBalance->id]) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="#"
                                    data-toggle="modal" 
                                    data-target="#{{ $openingBalance->id }}"
                                    class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                                @else
                                    <p style="color: red">No action</p>
                                @endif
                                

                                <!-- adding the modal -->
                                @modal(['obj'=> $openingBalance ])
                                    @slot('modalTitle')
                                        Delete {{ $header }}
                                    @endslot
                                    @slot('modalHeader')
                                        Are you sure you want to delete this ??
                                    @endslot

                                    <form 
                                        method="POST"
                                        action="{{ route('openingBalance.destroy', ['openingBalance' => $openingBalance->id]) }}"
                                    >

                                    @method('delete')
                                    @csrf

                                        <input type="submit" class="btn btn-success"
                                               value="Yes">
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                    </form>
                                @endmodal
                                <!-- adding the modal -->

                            </td>
                            <!-- edit and delete buttons here -->

                        </tr>
                    @endforeach
                </table>
            </div>
        @endmytable


    </div>

@endsection







