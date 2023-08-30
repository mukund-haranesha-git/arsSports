{!! Form::hidden('redirects_to', URL::previous()) !!}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="name">Name <span class="text-red">*</span></label>
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
            @if ($errors->has('name'))
            <span class="text-danger">
            <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="status">Status <span class="text-red">*</span></label>
    <div class="col-md-6">
        @foreach (\App\Models\Category::$status as $key => $value)
            <?php $checked = !isset($category) && $key == 'active'?'checked':'';?>
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
