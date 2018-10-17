@if(session('success'))
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    </div>
</div>
@endif
@if(session('error'))
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    </div>
</div>
@endif