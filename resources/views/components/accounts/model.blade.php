<!-- adding the modal -->
@modal(['simpleId'=>"passing-an-id"])
@slot('modalTitle')
    Display {{ $header }} for specific date
@endslot
@slot('modalHeader')
    <p class="alert alert-info">
        By default, current date is selected!
    </p>

    <form action="{{ $route }}">
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