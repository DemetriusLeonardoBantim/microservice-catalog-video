<?php


use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
  public function testAttributes()
  {
    $category = new Category(
      id: 'asdf',
      name: 'New Cat',
      description: 'New desc',
      isActive: true
    );

    $this->assertEquals('New Cat', $category->name);
    $this->assertEquals('New desc', $category->description);
    $this->assertEquals(true, $category->isActive);
  }
}
