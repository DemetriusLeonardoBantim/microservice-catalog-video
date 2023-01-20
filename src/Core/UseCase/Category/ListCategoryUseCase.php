<?php

namespace Core\UseCase\CreateCategoryUseCase;

use Core\Domain\Entity\Category;
use Core\Domain\Repository\CategoryRepositoryInterface;



class ListCategoryUseCase
{
  protected $repository;
  public function __counstruct(CategoryRepositoryInterface $repository)
  {
    $this->repository = $repository;
  }
}
