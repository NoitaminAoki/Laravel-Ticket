<div class="row">
    {!! csrf_field() !!}
    <div class="col-12 mt-2 mb-2">
        <input type="hidden" name="id_route" value="{{ $route->id_route }}">
        <label>Initial Route</label>
        <select class="form-control select2-edit" name="initial" required>
            <option disabled>Choose Initial Route</option>
            @foreach($region as $key)
            <option value="{{ $key->id_region }}" {!! ($key->id_region == $route->initial_route)? "selected":"" !!}>{{ $key->name_region }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 mt-2 mb-2">
        <label>Final Route</label>
        <select class="form-control select2-edit" name="final" required>
            <option disabled>Choose Final Route</option>
            @foreach($region as $key)
            <option value="{{ $key->id_region }}" {!! ($key->id_region == $route->final_route)? "selected":"" !!}>{{ $key->name_region }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 mb-2">
        <label>Price Route</label>
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Rp.</div>
            </div>
            <input type="text" class="form-control" name="price" value="{{ $route->price_route }}" required>
        </div>
    </div>
    <div class="col-12 mb-2">
        <label>Information</label>
        <textarea type="text" class="form-control" name="information" required>{{ $route->information_route }}</textarea>
    </div>
</div>