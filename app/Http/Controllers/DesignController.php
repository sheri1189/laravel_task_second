<?php

namespace App\Http\Controllers;

set_time_limit(0);

use App\Models\Collection;
use App\Models\Design_Images;
use App\Models\Images;
use App\Models\Niche;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Route;
use PHPUnit\TestRunner\TestResult\Collector;

class DesignController extends Controller
{
    public function uploadZipFile()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval', 2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $allimages = Design_Images::where(function ($query) {
            $query->whereNull('niche_id')
                ->orWhereNull('collection_id');
        })->orderBy('id', 'DESC')->get();
        $allniche = Niche::where('niche_status', 1)->get();
        $allcollection = Collection::where('collection_status', 1)->get();
        $compact = compact("user", "allimages", "allniche", "allcollection", "latest_manage_designs", "latest_deny_designs", "latest_admin_designs", "latest_approve_designs");
        return view('Design.view')->with($compact);
    }
    public function zipFileUpload(Request $request)
    {
        $request->validate([
            'fileInput' => 'required|mimetypes:application/zip',
        ]);
        $zipFile = $request->file('fileInput');
        $originalName = $zipFile->getClientOriginalName();
        $explode = explode(".", $originalName);
        $filename = rand() . '.' . $explode[1];
        $zipFile->move('./zip_files/', $filename);
        $zipPath = "./zip_files/" . $filename;
        $zip = new ZipArchive();
        if ($zip->open($zipPath) === TRUE) {
            $extractPath = './zip_designs/' . now()->format('Y-m-d');
            if (!file_exists($extractPath)) {
                mkdir($extractPath, 0755, true);
            }
            $zip->extractTo($extractPath);
            $zip->close();
            File::delete('./zip_files/' . $filename);
            $msg = 200;
        } else {
            $msg = 500;
        }
        if ($msg == 200) {
            $extractedPath = './zip_designs/' . now()->format('Y-m-d');
            $files = scandir($extractedPath);
            $files = array_diff($files, ['.', '..']);
            foreach ($files as $file) {
                $filePath = $extractedPath . '/' . $file;
                if (is_dir($filePath)) {
                    $in_folder_files = scandir($extractedPath . '/' . $file);
                    $in_folder_files = array_diff($in_folder_files, ['.', '..']);
                    foreach ($in_folder_files as $in_folder) {
                        $image = Design_Images::where('design_file_path', '/zip_designs/' . now()->format('Y-m-d') . '/' . $file . '/' . $in_folder)->count();
                        if ($image == 0) {
                            Design_Images::create([
                                "design_images" => $file,
                                "design_file_path" => '/zip_designs/' . now()->format('Y-m-d') . '/' . $file . '/' . $in_folder,
                                "design_date" => $request->design_date,
                                "niche_id" => null,
                                "collection_id" => null,
                                "brand_name" => null,
                                "title" => null,
                                "bullet_point_1" => null,
                                "bullet_point_2" => null,
                                "description" => null,
                                "admin_approval" => 0,
                                "denied_reason" => null,
                                "user_id" => session()->get('user_added'),
                            ]);
                        }
                        $msg = 300;
                    }
                } else {
                    $image = Design_Images::where('design_file_path', '/zip_designs/' . now()->format('Y-m-d') . '/' . $file)->count();
                    if ($image == 0) {
                        Design_Images::create([
                            "design_images" => $file,
                            "design_file_path" => '/zip_designs/' . now()->format('Y-m-d') . '/' . $file,
                            "design_date" => $request->design_date,
                            "niche_id" => null,
                            "collection_id" => null,
                            "brand_name" => null,
                            "title" => null,
                            "bullet_point_1" => null,
                            "bullet_point_2" => null,
                            "description" => null,
                            "admin_approval" => 0,
                            "denied_reason" => null,
                            "user_id" => session()->get('user_added'),
                        ]);
                    }
                    $msg = 300;
                }
            }
        }
        if ($msg == 300) {
            return response()->json([
                "message" => 200,
            ]);
        } else {
            return response()->json([
                "message" => 500, // Error occurred during extraction or processing
            ]);
        }
    }

    public function updateNiche(Request $request, $id)
    {
        $images = Design_Images::where('id', $id)->first();
        Design_Images::where('id', $id)->update([
            "design_images" => $images->design_images,
            "design_file_path" => $images->design_file_path,
            "design_date" => $images->design_date,
            "niche_id" => $request->niche,
            "collection_id" => $images->collection_id,
            "brand_name" => $images->brand_name,
            "title" => $images->title,
            "bullet_point_1" => $images->bullet_point_1,
            "bullet_point_2" => $images->bullet_point_2,
            "description" => $images->description,
            "admin_approval" => $images->admin_approval,
            "denied_reason" => $images->denied_reason,
            "user_id" => session()->get('user_added'),
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function updateCollection(Request $request, $id)
    {
        $images = Design_Images::where('id', $id)->first();
        Design_Images::where('id', $id)->update([
            "design_images" => $images->design_images,
            "design_file_path" => $images->design_file_path,
            "design_date" => $images->design_date,
            "niche_id" => $images->niche_id,
            "collection_id" => $request->collection,
            "brand_name" => $images->brand_name,
            "title" => $images->title,
            "bullet_point_1" => $images->bullet_point_1,
            "bullet_point_2" => $images->bullet_point_2,
            "description" => $images->description,
            "admin_approval" => $images->admin_approval,
            "denied_reason" => $images->denied_reason,
            "user_id" => session()->get('user_added'),
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function allDesign()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval', 2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        // $allimages = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->latest()->get();
        $allimages = Design_Images::latest()->get();
        $array_nish = [];
        $array_collection = [];
        foreach ($allimages as $images) {
            $niche = Niche::where('id', $images->niche_id)->first();
            $array_nish[$images->id] = $niche;
        }
        foreach ($allimages as $images) {
            $collection = Collection::where('id', $images->collection_id)->first();
            $array_collection[$images->id] = $collection;
        }
        return view('Design.all', compact("user", "allimages", "array_nish", "array_collection", "latest_manage_designs", "latest_deny_designs", "latest_admin_designs", "latest_approve_designs"));
    }
    public function imagesGetting($id)
    {
        return response()->json([
            "message" => Design_Images::find($id),
        ]);
    }
    public function imageUpdate(Request $request, $id)
    {
        $request->validate([
            "title" => "unique:design__images,title,$id", "max:60",
            "brand_name" => "max:50",
            "bullet_point_1" => "max:256",
            "bullet_point_2" => "max:256",
            "description" => "max:2000",
        ], [
            "title.unique" => "This title has already been taken",
            "title.max" => "The title name must not exceed 60 characters.",
            "brand_name.max" => "The brand name must not exceed 50 characters.",
            "bullet_point_1.max" => "The bullet point one must not exceed 256 characters.",
            "bullet_point_2.max" => "The bullet point two must not exceed 256 characters.",
            "description.max" => "The description must not exceed 2000 characters.",
        ]);
        $image = Design_Images::find($id);
        Design_Images::where('id', $id)->update([
            "design_images" => $image->design_images,
            "design_file_path" => $image->design_file_path,
            "design_date" => $image->design_date,
            "niche_id" => $image->niche_id,
            "collection_id" => $image->collection_id,
            "brand_name" => $request->brand_name,
            "title" => strtolower($request->title),
            "bullet_point_1" => $request->bullet_point_1,
            "bullet_point_2" => $request->bullet_point_2,
            "description" => $request->description,
            "admin_approval" => $image->admin_approval,
            "denied_reason" => $image->denied_reason,
            "user_id" => session()->get('user_added'),
        ]);
        return response()->json([
            "module" => "image",
        ]);
    }
    public function latestManageDesign()
    {
        $user = User::findOrFail(session()->get("user_added"));
        $allimages = Design_Images::whereNotNull('niche_id')
            ->whereNotNull('collection_id')
            ->whereNotNull('watermark_path')
            ->latest()
            ->get();
        $latest_manage_designs = $allimages->count(); // Use count() instead of total()

        $latest_admin_designs = $allimages->whereNotNull('brand_name')
            ->whereNotNull('title')
            ->whereNotNull('bullet_point_1')
            ->whereNotNull('bullet_point_2')
            ->whereNotNull('description')
            ->where('admin_approval', 0)
            ->count();

        $latest_deny_designs = $allimages->whereNotNull('denied_reason')
            ->where('admin_approval', 2)
            ->count();

        $latest_approve_designs = $allimages->whereNotNull('brand_name')
            ->whereNotNull('title')
            ->whereNotNull('bullet_point_1')
            ->whereNotNull('bullet_point_2')
            ->whereNotNull('description')
            ->where('admin_approval', 1)
            ->count();

        return view('Design.latest_manage_design', compact(
            'user',
            'allimages',
            'latest_manage_designs',
            'latest_deny_designs',
            'latest_admin_designs',
            'latest_approve_designs'
        ));
    }
    public function latestImageUpdate(Request $request, $id)
    {
        $request->validate([
            "title" => "unique:design__images,title,$id", "max:60",
            "brand_name" => "max:50",
            "bullet_point_1" => "max:256",
            "bullet_point_2" => "max:256",
            "description" => "max:2000",
        ], [
            "title.unique" => "This title has already been taken",
            "title.max" => "The title name must not exceed 60 characters.",
            "brand_name.max" => "The brand name must not exceed 50 characters.",
            "bullet_point_1.max" => "The bullet point one must not exceed 256 characters.",
            "bullet_point_2.max" => "The bullet point two must not exceed 256 characters.",
            "description.max" => "The description must not exceed 2000 characters.",
        ]);
        $image = Design_Images::find($id);
        Design_Images::where('id', $id)->update([
            "design_images" => $image->design_images,
            "design_file_path" => $image->design_file_path,
            "design_date" => $image->design_date,
            "niche_id" => $image->niche_id,
            "collection_id" => $image->collection_id,
            "brand_name" => $request->brand_name,
            "title" => strtolower($request->title),
            "bullet_point_1" => $request->bullet_point_1,
            "bullet_point_2" => $request->bullet_point_2,
            "description" => $request->description,
            "admin_approval" => 0,
            "denied_reason" => null,
            "user_id" => session()->get('user_added'),
        ]);
        $image_update = Design_Images::find($id);
        return response()->json([
            "module" => "image_upd",
            "module_data" => $image_update,
        ]);
    }
    public function latestAdminDesign()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval', 2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $allimages = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->latest()->get();
        $array_nish = [];
        $array_collection = [];
        foreach ($allimages as $images) {
            $niche = Niche::where('id', $images->niche_id)->first();
            $array_nish[$images->id] = $niche;
        }
        foreach ($allimages as $images) {
            $collection = Collection::where('id', $images->collection_id)->first();
            $array_collection[$images->id] = $collection;
        }
        return view('Design.latest_admin_design', compact("user", "allimages", "array_nish", "array_collection", "latest_manage_designs", "latest_deny_designs", "latest_admin_designs", "latest_approve_designs"));
    }
    public function approveDesign($id)
    {
        $image = Design_Images::find($id);
        Design_Images::where('id', $id)->update([
            "design_images" => $image->design_images,
            "design_file_path" => $image->design_file_path,
            "design_date" => $image->design_date,
            "niche_id" => $image->niche_id,
            "collection_id" => $image->collection_id,
            "brand_name" => $image->brand_name,
            "title" => strtolower($image->title),
            "bullet_point_1" => $image->bullet_point_1,
            "bullet_point_2" => $image->bullet_point_2,
            "description" => $image->description,
            "admin_approval" => 1,
            "denied_reason" => $image->denied_reason,
            "user_id" => session()->get('user_added'),
        ]);
        $image_update = Design_Images::find($id);
        return response()->json([
            "module" => "approve",
            "module_data" => $image_update,
        ]);
    }
    public function approveAdminDesigns()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval', 2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $allimages = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->latest()->get();
        $array_nish = [];
        $array_collection = [];
        foreach ($allimages as $images) {
            $niche = Niche::where('id', $images->niche_id)->first();
            $array_nish[$images->id] = $niche;
        }
        foreach ($allimages as $images) {
            $collection = Collection::where('id', $images->collection_id)->first();
            $array_collection[$images->id] = $collection;
        }
        return view('Design.approve_design', compact("user", "allimages", "array_nish", "array_collection", "latest_manage_designs", "latest_deny_designs", "latest_admin_designs", "latest_approve_designs"));
    }
    public function denyDesigns($id)
    {
        return response()->json([
            "message" => Design_Images::find($id),
        ]);
    }
    public function deniedDesign(Request $request, $id)
    {
        $image = Design_Images::find($id);
        Design_Images::where('id', $id)->update([
            "design_images" => $image->design_images,
            "design_file_path" => $image->design_file_path,
            "design_date" => $image->design_date,
            "niche_id" => $image->niche_id,
            "collection_id" => $image->collection_id,
            "brand_name" => $image->brand_name,
            "title" => strtolower($image->title),
            "bullet_point_1" => $image->bullet_point_1,
            "bullet_point_2" => $image->bullet_point_2,
            "description" => $image->description,
            "admin_approval" => 2,
            "denied_reason" => $request->denied_reason,
            "user_id" => session()->get('user_added'),
        ]);
        $image_update = Design_Images::find($id);
        return response()->json([
            "module" => "denied",
            "module_data" => $image_update,
        ]);
    }
    public function manageDenyDesign()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval', 2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $allimages = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('watermark_path')->whereNotNull('denied_reason')->where('admin_approval', 2)->latest()->get();
        return view('Design.latest_deny_design', compact("user", "allimages", "latest_manage_designs", "latest_deny_designs", "latest_admin_designs", "latest_approve_designs"));
    }
    public function watermarkImplementating()
    {
        set_time_limit(0);
        ini_set('memory_limit', '1500M');
        $batchSize = 50;
        $allImages = Design_Images::whereNotNull('niche_id')
            ->whereNotNull('collection_id')
            ->whereNull('watermark_path')
            ->latest()
            ->chunk($batchSize, function ($images) {
                foreach ($images as $image) {
                    $this->processImage($image);
                }
            });
    }

    private function processImage($image)
    {
        $imagePath = "." . $image->design_file_path;
        $fileExtension = pathinfo($imagePath, PATHINFO_EXTENSION);

        try {
            if ($image->id % 10 === 0) {
                DB::reconnect();
            }
            $img = Image::make($imagePath);
            $watermarkImagePath = public_path('assets/images/background/watermark.png');
            $watermark = Image::make($watermarkImagePath);
            $watermark->resize(4500, 5200);
            $img->insert($watermark, 'center');

            $pathToSave = 'watermark/';
            $imageName = 'watermarked_' . $image->id . '.' . $fileExtension;
            $img->save($pathToSave . $imageName);

            DB::table('design__images')->where('id', $image->id)->update([
                "watermark_path" => $pathToSave . $imageName,
            ]);
        } catch (\Exception $e) {
            Log::error('Error processing image ' . $image->id . ': ' . $e->getMessage());
        }
    }
}
