@php    if (preg_match('/^(.+?)\[(.+?)?\]$/i', $name)) {
        $flat_name = preg_replace('/^(.+?)\[(.+?)?\]$/i', '$1.$2', $name);
    } else {
        $flat_name = $name;
    }
    $flat_name = trim($flat_name, '.');

    if (@$multiple && isset($useOld)) {
        $useOld = (array) $useOld;
    }
@endphp

<div class="form-group select2-label-fix {{ $errors->has(@$flat_name)? 'has-error':'' }} {{ isset($wrapperClass)? $wrapperClass:'' }}" {!! $styles or '' !!}>
    <label for="{{ @$name }}" class="{{ @$horizontal? @$labelSize? $labelSize:'col-sm-3':'' }} control-label">{{ @$label }}</label>
    @if (@$horizontal)
        <div class="{{ @$valueSize? $valueSize:'col-sm-8' }}">
            @endif
            <select name="{{ @$name }}" id="{{ @$flat_name }}"
                    class="form-control {{ isset($noSelect2)? '':'select2' }}" {!! @$multiple? 'multiple="multiple"':'' !!} {!! $extras or '' !!}>
                @if(isset($placeholder))
                    <option value="" disabled="disabled" selected="selected">{{ @$placeholder }}</option>
                @endif

                @foreach($options as $key => $value)
                    @if (@$multiple)
                        @if (empty($key))
                            @continue
                        @endif
                        @if (@$useKeys)
                            <option value="{{ $key }}" {{ isset($useOld)? in_array($key, $useOld)? 'selected':'':'' }}>{{ $value }}</option>
                        @else
                            <option value="{{ $value }}" {{ isset($useOld)? in_array($key, $useOld)? 'selected':'':'' }}>{{ $value }}</option>
                        @endif
                    @else
                        @if (@$useKeys)
                            <option value="{{ $key }}" {{ isset($useOld)? old($flat_name, $useOld) == $key? 'selected':'':'' }}>{{ $value }}</option>
                        @else
                            <option value="{{ $value }}" {{ isset($useOld)? old($flat_name, $useOld) == $value? 'selected':'':'' }}>{{ $value }}</option>
                        @endif
                    @endif
                @endforeach
            </select>

            @if($errors->has(@$flat_name))
                <span class="help-block">{{ $errors->first(@$flat_name) }}</span>
            @endif
            @if (@$horizontal)
        </div>
    @endif
</div>
