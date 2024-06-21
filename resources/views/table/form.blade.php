<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="capacity" class="form-label">{{ __('Capacity') }}</label>
            <input type="text" name="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $table?->capacity) }}" id="capacity" placeholder="Capacity">
            {!! $errors->first('capacity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>