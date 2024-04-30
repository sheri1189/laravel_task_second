<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level_Two extends Model
{
    use HasFactory;
    protected $fillable = [
        "level_two_title",
        "subcategory",
        "level_two_slug",
        "level_two_status",
        "sorting_number",
        "add_favicon",
        "level_two_banner",
        "added_from",
        "level_two_description",
        "section_name",
        "section_description",
        "section_product_title",
        "section_product_supplier",
        "section_product_image",
        "section_product_brand",
        "section_product_url",
        "section_product_description",
    ];
}
