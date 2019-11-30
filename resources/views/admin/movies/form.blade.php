<div class="col-md-12">
    <div class="form-group margin-b-5 margin-t-5{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name *</label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $record->name) }}" required>

        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
    <!-- /.form-group -->
</div>
<!-- /.col-md-12 -->
<div class="col-md-12">
    <div class="form-group margin-b-5 margin-t-5{{ $errors->has('genre_id') ? ' has-error' : '' }}">
        <label for="genre_id">Genre *</label>
        {{-- <input type="text" class="form-control" name="genre_id" placeholder="URL" value="{{ old('genre_id', $record->genre_id) }}" required> --}}
        {{
            Form::select('genre_id', $resourceData['optGenre'],old('genre_id', $record->genre_id),['placeholder'=>'Please Select','class'=>'form-control'])

        }}
        @if ($errors->has('genre_id'))
        <span class="help-block">
            <strong>{{ $errors->first('genre_id') }}</strong>
        </span>
        @endif
    </div>
    <!-- /.form-group -->
</div>

<div class="col-md-12">
    <div class="form-group margin-b-5 margin-t-5{{ $errors->has('date_released') ? ' has-error' : '' }}">
        <label for="date_released">Date Released *</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control datepicker" name="date_released" placeholder="Release Date" value="{{ old('date_released', $record->date_released) }}" required data-date-format="yyyy-mm-dd">

        </div>

        @if ($errors->has('date_released'))
        <span class="help-block">
            <strong>{{ $errors->first('date_released') }}</strong>
        </span>
        @endif
    </div>
    <!-- /.form-group -->
</div>
<!-- /.col-md-12 -->

<script type="text/javascript">
    (function($) {
        $('.datepicker').datepicker({
            endDate:new Date(new Date().setDate(new Date().getDate() + 5)),
            format:'yyyy-mm-dd'
        })
    })(jQuery);
</script>
