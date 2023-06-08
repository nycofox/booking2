@csrf
<div class="mb-3">
    <label for="name" class="form-label">Navn:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $room->name }}">
    @error('name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Beskrivelse:</label>
    <textarea name="description" id="description" class="form-control">{{ old('description') ?? $room->description }}</textarea>
    @error('description')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="seat_map_url" class="form-label">URL til kart over rommet:</label>
    <input type="url" name="seat_map_url" id="seat_map_url" class="form-control"
           value="{{ old('seat_map_url') ?? $room->seat_map_url }}">
    @error('seat_map_url')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3 d-flex">
    <div class="w-25">
        <label for="bookable_from" class="form-label">Tilgjengelig fra <small>(halvtimer)</small>:</label>
        <input type="time" name="bookable_from" id="bookable_from" class="form-control"
               value="{{ old('bookable_from') ?? $room->bookable_from }}">
        @error('bookable_from')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="w-25 mx-3">
        <label for="bookable_to" class="form-label">Tilgjengelig til:</label>
        <input type="time" name="bookable_to" id="bookable_to" class="form-control"
               value="{{ old('bookable_to') ?? $room->bookable_to }}">
        @error('bookable_to')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
