<?php

namespace Core\UseCase\CreateCategoryUseCase;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;

class CreateCategoryUseCase
{
  protected $repository;
  public function __counstruct(CategoryRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }

  public function execute()
  {
    $category = new Category(
      name: 'teste',
    );
    +$this->repository->insert($category);
  }
}
