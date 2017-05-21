<label for="{{ @name }}" style="display:block;">{{ @$label }}</label>
<div class="fileinput {{ isset($placeholder)? 'fileinput-exists':'fileinput-new' }}" data-provides="fileinput">

    <div class="fileinput-preview {{ isset($placeholder)? 'fileinput-exists':'' }} thumbnail" data-trigger="fileinput" style="width: 180px; height: 130px;">
        @if(isset($placeholder) && $placeholder != null)
            <img src="{{ $placeholder }}" alt="">
        @endif
    </div>
    <div>
        <span class="btn btn-default btn-file btn-xs">
            <span class="fileinput-new">Select image</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="{{ @$name }}" id="{{ @name }}"></span>
        <a href="#" class="btn btn-default fileinput-exists btn-xs" data-dismiss="fileinput">Remove</a>
    </div>

    @if($errors->has(@$name))
        <span class="help-block" style="color: #a94442; font-weight: 600;">{{ $errors->first(@$name) }}</span>
    @endif
</div>
