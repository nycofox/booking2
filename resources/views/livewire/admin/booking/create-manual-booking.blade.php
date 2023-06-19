<x-card title="Opprett en manuell reservasjon">
    <p>Her kan du som administrator manuelt opprette en reservasjon for en registrert bruker. Regler for 7 dager eller
        manuell godkjenning av plass vil bli overstyrt.</p>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="mb-2">
            <label for="user_id">Bruker</label>
            <select class="form-select" wire:model="user_id">
                <option>Velg bruker</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <label for="seat_id">Plass</label>
            <select class="form-select" wire:model="seat_id">
                <option>Velg sete</option>
                @foreach($seats as $seat)
                    <option value="{{ $seat->id }}">{{ $seat->name }}</option>
                @endforeach
            </select>
            @error('seat_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <label for="booked_from">Fra</label>
            <input type="datetime-local" class="form-control" wire:model="booked_from" id="booked_from">
            @error('booked_from') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <label for="booked_to">Til</label>
            <input type="datetime-local" class="form-control" wire:model="booked_to" id="booked_to">
            @error('booked_to') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Opprett reservasjon</button>
    </form>

    <script>

    </script>
</x-card>

