<?php
    if (preg_match('/^(.+?)\[(.+?)\]$/i', $name)) {
        $flat_name = preg_replace('/^(.+?)\[(.+?)\]$/i', '$1.$2', $name);
    } else {
        $flat_name = $name;
    }
?>

<div class="form-group {{ $errors->has(@$flat_name)? 'has-error':'' }}">
    <label for="{{ @$name }}" class="{{ @$horizontal? @$labelSize? $labelSize:'col-sm-3':'' }} control-label">{{ @$label }}</label>

    @if (@$horizontal)
        <div class="{{ @$valueSize? $valueSize:'col-sm-8' }}">
    @endif
    <input type="text" class="form-control datepicker"  name="{{ @$name }}" id="{{ @$name }}" data-provide="datepicker2"
           placeholder="{{ @$placeholder }}"
           value="{{ isset($useOld)? old($flat_name, $useOld):'' }}" {!! @$extras !!}>
    @if($errors->has(@$flat_name))
        <p class="help-block">{{ $errors->first(@$flat_name) }}</p>
    @endif
    @if (@$horizontal)
    </div>
    @endif
</div>
