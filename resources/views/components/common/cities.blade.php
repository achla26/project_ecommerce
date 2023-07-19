<label class="form-label">City</label>
<select name="city_id" id="city_id" class="form-select">
    <option value="">-Select-</option>
    @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
    @endforeach
</select>
