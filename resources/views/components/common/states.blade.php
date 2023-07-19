<label class="form-label">State</label>
<select name="state_id" id="state_id" class="form-select" onchange="getCities()">
    <option value="">-Select-</option>
    @foreach ($states as $state)
        <option value="{{ $state->id }}">{{ $state->name }}</option>
    @endforeach
</select>
