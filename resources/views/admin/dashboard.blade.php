<x-admin>
    <div class="container">
        <div class="row">
            <div class="col-md">
                @livewire('admin.checked-in-users')
                @livewire('admin.approval-queue')
                @livewire('admin.search-users')
                @livewire('admin.list-admins')
            </div>

            <div class="col-md">
                @livewire('admin.user.my-candidates')
                @livewire('admin.rooms')
                @livewire('admin.booking.create-manual-booking')
            </div>
        </div>
    </div>
</x-admin>
