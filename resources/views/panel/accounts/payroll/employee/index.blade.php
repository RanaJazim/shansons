@extends('panel.dashboard.main')

@php
    $header = "Employee";
@endphp

@section('title')
    All {{ $header }} List
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > {{ $header }} > Display All {{ $header }} </p>
        @endalert

        @btn
        <a href="{{ route('employee.create') }}" class="btn btn-primary">
            Create {{ $header }}
        </a>
        @endbtn

        @mytable
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Employee Name</th>
                        <th>Employee Salary</th>
                        <th>Action</th>
                    </tr>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->salary }}</td>

                            <!-- edit and delete buttons here -->
                            <td>
                                <a href="{{ route('employee.edit', ['daybookCategory' => $employee->id]) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="#"
                                   data-toggle="modal" data-target="#{{ $employee->id }}"
                                   class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <!-- adding the modal -->
                                @modal(['obj'=> $employee])
                                    @slot('modalTitle')
                                        Delete {{ $header }}
                                    @endslot
                                    @slot('modalHeader')
                                        Are you sure you want to delete this ??
                                    @endslot

                                    <form method="POST"
                                          action="{{ route('employee.destroy', ['employee' => $employee->id]) }}">

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







