<?php

namespace App\Repositories\User;

use App\Acl\Acl;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * The repository for User Model
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    const ITEM_PER_PAGE = 50;

    /**
     * {@inheritdoc}
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function __construct(User $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    /**
     * @inheritdoc
     */
    public function create($data)
    {
        try {
            DB::beginTransaction();
            $data['name'] = $data['last_name'] . ' ' . $data['first_name'];
            $user = $this->model->create($data);

            $user->syncRoles($data['roles']);

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }


    /**
     * @inheritdoc
     */
    public function update($model, $data)
    {
        try {
            DB::beginTransaction();
            $data['name'] = $data['last_name'] . ' ' . $data['first_name'];
            $user = $model->update($data);

            if (isset($data['roles'])) {
                $model->syncRoles($data['roles']);
            }

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
