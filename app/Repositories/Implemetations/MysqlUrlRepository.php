<?php

namespace App\Repositories\Implemetations;

use App\Repositories\UrlRepository;
use App\Url;

class MysqlUrlRepository implements UrlRepository
{

    protected $model;

    public function __construct(Url $model)
    {
        $this->model = $model;
    }

    public function listUrlsByUserId(int $userId): object
    {
        return $this->model->where('user_id', $userId)->get();
    }

    public function createUrl(array $data): object
    {
        $url = $this->model->fill($data);

        $url->save();

        return $url;
    }

    public function removeUrlById(int $urlId): bool
    {
        $url = $this->model->find($urlId);

        return $url->delete();
    }

    public function findUrlById(int $urlId): object
    {
        return $this->model->findOrFail($urlId);
    }
}
