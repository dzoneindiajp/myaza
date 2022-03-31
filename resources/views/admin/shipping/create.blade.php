@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
                {{ trans('global.create') }} Shipping
                <a class="btn btn-secondary float-right" href="{{ route('admin.shipping.index') }}">
                    Back to Shipping
                </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.shipping.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="required" for="ps_pincode">Pincode</label>
                        <input class="form-control" type="text" name="ps_pincode" id="ps_pincode" value="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="ps_price">Weight Range</label>
                        <select class="form-control" name="ps_weight_id" required>
                            <option value="">Select Weight Range</option>
                            <?php foreach($categories as $cat){ ?>
                                <option value="<?php echo $cat->id; ?>"><?php echo $cat->weight_from.'-'.$cat->weight_to; ?> Kg</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="ps_price">Cost</label>
                        <input class="form-control" type="text" name="ps_price" id="ps_price" value="" required>
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
