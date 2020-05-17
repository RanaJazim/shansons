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

        <form 
            action="{{ route('daybook.index') }}"
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

    <div id="create_daybook">

        <div class="alert alert-info">
            <p>
                Today Remaining Balance: {{ $remaining_balance }}
            </p>
        </div>

        @myform
        <form 
            id="myForm" 
            method="POST" 
            action="{{ route('daybook.store') }}"
        >

            @csrf

            <div class="form-group">
                <label for="daybookCategory_id">Select Daybook Category:</label>
                <select 
                    class="form-control" 
                    id="daybookCategory_id" 
                    name="daybookCategory_id"
                >
                  @foreach ($daybook_categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                  @endforeach
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
                    v-model="price"
                >
            </div>

            <div class="form-group ">

                <input 
                    type="submit" 
                    class="btn btn-success" 
                    value="Submit"
                    :disabled="price > {{ $remaining_balance }}"
                >
                @btnclear(['title'=>'Clear Fields'])
                @endbtnclear
            </div>

        </form>
        @endmyform


    </div>

    @include('/error')

@endsection

@push('scripting')
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
    var app = new Vue({
        el: "#create_daybook",
        data: {
            price: null
        }
    });
</script>
@endpush