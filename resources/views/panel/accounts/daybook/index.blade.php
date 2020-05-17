@extends('panel.dashboard.main')

@php
    $header = "Daybook";
@endphp

@section('title')
    Today {{ $header }} List
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > {{ $header }} > Display {{ $header }} List</p>
        @endalert

        @btn
        <a 
            href="{{ route('daybook.create') }}" 
            class="btn btn-primary"
        >
            Create {{ $header }}
        </a>
        @endbtn

        <ul class="alert alert-info" style="margin-top: 20px">
            <div style="margin-left: 20px">
                <li>
                    <span style="font-weight: bold">
                        Today Opening Balance
                    </span>: {{ $today_balance['today_opening_balance'] }}
                </li>
                <li>
                    @php
                        $remaining_balance = $today_balance['today_opening_balance'] - $today_balance['today_daybook_balance'];
                    @endphp

                    <span style="font-weight: bold">
                        Today Remaining Balance
                    </span>:  {{ $remaining_balance }}
                </li>
            </div>
        </ul>

        @mytable
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    @foreach($today_daybook_list as $daybook)
                        <tr>
                            <td>{{ $daybook->daybookCategory->name }}</td>
                            <td>{{ $daybook->description }}</td>
                            <td>{{ $daybook->price }}</td>

                            <!-- edit and delete buttons here -->
                            <td>
                                <a href=""
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="#"
                                   data-toggle="modal" data-target="#passing-an-id"
                                   class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <!-- adding the modal -->
                                @modal(['simpleId'=>"passing-an-id"])
                                    @slot('modalTitle')
                                        Delete {{ $header }}
                                    @endslot
                                    @slot('modalHeader')
                                        Are you sure you want to delete this ??
                                    @endslot

                                    <form method="POST"
                                          action="">

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







