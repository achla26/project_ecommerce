<div class="form-group mb-3">

	<label>Select Category Level</label>
	<select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
	  	<option value="0" {{(isset($category->parent_id) && $category->parent_id==0) ? 'selected': ''}}>Main Category</option>
	  	@if(!empty($getCategories))
			@foreach($getCategories as $single_category)
				<option value="{{ $single_category->id }}" 
					{{(isset($category->parent_id) && $category->parent_id == $single_category->id) ? 'selected' : ''}}>{{ $single_category->name }}</option>
				@if(!empty($single_category->sub_categories))
					@foreach($single_category->sub_categories as $subcategory)
						<option value="{{ $subcategory->id }}"
							{{(isset($category->parent_id) && $category->parent_id == $subcategory->id) ? 'selected' : ''}}
							>&nbsp;&raquo;&nbsp;{{ $subcategory->name }}</option>
					@endforeach	
				@endif
			@endforeach
	  	@endif
	</select>
</div>