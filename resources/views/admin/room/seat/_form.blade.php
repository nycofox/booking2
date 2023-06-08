<div class="mb-3">
    <label for="name">Navn:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $seat->name }}" required>
    @error('name')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="mb-3">
    <label for="description">Beskrivelse:</label>
    <textarea name="description" id="description" cols="30" rows="4"
              class="form-control">{{ old('description') ?? $seat->description }}</textarea>
    @error('description')
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="mb-1">
    <input type="checkbox" name="active" id="active" value="1" @if($seat->active) checked @endif> Aktiv
</div>
<div class="mb-3">
    <input type="checkbox" name="requires_approval" id="requires_approval" value="1"
           @if($seat->requires_approval) checked @endif> Må godkjennes
    <small>Dersom plassen må godkjennes, må en reservasjon godkjennes av administrator.</small>
</div>
