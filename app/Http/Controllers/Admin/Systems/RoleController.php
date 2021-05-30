<?php

namespace App\Http\Controllers\Admin\Systems;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * @var array|string[]
     */
    protected $fields = [
        'name' => '',
        'description' => '',
    ];


    /**
     * List role.
     *
     * @param Request $request
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Role::class);
        $roles = Role::all();
//        $roles = Role::all();

        if ($request->expectsJson()) {
            return RoleResource::collection($roles);
        }

        return view('admin.roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Create role.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('create', Role::class);
        $data = ['permission' => Permission::all()];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.roles.create', $data);
    }

    /**
     * Store role.
     *
     * @param RoleRequest $request
     *
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(RoleRequest $request, Role $role)
    {
        $this->authorize('create', Role::class);
        $role->syncPermissions($request->all());

        if ($request->action === 'cancel') {
            return redirect()
                ->route('admin.roles.index')
                ->with('message', 'Create role was canceled');
        }

        return redirect()
            ->route('admin.roles.index')
            ->with('message', 'Create role successful!');
    }

    /**
     * Edit role.
     *
     * @param Role $role
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);
        $data = ['role' => $role];

        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $role->$field);
        }

        return view('admin.roles.edit', $data);
    }

    /**
     * Update role.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $role->syncPermissions($request->all());

        return redirect()->route('admin.roles.edit', $role)
            ->with('message', 'Update role successful!');
    }

    /**
     * Delete role.
     *
     * @param Role $role
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        if ($role->id == 1 || $role->id == 2) {
            return response()->json(['data' => 'Data cannot be delete'], 200);
        }
        $role->delete();

        return response()->json(['data' => 'Data cannot be delete'], 200);
    }
}
