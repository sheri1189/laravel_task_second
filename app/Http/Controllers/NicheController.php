<?php

namespace App\Http\Controllers;

use App\Models\Niche;
use App\Http\Requests\StoreNicheRequest;
use App\Http\Requests\UpdateNicheRequest;
use App\Models\Design_Images;
use App\Models\User;

class NicheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval',2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $allniche = Niche::where('user_id', session()->get('user_added'))->latest()->get();
        $compact = compact("user", "allniche","latest_manage_designs","latest_deny_designs","latest_admin_designs","latest_approve_designs");
        return view('Niche.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_niche()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval',2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $compact = compact("user","latest_manage_designs","latest_deny_designs","latest_admin_designs","latest_approve_designs");
        return view('Niche.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNicheRequest $request)
    {
        $input = $request->all();
        $input['niche_name'] = strtolower($request->niche_name);
        $input['user_id'] = session()->get('user_added');
        $input['niche_status'] = 1;
        Niche::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Niche $niche)
    {
        $status = $niche->niche_status;
        if ($status == 1) {
            Niche::where('id', $niche->id)->update([
                "niche_status" => 0,
            ]);
        } else {
            Niche::where('id', $niche->id)->update([
                "niche_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $niche,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Niche $niche)
    {
        return response()->json([
            "message" => $niche,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNicheRequest $request, Niche $niche)
    {
        $request->validate(
            [
                "niche_name" => "unique:niches,niche_name,$niche->id",
            ],
            [
                "niche_name.unique" => 'This niche name has already been taken',
            ]
        );
        $input = $request->all();
        $input['niche_name'] = strtolower($request->niche_name);
        $input['added_from'] = 1;
        $input['niche_status'] = $niche->niche_status;
        $niche->update($input);
        return response()->json([
            "module" => "niche",
            "module_data" => $niche,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niche $niche)
    {
        $niche->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
