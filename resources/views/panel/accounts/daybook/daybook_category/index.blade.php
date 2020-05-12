@extends('panel.dashboard.main')

@php
    $header = "Daybook Category";
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
        <a href="{{ route('daybookCategory.create') }}" class="btn btn-primary">
            Create {{ $header }}
        </a>
        @endbtn

        @mytable
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($daybookCategories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>

                            <!-- edit and delete buttons here -->
                            <td>
                                <a href="{{ route('daybookCategory.edit', ['daybookCategory' => $category->id]) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="#"
                                   data-toggle="modal" data-target="#{{ $category->id }}"
                                   class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <!-- adding the modal -->
                                @modal(['obj'=> $category])
                                    @slot('modalTitle')
                                        Delete {{ $header }}
                                    @endslot
                                    @slot('modalHeader')
                                        Are you sure you want to delete this ??
                                    @endslot

                                    <form method="POST"
                                          action="{{ route('daybookCategory.destroy', ['daybookCategory' => $category->id]) }}">

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







