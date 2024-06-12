<?php

namespace App\Repositories;

/**
 * Core Repository Interface
 */
interface RepositoryInterface
{
    /**
     * Find the resource
     *
     * Find the first resource using its ID
     *
     * @param  int  $id ID of the resource
     * @return \Illuminate\Database\Eloquent\Model $model
     *
     * @throws Exception
     **/
    public function find($id);

    /**
     * Return a collection
     *
     * Return a collection of all records of a resource
     *
     * @return \Illuminate\Database\Eloquent\Collection
     **/
    public function all();

    /**
     * Paginate a resource
     *
     * Defining $perPage to limit the items and paginate the resource
     *
     * @param  int  $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15);

    /**
     * Create a resource
     *
     * Pass a array data to the function to create a model
     * you can override to pass a request instead
     *
     * @return $model
     */
    public function create($data);

    /**
     * Update a resource
     *
     * Find the specific resource that you passed in and update
     * the resource based on your submitted data
     *
     * @param  mixed  $data
     * @return $model
     */
    public function update($model, $data);

    /**
     * Destroy a resource
     *
     * Destroy the resource that you passed in
     *
     * @return bool
     */
    public function destroy($model);

    /**
     * Find a resource by the given slug
     *
     * Find a specific resource by finding the slug column in DB
     * make sure your model have a column named 'slug'
     *
     * @param  string  $slug
     * @return  $model
     */
    public function findBySlug($slug);

    /**
     * Clear the cache for this Repositories' Entity
     */
    public function clearCache(): bool;
}
