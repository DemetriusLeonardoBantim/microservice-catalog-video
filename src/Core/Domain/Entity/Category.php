<?php

namespace Core\Domain\Entiry;

class Category
{
  public function __construct(
    protected string $id = '',
    protected string $name,
    protected string $description = '',
    protected bool $isActive = true,
  ) {
  }
}
