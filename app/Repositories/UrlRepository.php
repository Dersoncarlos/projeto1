<?php

namespace App\Repositories;

interface UrlRepository
{
   public function listUrlsByUserId(int $userId): object;
   public function createUrl(array $data): object;
   public function removeUrlById(int $urlId): bool;
   public function findUrlById(int $urlId): object;
}
