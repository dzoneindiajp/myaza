@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
           Add Video
            <a class="btn btn-secondary float-right" href="{{ route('admin.video-add.index') }}">
                {{ trans('global.back') }}
            </a>
        </div>

        <div class="card-body">
            <form method="POST" class="form-row" action="{{ route('admin.video-add.store') }}"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group col-6">
                    <label class="required" for="title">{{ trans('cruds.slider.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.slider.fields.title_helper') }}</span>
                </div>

                <!--<div class="form-group col-6">-->
                <!--    <label for="url">{{ trans('cruds.slider.fields.url') }}</label>-->
                <!--    <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url"-->
                <!--        id="url" value="{{ old('url', '') }}">-->
                <!--    @if ($errors->has('url'))-->
                <!--        <span class="text-danger">{{ $errors->first('url') }}</span>-->
                <!--    @endif-->
                <!--    <span class="help-block">{{ trans('cruds.slider.fields.url_helper') }}</span>-->
                <!--</div>-->

                <!--<div class="form-group col-7">-->
                <!--    <label for="description">{{ trans('cruds.slider.fields.description') }}</label>-->
                <!--    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"-->
                <!--        name="description" id="description">{{ old('description') }}</textarea>-->
                <!--    @if ($errors->has('description'))-->
                <!--        <span class="text-danger">{{ $errors->first('description') }}</span>-->
                <!--    @endif-->
                <!--    <span class="help-block">{{ trans('cruds.slider.fields.description_helper') }}</span>-->
                <!--</div> -->

                <div class="form-group col-md-3">
                    {{-- @include('partials.single-image-upload', [
                    'input_name' => 'image',
                    'lable_name' => trans('cruds.coupon.fields.image'),
                    'image_view_name' => 'image_view',
                    'image_error_name' => 'image_error',
                    'required' => '',
                    'image_url' => ''
                    ]) --}}

                    <label for="image">Video</label>
                        <input type="file" class="btn btn-primary" data-toggle="modal" name="video" id="image">Upload</button>
                        &nbsp;
                        <span class="text-warning">* please upload Video only.</span>
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.brand.fields.description_helper') }}</span>
                        <div class="image-load">
                            {{-- load dynamic image --}}
                    </div>
                </div>

                <div class="form-group col-2">
                    <label class="required">{{ trans('cruds.slider.fields.status') }}</label>
                    <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                        id="status" required>
                        <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                            {{ trans('global.pleaseSelect') }}</option>
                        @foreach (App\Models\Slider::STATUS_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('status', 1) == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.slider.fields.status_helper') }}</span>
                </div>
                <div class="form-group col-12 text-right">
                    <button class="btn btn-success" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>


@include('admin.upload.index');

@endsection

@section('scripts')
@include('admin.mediascript.singlecategory')
   
@endsection
