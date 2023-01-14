<?php

namespace Tests\Unit\Domain\Entity\CategoryUnitTest;

use PHPUnit\Framework\TestCase;


class CategoryUnitTest extends TestCase
{
  public function testAttributes()
  {
    $category = new Category(
      name: 'New Cat',
      description: 'New desc',
      isActive: true
    );

    $this->assertEquals('New Cat', $category->name);
    $this->assertEquals('New desc', $category->description);
    $this->assertEquals('true', $category->isActive);
  }
}
