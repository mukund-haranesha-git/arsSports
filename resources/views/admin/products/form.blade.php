{!! Form::hidden('redirects_to', URL::previous()) !!}

<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="category">Category <span class="text-red">*</span></label>
    <div class="col-md-6">
        {!! Form::select('category', $category, null, ['class' => 'form-control select2']) !!}
        <br class="mealCategoryError">
        @if ($errors->has('category'))
            <span class="text-danger">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="name">Name <span class="text-red">*</span></label>
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
        @if ($errors->has('name'))
            <span class="text-danger"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('qar_price') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="qar_price">Qatar Price <span class="text-red"></span></label>
    <div class="col-md-6">
        {!! Form::text('qar_price', null, ['class' => 'form-control', 'placeholder' => 'Enter Qatar Price']) !!}
        @if ($errors->has('qar_price'))
            <span class="text-danger"><strong>{{ $errors->first('qar_price') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('uae_price') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="uae_price">UAE Price <span class="text-red"></span></label>
    <div class="col-md-6">
        {!! Form::text('uae_price', null, ['class' => 'form-control', 'placeholder' => 'Enter UAE Price']) !!}
        @if ($errors->has('uae_price'))
            <span class="text-danger"><strong>{{ $errors->first('uae_price') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('inr_price') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="inr_price">INR Price <span class="text-red"></span></label>
    <div class="col-md-6">
        {!! Form::text('inr_price', null, ['class' => 'form-control', 'placeholder' => 'Enter INR Price']) !!}
        @if ($errors->has('inr_price'))
            <span class="text-danger"><strong>{{ $errors->first('inr_price') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="description">Description <span class="text-red"></span></label>
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'form-control', 'placeholder' => 'Enter INR Price']) !!}
        @if ($errors->has('description'))
            <span class="text-danger"><strong>{{ $errors->first('description') }}</strong></span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="image">Image<span class="text-red"></span></label>
    <div class="col-md-12">
        <div class="fileError">
            {!! Form::file('image', ['class' => '', 'id'=> 'image','accept'=>'image/*', 'onChange'=>'AjaxUploadImage(this)']) !!}
        </div>
        <input type="hidden" id="check_upload_file" name="check_upload_file" value="@if(isset($products) && !empty($products->image) && file_exists('public/storage/'.$products->image)) {{$products->image}} @endif" />
        <img id="DisplayImage" @if(!empty($products->image)) src="{{ url($products->image)}}" style="margin-top: 1%; padding-bottom:5px; display: block;" @else src="" style="padding-bottom:5px; display: none;" @endif width="150">
        @if ($errors->has('image'))
            <span class="text-danger">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label class="col-md-12 control-label" for="status">Status <span class="text-red">*</span></label>
    <div class="col-md-6">
        @foreach (\App\Models\Product::$status as $key => $value)
            @php $checked = !isset($products) && $key == 'active'?'checked':''; @endphp
            <label>
                {!! Form::radio('status', $key, null, ['class' => 'flat-red',$checked]) !!} <span style="margin-right: 10px">{{ $value }}</span>
            </label>
        @endforeach
        <br class="statusError">
        @if ($errors->has('status'))
            <span class="text-danger"><strong>{{ $errors->first('status') }}</strong></span>
        @endif
    </div>
</div>
