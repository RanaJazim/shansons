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

    
    <div style="margin-top: 20px;"></div>

    <div id="update_daybook">

        <div class="alert alert-info">
            <p>
                Today Remaining Balance: {{ $remaining_balance }}
            </p>
        </div>

        @myform
        <form 
            id="myForm" 
            method="POST" 
            action="{{ route('daybook.update', ['daybook' => $existing_daybook->id]) }}"
        >

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="daybookCategory_id">Select Daybook Category:</label>
                <select 
                    class="form-control" 
                    id="daybookCategory_id" 
                    name="daybookCategory_id"
                >
                  @foreach ($daybook_categories as $category)
                        <option 
                            value="{{ $category->id }}"
                            @if($existing_daybook->daybookCategory->id == $category->id)
                                selected
                            @endif
                        >
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
                    value="{{ $existing_daybook->description}}"
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
                    v-init:price="{{ $existing_daybook->price }}"
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
    Vue.directive('init', {
        bind: function(el, binding, vnode) {
            vnode.context[binding.arg] = binding.value;
        }
    });

    var app = new Vue({
        el: "#update_daybook",
        data: {
            price: null
        }
    });
</script>
@endpush