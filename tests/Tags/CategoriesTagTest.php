<?php

namespace Tests\Tags;

use Jonassiewertsen\StatamicButik\Http\Models\Category;
use Jonassiewertsen\StatamicButik\Tags\Categories;
use Jonassiewertsen\StatamicButik\Tests\TestCase;

class CategoriesTagTest extends TestCase
{
    public $categories;

    public function setUp(): void
    {
        parent::setUp();
        $this->categories = new Categories();
    }

   /** @test */
   public function it_will_return_all_categories_in_the_expected_format()
   {
       create(Category::class)->first();
       $category = Category::first();

           $this->assertEquals(
               $this->categories->index(),
               [
                   [
                       'name' => $category->name,
                       'slug' => $category->slug,
                       'url'  => $category->url
                   ],
               ]
           );
   }

    /** @test */
    public function categories_are_countable()
    {
        create(Category::class)->first();

        $this->assertEquals(1, $this->categories->count());
    }
}