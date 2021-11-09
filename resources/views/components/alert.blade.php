@php
    $message = null;
    $type = 'primary';
    if (Session::has('success')) {
        $type = 'success';
        $message = Session::get('success');
    } elseif (Session::has('warning')) {
        $type = 'warning';
        $message = Session::get('warning');
    } elseif (Session::has('info')) {
        $type = 'info';
        $message = Session::get('info');
    } elseif (Session::has('error')) {
        $type = 'danger';
        $message = Session::get('error');
    }   
@endphp
@if (!empty($message))
    <div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }} role="alert">
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif