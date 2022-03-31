@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
                {{ trans('global.create') }} Weight Range
                <a class="btn btn-secondary float-right" href="{{ route('admin.weight.index') }}">
                    Back to Weight
                </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.weight.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required" for="weight_from">Weight From(Kg)</label>
                        <input class="form-control" type="text" name="weight_from" id="weight_from" value="" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="weight_to">Weight To(Kg)</label>
                        <input class="form-control" type="text" name="weight_to" id="weight_to" value="" required>
                    </div>

                    <div class="form-group col-md-12  text-right">
                        <button class="btn btn-success " type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
