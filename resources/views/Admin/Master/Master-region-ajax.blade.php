<div class="row">
    {!! csrf_field() !!}
    <div class="col-12 mb-2">
        <label>Name Region</label>
        <input type="hidden" class="form-control" name="id_region" value="{{ $region->id_region }}" required>
        <input type="text" class="form-control" value="{{ empty(old('name'))? $region->name_region : old('name') }}" name="name" required>
    </div>
    <div class="col-12 mb-2">
        <label>Information</label>
        <textarea type="text" class="form-control" name="desc" required>{{ empty(old('desc'))? $region->information_region : old('desc') }}</textarea>
    </div>
</div>