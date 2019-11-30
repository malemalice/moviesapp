<!-- /.col-md-12 -->
<div class="col-md-12">
    <div class="form-group margin-b-5 margin-t-5{{ $errors->has('movies_id') ? ' has-error' : '' }}">
        <label for="movies_id">Movies *</label>
        {{
            Form::select('movies_id', $resourceData['optMovies'],old('movies_id', $record->movies_id),['placeholder'=>'Please Select','class'=>'form-control select2'])

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
            Form::select('member_id', $resourceData['optMembers'],old('member_id', $record->member_id),['placeholder'=>'Please Select','class'=>'form-control select2'])

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
            <input
            id="date-start"
            autocomplete="off"
            type="text"
            class="form-control"
            name="date_lending"
            placeholder="Release Date"
            value="{{ old('date_lending', $record->date_lending) }}"
            required>

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
            <input
            id="date-end"
            autocomplete="off"
            type="text"
            class="form-control"
            name="date_returned"
            placeholder="Returned Date"
            value="{{ old('date_returned', $record->date_returned) }}"
            required>
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


@push('footer-scripts')
    <script>
    $(function () {
        var config = {
            //locale: 'es', locale: 'en',
            format: 'YYYY-MM-DD',
            showTodayButton: true,
            showClear: true,
            icons: {
                today: "fa fa-thumb-tack",
                clear: "fa fa-trash"
            }
        };
        var config_end = {};
        $.extend(config_end, config, {
            useCurrent: false //Important! See issue #1075
        });
        $('#date-start').datetimepicker(config);
        $('#date-end').datetimepicker(config_end);
        $("#date-start").on("dp.change", function (e) {
            $('#date-end').data("DateTimePicker").minDate(e.date);
        });
        $("#date-end").on("dp.change", function (e) {
            $('#date-start').data("DateTimePicker").maxDate(e.date);
        });
    });
    </script>
@endpush
