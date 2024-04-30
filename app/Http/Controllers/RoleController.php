<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Design_Images;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval', 2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $allrole = Role::where('user_id', session()->get('user_added'))->latest()->get();
        $compact = compact("user", "allrole", "latest_manage_designs", "latest_deny_designs", "latest_admin_designs", "latest_approve_designs");
        return view('Role.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_role()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval', 2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $compact = compact("user", "latest_manage_designs", "latest_manage_designs", "latest_admin_designs", "latest_approve_designs", "latest_deny_designs", "latest_approve_designs");
        return view('Role.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $input = $request->all();
        $input['role_name'] = strtolower($request->role_name);
        $input['added_from'] = 1;
        $input['role_status'] = 1;
        $input['dashboard'] = $request->dashboard;
        $input['niche'] = $request->niche;
        $input['collection'] = $request->collection;
        $input['design'] = $request->design;
        $input['role'] = $request->role;
        $input['user'] = $request->user;
        $input['design_manage'] = $request->design_manage;
        $input['admin_design_manage'] = $request->admin_design_manage;
        $input['user_id'] = session()->get('user_added');
        Role::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $status = $role->role_status;
        if ($status == 1) {
            Role::where('id', $role->id)->update([
                "role_status" => 0,
            ]);
        } else {
            Role::where('id', $role->id)->update([
                "role_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return response()->json([
            "message" => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $request->validate(
            [
                "role_name" => "unique:roles,role_name,$role->id",
            ],
            [
                "role_name.unique" => 'This collection name has already been taken',
            ]
        );
        $input = $request->all();
        $input['role_name'] = strtolower($request->role_name);
        $role->update($input);
        $msg=200;
        if ($msg == 200) {
            return response()->json([
                "module" => "role",
                "module_data" => $role,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function getRole($id)
    {
        return response()->json([
            "message" => Role::where('id', $id)->first(),
        ]);
    }
}
