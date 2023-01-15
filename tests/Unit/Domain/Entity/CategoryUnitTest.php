<?php


use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Throwable;

class CategoryUnitTest extends TestCase
{
  public function testAttributes()
  {
    $category = new Category(
      name: 'New Cat',
      description: 'New desc',
      isActive: true
    );


    $this->assertNotEmpty($category->id());
    $this->assertEquals('New Cat', $category->name);
    $this->assertEquals('New desc', $category->description);
    $this->assertEquals(true, $category->isActive);
  }

  public function testActivated()
  {
    $category = new Category(
      name: 'New Cat',
      isActive: false,
    );

    $this->assertFalse($category->isActive);
    $category->activate();
    $this->assertTrue($category->isActive);
  }

  public function testDisabled()
  {
    $category = new Category(
      name: 'New Cat',
      isActive: true,
    );

    $this->assertTrue($category->isActive);
    $category->disable();
    $this->assertFalse($category->isActive);
  }

  public function testUpdate()
  {
    $uuid = (string) Uuid::uuid4()->toString();

    $category = new Category(
      id: $uuid,
      name: 'New Cat',
      description: 'New desc',
      isActive: true,
    );

    $category->update(
      name: 'new_name',
      description: 'new_desc',
    );

    $this->assertEquals('new_name', $category->name);
    $this->assertEquals('new_desc', $category->description);
  }
}
