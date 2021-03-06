<?php

namespace Jonassiewertsen\StatamicButik\Tests\Unit;

use Jonassiewertsen\StatamicButik\Http\Models\Product;
use \Jonassiewertsen\StatamicButik\Http\Models\Tax;
use Jonassiewertsen\StatamicButik\Tests\TestCase;

class TaxTest extends TestCase
{
    protected $tax;

    public function setUp(): void
    {
        parent::setUp();
        $this->tax = create(Tax::class)->first();
    }

    /** @test */
    public function the_tax_will_be_saved_without_decimals()
    {
        $this->tax->update(['percentage' => '7.7' ]);
        $this->assertEquals('770', Tax::first()->getRawOriginal('percentage'));
    }

    /** @test */
    public function a_tax_has_products(){
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->tax->products);
    }

    /** @test */
    public function taxes_have_a_edit_url()
    {
        $this->assertStringContainsString(
            $this->tax->editUrl(),
            cp_route('butik.taxes.edit', $this->tax)
        );
    }
}
