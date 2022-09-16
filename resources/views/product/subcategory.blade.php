@if(!empty($subcategories))
    @foreach($subcategories as $subcategory)
        <option value="{{ $subcategory->subcategory_id }}">{{ $subcategory->subcategory_name }}</option>
    @endforeach
@endif
