@section('footer-extras')
    <div class="modal fade" id="modal-form" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                {{ Form::open(['method'=>'POST','url' => URL::to('/').'/movies/store']) }}

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Please Complete</h4>
                  </div>
                  <div class="modal-body">
                      {{ Form::hidden('movies_id', null,['id'=>'moviesId']) }}
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
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
                {{ Form::close() }}

                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
@endsection


@push('footer-scripts')
    <script>
    function setMovies(id){
        $('#moviesId').val(id)
    }

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
