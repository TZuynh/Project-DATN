<?php

namespace App\Repositories;

/**
 * Core class of repository
 */
abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model An instance of the Eloquent Model
     */
    protected $model;

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function paginate($perPage = 20)
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate($perPage);
    }

    /**
     * {@inheritdoc}
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function update($model, $data)
    {
        $model->update($data);

        return $model;
    }

    /**
     * {@inheritdoc}
     */
    public function destroy($model)
    {
        return $model->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function clearCache(): bool
    {
        return true;
    }
}
