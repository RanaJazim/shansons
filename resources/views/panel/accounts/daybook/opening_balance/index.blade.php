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
        <a href="" class="btn btn-primary">
            Create {{ $header }}
        </a>
        @endbtn

        <div class="alert alert-info" style="margin-top: 10px">
            <p>Today Total {{ $header }}: 10,0000</p>
        </div>


        @mytable
            <div>
                <p style="font-weight: bold; font-size: 17px">
                    List of Today {{ $header }} which were added
                </p>
                
                <table class="table table-bordered">
                    <tr>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    {{-- @foreach($gates as $gate) --}}
                        <tr>
                            <td>First Category</td>
                            <td>Some Description</td>
                            <td>200</td>

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
                    {{-- @endforeach --}}
                </table>
            </div>
        @endmytable


    </div>

@endsection







