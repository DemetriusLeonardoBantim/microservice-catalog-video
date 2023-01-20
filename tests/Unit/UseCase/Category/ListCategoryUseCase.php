<?php

namespace Tests\Unit\UseCase\Category;

use Rasmery\Uuid\Uuid;
use Core\Domain\Entity\Category as CategoryEntity;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\CreateCategoryUseCase\CreateCategoryUseCase;
use Core\UseCase\CreateCategoryUseCase\ListCategoryUseCase;
use Core\UseCase\DTO\Category\CategoryCreateInputDTO;
use Core\UseCase\DTO\Category\CategoryCreateOutputDTO;
use PHPUnit\Framework\TestCase;
use Mockery;
use Core\UseCase\DTO\Category\{
  CategoryInputDto,
  CategoryOutputDto
};

class ListCategoryUseCaseUnitTests extends TestCase
{
  public function testGetById()
  {
    $uuid = (string) Uuid::uuid4()->toString();

    $this->$mockEntity = Mockery::mock(CategoryEntity::class, [
      $uuid,
      'teste category'
    ]);
    $this->mockRepo = Mockery::mock(stdClass::class, CategoryRepositoryInterface::class);
    $this->mockRepo->shouldReceive('findById')->with($uuid)->andReturn($this->mockEntity);

    $this->mockInputDto = Mockery::mock(CategoryInputDto::class, [
      $uuid,
    ]);

    $useCase = new ListCategoryUseCase($this->mockRepo);
    $response = $useCase->execute($this->mockInputDTO);

    $this->assertInstanceOf(CategoryOutputDto::class, $response);
    $this->assertEquals('test category', $response->name);
    $this->assertEquals($uuid, $response->id);
  }

  protected function tearDown(): void
  {
    Mockery::close();
    parent::tearDown();
  }
}
