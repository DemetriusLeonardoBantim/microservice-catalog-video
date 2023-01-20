<?php

namespace Tests\Unit\UseCase\Category;

use Core\Domain\Repository\CategoryRepositoryInterface;
use PHPUnit\Framework\TestCase;
use Mockery;
use Core\UseCase\DTO\Category\{
  CategoryInputDto,
  CategoryOutputDto
};

class ListCategoriesUseCaseUnitTests extends TestCase
{
  public function testListCategoriesEmpty()
  {
    $this->mockPagination = Mockery::mock(stdClass::class);
    $this->mockPagination->sholdReceive('items')->andReturn([]);

    $this->mockRepo = Mockery::mock(stdClass::class, CategoryRepositoryInterface);
    $this->mockRepo->sholdReceive('paginate')->andReturn([]);

    $this->mockInputDto = Mockery::mock(ListCategoriesInputDto::class, [
      'id', 'filter'
    ]);

    $useCase = new ListCategoriesUseCase($this->mockRepo);
    $responseUseCase = $user->execute($this->mockInputDto);
    $this->assertCount(0, count($responseUseCase->items));
    $this->assertInstanceOf(ListCategoriesOutputDto::class, $responseUseCase);
  }
}
