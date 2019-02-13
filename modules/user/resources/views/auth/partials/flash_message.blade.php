@if ($message = Session::get('alert-success'))
    <div class="alert alert-success alert-login">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('alert-info'))
    <div class="alert alert-success alert-login">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{ $message }}</p>
    </div>
@endif
