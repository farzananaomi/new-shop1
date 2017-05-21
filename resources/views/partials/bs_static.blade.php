<div class="form-group form-static {{ isset($wrapperClass)? $wrapperClass:'' }}">
    <label class="{{ isset($labelSize)? $labelSize:'col-sm-3' }} control-label">{{ @$label }}</label>
    <div class="{{ isset($valueSize)? $valueSize:'col-sm-8' }}">
        <p class="form-control-static">{!! @$value !!}</p>
    </div>
</div>
