<!-- Modal for Deleting -->
<div class="modal fade" id="{{ $obj->id ?? $simpleId }}" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ $modalTitle }}</h4>
            </div>
            <div class="modal-body">
                <p>{{ $modalHeader }}</p>
            </div>
            <div class="modal-footer">

                {{ $slot }}


            </div> <!-- /modal-footer -->
        </div> <!-- / modal-content -->

    </div> <!-- / modal-dialog -->
</div> <!-- / modal -->
