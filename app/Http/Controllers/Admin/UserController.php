<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Provider\ProviderRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * @var ProviderRepositoryInterface
     */
    private $userRepository;

    /**
     * @var RoleRepositoryInterface
     */
    private $roleRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('Quản Lý Người Dùng');
        $users = $this->userRepository->all();

        return view('admin.user.index', compact(
            'title',
            'users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleRepository->all();

        return view('admin.user.create', compact(
            'roles'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $this->userRepository->create($data);

        return redirect()->route('admin.user-management.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Display the specified resource of the logged in use
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function myProfile()
    {
        $title = __('My profile');

        return view('admin.user.profile.my_profile', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = $this->roleRepository->all();
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('admin.user.edit', compact('roles', 'user', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->validated());
        return redirect()->route('admin.user-management.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->userRepository->destroy($user);
        return redirect()->route('admin.user-management.user.index');
    }
}
