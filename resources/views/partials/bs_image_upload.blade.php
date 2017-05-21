<?php
if (preg_match('/^(.+?)\[(.+?)\]$/i', $name)) {
    $flat_name = preg_replace('/^(.+?)\[(.+?)\]$/i', '$1.$2', $name);
} else {
    $flat_name = $name;
}
?>
<div class="fileinput fileinput-{{ @$exists? 'exists':'new' }} text-center {{ $errors->has(@$flat_name)? 'has-error':'' }}" data-provides="fileinput">
    <legend>{!! @$label !!}</legend>
    @if($errors->has(@$flat_name))
        <span class="help-block">{{ $errors->first(@$flat_name) }}</span>
    @endif
    <div class="fileinput-new thumbnail">
        <img src="{{ @$placeholder }}" alt="{{ @$label }}">
    </div>
    <div class="fileinput-preview fileinput-exists thumbnail">
        <a href="{{ @$oldImage }}" target="_blank">
            <img src="{{ @$oldImage }}" alt="{{ @$label }}">
        </a>
    </div>
    <div>
        <span class="btn btn-rose btn-round btn-file">
            <span class="fileinput-new">Select image</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="{{ @$name }}" id="{{ @$name }}" {!! @$extras !!} />
        </span>
        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
    </div>
</div>