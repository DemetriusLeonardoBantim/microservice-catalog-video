<?php

namespace Core\Domain\Repository;

use Core\Domain\Entity\Category;

interface CategoryRepositoryInterface
{
  public function insert(Category $category): Category;
  public function findAll(string $filter = '', $order = 'DESC');
}
