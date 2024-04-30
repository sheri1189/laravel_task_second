<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\UpdateCollectionRequest;
use App\Models\Design_Images;
use App\Models\User;

class CollectionController extends Controller
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
        $allcollection = Collection::where('user_id', session()->get('user_added'))->latest()->get();
        $compact = compact("user", "allcollection","latest_manage_designs","latest_deny_designs","latest_admin_designs","latest_approve_designs");
        return view('Collection.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_collection()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval',2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $compact = compact("user","latest_manage_designs","latest_deny_designs","latest_admin_designs","latest_approve_designs");
        return view('Collection.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request)
    {
        $input = $request->all();
        $input['collection_name'] = strtolower($request->collection_name);
        $input['user_id'] = session()->get('user_added');
        $input['collection_status'] = 1;
        Collection::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        $status = $collection->collection_status;
        if ($status == 1) {
            Collection::where('id', $collection->id)->update([
                "collection_status" => 0,
            ]);
        } else {
            Collection::where('id', $collection->id)->update([
                "collection_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $collection,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collection $collection)
    {
        return response()->json([
            "message" => $collection,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectionRequest $request, Collection $collection)
    {
        $request->validate(
            [
                "collection_name" => "unique:collections,collection_name,$collection->id",
            ],
            [
                "collection_name.unique" => 'This collection name has already been taken',
            ]
        );
        $input = $request->all();
        $input['collection_name'] = strtolower($request->collection_name);
        $input['added_from'] = 1;
        $input['category_status'] = $collection->collection_status;
        $collection->update($input);
        return response()->json([
            "module" => "collection",
            "module_data" => $collection,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
