<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md">
                @livewire('student.upcoming-reservations')
            </div>
            <div class="col-md">
                @livewire('student.news')
                @livewire('room.list-rooms-widget')
            </div>
        </div>
    </div>
</x-app>
