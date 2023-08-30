{!! Form::hidden('redirects_to', URL::previous()) !!}

<div class="form-group{{ $errors->has('title_text') ? ' has-error' : '' }}">
    <label class="col-sm-2 control-label" for="title_text">Title Text <span class="text-red">*</span></label>
    <div class="col-sm-5">
        {!! Form::text('title_text', null, ['class' => 'form-control', 'id'=>'descriptions', 'placeholder' => 'Enter Title Text']) !!}
        @if ($errors->has('title_text'))
            <span class="text-danger">
                <strong>{{ $errors->first('title_text') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label class="col-sm-2 control-label" for="image">Image<span class="text-red">*</span></label>
    <div class="col-sm-5">
        <div class="">
            {!! Form::file('image', ['class' => '', 'id'=> 'image', 'onChange'=>'AjaxUploadImage(this)']) !!}
        </div>
        <img id="DisplayImage" @if(!empty($banner->image) && file_exists($banner->image)) src="{{ url($banner->image)}}" style="margin-top: 1%; padding-bottom:5px; display: block;" @else src="" style="padding-bottom:5px; display: none;" @endif name="img"  width="150"  >
        @if ($errors->has('image'))
            <span class="text-danger">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label class="col-sm-2 control-label" for="role">Status <span class="text-red">*</span></label>
    <div class="col-sm-5">
        @foreach (\App\Models\Banner::$status as $key => $value)
            @php $checked = !isset($banner) && $key == 'active'?'checked':''; @endphp
            <label>
                {!! Form::radio('status', $key, null, ['class' => 'flat-red',$checked]) !!} <span style="margin-right: 10px">{{ $value }}</span>
            </label>
        @endforeach
            <br>
        @if ($errors->has('status'))
            <span class="text-danger">
             <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
</div>
