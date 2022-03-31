    @foreach ($selectedaatrs as $daatr)
        <div class="product-widget-type product-widget">
            <h4 class="product-widget-title">{{ $daatr->name }}</h4>
            <ul class="product-widget-filter product-categories">
                @if ($daatr->attribute_values)
                    @foreach ($daatr->attribute_values as $value)
                        @if ($value->value != '')
                            <li>
                                <label class="container_category">
                                    @php
                                        $checked = '';
                                        if (!empty(request()->get('attributes')) && count(request()->get('attributes')) > 0) {
                                            $checked = in_array($value->id, request()->get('attributes')) ? 'checked' : '';
                                        }
                                    @endphp
                                    <input class="filter" id="attribute-{{ $daatr->id }}"
                                        data-name="{{ $daatr->id }}" data-id="{{ $value->id }}" {{ $checked }} type="checkbox">
                                    {{ $value->value }}
                                    <span class="checkmark"></span>
                                    @php
                                        $products_ids = new \App\Models\Product;
                                        $products_ids = $products_ids->leftJoin('product_variations', 'product_variations.product_id', '=', 'products.id');

                                        if(request()->get('sizes') && request()->get('colors')){
                                            if(count(request()->get('sizes')) > 0 && count(request()->get('colors')) > 0){
                                                $products_ids = $products_ids->whereIn('product_variations.color_id', request()->get('colors'))->orWhereIn('product_variations.size_id',request()->get('sizes'));
                                            }
                                        }
                    
                                        elseif(request()->get('sizes')){
                                            if(count(request()->get('sizes')) > 0){
                                                $products_ids = $products_ids->whereIn('product_variations.size_id',request()->get('sizes'));
                                            }
                                        }
                                        elseif(request()->get('colors')){
                                            if(count(request()->get('colors')) > 0){
                                                $products_ids = $products_ids->whereIn('product_variations.color_id',request()->get('colors'));
                                            }
                                        }
                                        
                                        $above = request()->get('min_price');
                                        $below = request()->get('max_price');

                                        if ($above !== 'no' && $below !== 'no') {
                                            $products_ids = $products_ids->whereBetween('product_variations.single_sales_price', [$above, $below]);
                                        } elseif ($above !== 'no' && $below === 'no') {
                                            $products_ids = $products_ids->where('product_variations.single_sales_price', '>', $above);
                                        } elseif ($above === 'no' && $below !== 'no') {
                                            $products_ids = $products_ids->where('product_variations.single_sales_price', '<', $below);
                                        }
                                        
                                        $products_ids = $products_ids->where('products.status', 1);
                                        $products_ids = $products_ids->where('products.sub_category_id', $cat_id);
                                        $products_ids = $products_ids->groupBy('products.id');
                                        // $products_ids = $products_ids->get();
                                        $products_ids = $products_ids->pluck('products.id');

                                        // $products_ids = \App\Models\Product::where('sub_category_id', $cat_id)
                                        //     ->where('status', 1)
                                        //     ->get()
                                        //     ->pluck('id');
                                        
                                        $attribute_count = \App\Models\ProductAttribute::whereIn('product_id', $products_ids)
                                            ->where('attribute_value_id', $value->id)
                                            ->count();
                                    @endphp
                                    ({{ $attribute_count }})
                                </label>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    @endforeach
