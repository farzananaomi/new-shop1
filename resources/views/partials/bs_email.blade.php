<?php
    if (preg_match('/^(.+?)\[(.+?)\]$/i', $name)) {
        $flat_name = preg_replace('/^(.+?)\[(.+?)\]$/i', '$1.$2', $name);
    } else {
        $flat_name = $name;
    }
?>
<div class="form-group label-floating {{ $errors->has(@$flat_name)? 'has-error':'' }}">
    <label for="{{ @$name }}" class="{{ @$horizontal? @$labelSize? $labelSize:'col-sm-3':'' }} control-label">{{ @$label }}</label>

    @if (@$horizontal)
        <div class="{{ @$labelSize? $labelSize:'col-sm-8' }}">
    @endif
    <input type="email" class="form-control" name="{{ @$name }}" id="{{ @$name }}" placeholder="{{ @$placeholder }}" value="{{ isset($useOld)? old($flat_name, $useOld):'' }}">
    @if($errors->has(@$flat_name))
        <p class="help-block">{{ $errors->first(@$flat_name) }}</p>
    @endif
    @if (@$horizontal)
        </div>
    @endif
</div>
