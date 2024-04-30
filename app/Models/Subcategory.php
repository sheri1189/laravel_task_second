<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
    use HasFactory;
    protected $fillable = [
        "subcategory_title",
        "category",
        "subcategory_slug",
        "subcategory_status",
        "sorting_number",
        "add_favicon",
        "subcategory_banner",
        "added_from",
        "subcategory_description",
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
