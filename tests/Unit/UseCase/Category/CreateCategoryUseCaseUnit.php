<?php

namespace Tests\Unit\UseCase\Category;

use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\CreateCategoryUseCase\CreateCategoryUseCase;
use PHPUnit\Framework\TestCase;
use Mockery;

class CreateUseCaseCategoryUnitTest extends TestCase
{
  public function testCreateNewCategory()
  {
    $categoryName = 'name cat';

    $mockEntity = Mockery::mock(Category::class, [
      $categoryName
    ]);
    $mockRepo = Mockery::mock(stdClass::class, CreateCategoryUseCase::class);
    $mockRepo->shouldReceive('insert')->andReturn();
    $useCase = new CreateCategoryUseCase($this->$mockRepo);
    $useCase->execute();
    Mockery::close();
  }
}
