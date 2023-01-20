<?php

namespace Core\UseCase\CreateCategoryUseCase;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\DTO\Category\{
  CategoryInputDto,
  CategoryOutputDto
};


class ListCategoryUseCase
{
  protected $repository;
  public function __counstruct(CategoryRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function execute(CategoryInputDto $input): CategoryOutputDto
  {
    $category = $this->repository->findById($input->id);
    return new CategoryOutputDto(
      id: $category->id(),
      name: $category->name,
      description: $category->description,
      is_active: $category->is_active,
    );
  }
}
