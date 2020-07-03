<?php

namespace Jonassiewertsen\StatamicButik\Http\Controllers\CP;

use Illuminate\Http\Request;
use Jonassiewertsen\StatamicButik\Blueprints\VariantBlueprint;
use Jonassiewertsen\StatamicButik\Http\Controllers\CpController;
use Jonassiewertsen\StatamicButik\Http\Models\Variant;

class VariantsController extends CpController
{
    public function store(Request $request)
    {
//        $this->authorize('store', Variant::class);

        $blueprint = new VariantBlueprint();
        $fields    = $blueprint()->fields()->addValues($request->all());
        $fields->validate();
        $values  = $fields->process()->values();
        $variant = $values->toArray();

        Variant::create([
            'available'       => $variant['available'],
            'title'           => $variant['title'],
            'product_slug'    => $variant['product_slug'],
            'inherit_price'   => $variant['inherit_price'],
            'price'           => $variant['price'],
            'inherit_stock'   => $variant['inherit_stock'],
            'stock'           => $variant['stock'],
            'stock_unlimited' => $variant['stock_unlimited'],
        ]);
    }
}
