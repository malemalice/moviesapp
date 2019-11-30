<div class="box-body padding">
    <!-- Search -->
    <div class="box-tools">
        <form id="form-advanced-search" class="form" role="form" method="GET" action="{{ $_listLink }}">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group margin-b-5 margin-t-5">
                        <label for="search">Name</label>
                        <input type="text" name="search" class="form-control" value="{{ $search }}" placeholder="Name">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col-md-3 -->
            </div>

            <hr class="margin-b-5 margin-t-5">

            <div class="row">
                <div class="col-md-3 col-lg-2">
                    <div class="form-group margin-b-5 margin-t-5">
                        <label for="per_page">Show</label>
                        <select name="per_page" class="form-control select2" data-placeholder="Show" data-allow-clear="true" style="width: 100%;">
                            <option value="" @if ($perPage == '') selected @endif></option>
                            <option value="15" @if ($perPage == 15) selected @endif>15</option>
                            <option value="25" @if ($perPage == 25) selected @endif>25</option>
                            <option value="50" @if ($perPage == 50) selected @endif>50</option>
                            <option value="100" @if ($perPage == 100) selected @endif>100</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col-md-2 -->

                <div class="col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 text-center">
                    <div class="form-group margin-b-5 margin-t-5" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-primary margin-r-5 margin-l-5"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ $_listLink }}" class="btn btn-warning margin-r-5 margin-l-5"><i class="fa fa-eraser"></i> Reset</a>
                    </div>
                </div>
                <!-- /.col-md-4 -->
            </div>

            <hr class="margin-b-5 margin-t-5">
        </form>
    </div>
    <!-- END Search -->
</div>
