<!-- /.col-md-12 -->
<div class="col-md-12">
    <div class="form-group margin-b-5 margin-t-5{{ $errors->has('movies_id') ? ' has-error' : '' }}">
        <label for="movies_id">Movies *</label>
        {{
            Form::select('movies_id', $resourceData['optGenre'],old('movies_id', $record->movies_id),['placeholder'=>'Please Select','class'=>'form-control'])

        }}
        @if ($errors->has('movies_id'))
        <span class="help-block">
            <strong>{{ $errors->first('movies_id') }}</strong>
        </span>
        @endif
    </div>
    <!-- /.form-group -->
</div>

<div class="col-md-12">
    <div class="form-group margin-b-5 margin-t-5{{ $errors->has('member_id') ? ' has-error' : '' }}">
        <label for="member_id">Member *</label>
        {{
            Form::select('member_id', $resourceData['optGenre'],old('member_id', $record->member_id),['placeholder'=>'Please Select','class'=>'form-control'])

        }}
        @if ($errors->has('member_id'))
        <span class="help-block">
            <strong>{{ $errors->first('member_id') }}</strong>
        </span>
        @endif
    </div>
    <!-- /.form-group -->
</div>

<div class="col-md-12">
    <div class="form-group margin-b-5 margin-t-5{{ $errors->has('date_lending') ? ' has-error' : '' }}">
        <label for="date_lending">Lending Date *</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control datepicker" name="date_lending" placeholder="Release Date" value="{{ old('date_lending', $record->date_lending) }}" required data-date-format="yyyy-mm-dd">

        </div>

        @if ($errors->has('date_lending'))
        <span class="help-block">
            <strong>{{ $errors->first('date_lending') }}</strong>
        </span>
        @endif
    </div>
    <!-- /.form-group -->
</div>
<!-- /.col-md-12 -->

<div class="col-md-12">
    <div class="form-group margin-b-5 margin-t-5{{ $errors->has('date_returned') ? ' has-error' : '' }}">
        <label for="date_returned">Returned Date *</label>
        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control datepicker" name="date_returned" placeholder="Release Date" value="{{ old('date_returned', $record->date_returned) }}" required data-date-format="yyyy-mm-dd">

        </div>

        @if ($errors->has('date_returned'))
        <span class="help-block">
            <strong>{{ $errors->first('date_returned') }}</strong>
        </span>
        @endif
    </div>
    <!-- /.form-group -->
</div>
<!-- /.col-md-12 -->

<script type="text/javascript">
    (function($) {
        $('.datepicker').datepicker({
            format:'yyyy-mm-dd'
        })
    })(jQuery);
</script>
