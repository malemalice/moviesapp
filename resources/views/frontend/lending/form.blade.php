@section('footer-extras')
    <div class="modal fade" id="modal-form" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                {{ Form::open(['method'=>'POST','url' => URL::to('/').'/lending/store']) }}

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Please Confirm</h4>
                  </div>
                  <div class="modal-body">
                      {{ Form::hidden('id', null,['id'=>'id']) }}
                      Are you sure want to return movies ?
                      <!-- /.col-md-12 -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
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
        $('#id').val(id)
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
