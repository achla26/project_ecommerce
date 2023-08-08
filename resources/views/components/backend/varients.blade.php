 <div class="col-md-3" id="">
     <label for="">Select {{ ucfirst($attribute->name) }}</label>
     <select class="form-control  select-multi " multiple="multiple" name="attribute_id[]" style="width: 100%;"
         onchange="makeCombinations()">
         @foreach ($varients as $varient)
             <option value="{{ $varient->id }}">{{ $varient->name }}</option>
         @endforeach
     </select>
 </div>
