<?php

namespace Core\UseCase\CreateCategoryUseCase;

use Core\Domain\Repository\CategoryRepositoryInterface;

class CreateCategoryUseCase
{
  protected $repository;
  public function __counstruct(CategoryRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }
}
