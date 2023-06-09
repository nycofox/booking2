<button type="button" class="btn btn-danger btn-sm px-2 py-0" data-bs-toggle="modal"
        data-bs-target="#confirmBookingDelete">Avbestill
</button>

@pushonce('page-scripts')
    <div wire:ignore.self class="modal fade" id="confirmBookingDelete" tabindex="-1" role="dialog"
         aria-labelledby="confirmBookingDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmBookingDeleteLabel">Vennligst bekreft</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <p>Er du sikker på at du vil slette denne reservasjonen?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Avbryt</button>
                    <button type="button" wire:click.prevent="destroyBooking(23)" class="btn btn-danger close-modal"
                            data-bs-dismiss="modal">Ja, jeg er sikker
                    </button>
                </div>
            </div>
        </div>
    </div>
@endpushonce
