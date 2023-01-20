<?php

namespace Tests\Unit\UseCase\Category;

use Rasmery\Uuid\Uuid;
use Core\Domain\Entity\Category as CategoryEntity;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\CreateCategoryUseCase\CreateCategoryUseCase;
use Core\UseCase\DTO\Category\CategoryCreateInputDTO;
use Core\UseCase\DTO\Category\CategoryCreateOutputDTO;
use PHPUnit\Framework\TestCase;
use Mockery;


class ListCategoryUseCaseUnitTests extends TestCase
{
  public function testGetById()
  {
    $uuid = (string) Uuid::uuid4()->toString();
    $categoryName = 'name cat';

    $mockEntity = Mockery::mock(CategoryEntity::class, [
      $uuid,
      'teste category'
    ]);
  }
}
