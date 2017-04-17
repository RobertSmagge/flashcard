@if(Session::has('alert-success') || Session::has('alert-info') || Session::has('alert-warning') || Session::has('alert-danger'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(Session::has('alert-success'))
                    <p class="alert alert-success">
                        <i class="fa fa-check"></i>
                        {{ Session::get('alert-success') }}
                    </p>
                @endif

                @if(Session::has('alert-info'))
                    <p class="alert alert-info">
                        <i class="fa fa-info-circle"></i>
                        {{ Session::get('alert-info') }}
                    </p>
                @endif

                @if(Session::has('alert-warning'))
                    <p class="alert alert-warning">
                        <i class="fa fa-flag"></i>
                        {{ Session::get('alert-warning') }}
                    </p>
                @endif

                @if(Session::has('alert-danger'))
                    <p class="alert alert-danger">
                        <i class="fa fa-exclamation-circle"></i>
                        {{ Session::get('alert-danger') }}
                    </p>
                @endif

            </div>
        </div>
    </div>
@endif
