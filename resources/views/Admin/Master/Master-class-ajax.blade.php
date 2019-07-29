<div class="row">
    {!! csrf_field() !!}
    <div class="col-12 mb-2">
        <label>Class</label>
        <input type="hidden" class="form-control" name="id_class" value="{{ $class->id_class }}" required>
        <input type="text" class="form-control" value="{{ empty(old('name'))? $class->name_class : old('name') }}" name="name" required>
    </div>
    <div class="col-12 mb-2">
        <label>Price Ticket</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Rp.</div>
            </div>
            <input type="text" class="form-control" name="price" value="{{ empty(old('price'))? $class->price_ticket : old('price') }}" required>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>Type</label>
        <select class="form-control custom-select" name="type" required>
            <option {{ empty(old('type'))? "selected":"" }} disabled>Choose Type</option>
            <option value="airplane" {{ empty(old('type'))? ($class->type_class == "airplane")? 'selected' : '' : (old('type') == "airplane")? 'selected' : '' }}>Airplane</option>
            <option value="train" {{ empty(old('type'))? ($class->type_class == "train")? 'selected' : '' : (old('type') == "train")? 'selected' : '' }}>Train</option>
        </select>
    </div>
    <div class="col-12 mb-2">
        <label>Description</label>
        <textarea type="text" class="form-control" name="desc" required>{{ empty(old('desc'))? $class->desc_class : old('desc') }}</textarea>
    </div>
</div>