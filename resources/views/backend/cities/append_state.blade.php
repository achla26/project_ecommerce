<div class="form-group mb-3">

	<label>State</label>
	<select name="state_id" id="state_id" class="form-control" >
	  	@if(!empty($getStates))
			@foreach($getStates as $state)
				<option value="{{ $state->id }}" 
					{{(isset($state->id) && $state->id == $state->id) ? 'selected' : ''}}>{{ $state->name }}</option>
			@endforeach
	  	@endif
	</select>
</div>