<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="state" class="form-label">{{ __('State') }}</label>
            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state', $order?->state) }}" id="state" placeholder="State">
            {!! $errors->first('state', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $order?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        @foreach ($dishes as $dish)
            <input type="checkbox" name="dishes[]{{$dish->id}}" id="dish{{$dish->id}}" value="{{$dish->id}}">
            <label for="dish{{$dish->id}}">{{$dish->name}}</label>
        @endforeach

            <div class="form-floating">
                <select name="table" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                  @foreach ($tables as $table)
                    <option value={{$table->id}}>{{$table->capacity}} personas</option>
                  @endforeach
                </select>
                <label for="floatingSelect">Mesa</label>
            </div>



    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
