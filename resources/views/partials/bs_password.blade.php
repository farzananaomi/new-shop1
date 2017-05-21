<?php
$flat_name = '';
if(isset($name))
{
    if (preg_match('/^(.+?)\[(.+?)\]$/i', $name)) {
        $flat_name = preg_replace('/^(.+?)\[(.+?)\]$/i', '$1.$2', $name);
    } else {
        $flat_name = $name;
    }
}
?>
<div class="form-group  {{ $errors->has(@$name)? 'has-error':'' }}">
    <label for="{{ @$name }}" class="{{ @$horizontal? @$labelSize? $labelSize:'col-sm-3':'' }} control-label">{{ @$label }}</label>

    @if (@$horizontal)
        <div class="{{ @$valueSize? $valueSize:'col-sm-8' }}">
    @endif
    <input type="password" class="form-control" name="{{ @$name }}" id="{{ @$name }}" placeholder="{{ @$placeholder }}">
    @if($errors->has(@$flat_name))
        <p class="help-block">{{ $errors->first(@$flat_name) }}</p>
    @endif
    @if (@$horizontal)
        </div>
    @endif
</div>
