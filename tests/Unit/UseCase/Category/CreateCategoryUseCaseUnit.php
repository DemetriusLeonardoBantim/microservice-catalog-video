<?php

namespace Tests\Unit\UseCase\Category;

use Rasmery\Uuid\Uuid;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\CreateCategoryUseCase\CreateCategoryUseCase;
use Core\UseCase\DTO\Category\CategoryCreateInputDTO;
use Core\UseCase\DTO\Category\CategoryCreateOutputDTO;
use PHPUnit\Framework\TestCase;
use Mockery;

class CreateUseCaseCategoryUnitTest extends TestCase
{

  public function testCreateNewCategory()
  {
    $uuid = (string) Uuid::uuid4()->toString();
    $categoryName = 'name cat';

    $mockEntity = Mockery::mock(Category::class, [
      $uuid,
      $categoryName
    ]);

    $mockRepo = Mockery::mock(stdClass::class, CreateCategoryUseCase::class);
    $mockRepo->shouldReceive('insert')->andReturn($mockEntity);

    $mockInputDot = Mockery::mock(CategoryCreateInputDTO::class, [
      $categoryName
    ]);

    $useCase = new CreateCategoryUseCase($this->$mockRepo);

    $responseUseCase = $useCase->execute($mockInputDot);
    $this->assertInstanceOf(CategoryCreateOutputDTO::class, $responseUseCase);

    Mockery::close();
  }
}
