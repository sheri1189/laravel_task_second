<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        "category_title",
        "category_slug",
        "category_status",
        "sorting_number",
        "add_favicon",
        "category_banner",
        "added_from",
        "category_description",
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
