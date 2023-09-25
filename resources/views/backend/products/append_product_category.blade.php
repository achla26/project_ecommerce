<div class="form-group mb-3">
	<select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
		<option value="">-Select-</option>
	  	@if(!empty($getCategories))
			@foreach($getCategories as $single_category)
				<option value="{{ $single_category->id }}" {{(isset($product->category_id)  && $product->category_id == $single_category->id) ? "selected" : ((old('category_id') == $single_category->id)  ? "selected" : "")}} >{{ $single_category->name }}</option>
				@if(!empty($single_category->sub_categories))
					@foreach($single_category->sub_categories as $subcategory)
						<option value="{{ $subcategory->id }}"
							{{(isset($product->category_id)  && $product->category_id == $subcategory->id) ? "selected" : ((old('category_id') == $subcategory->id)  ? "selected" : "")}}  
							>&nbsp;&raquo;&nbsp;{{ $subcategory->name }}</option>
					@endforeach	
				@endif
			@endforeach
	  	@endif
	</select>
</div>