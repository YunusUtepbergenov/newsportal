<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ru',
        'parent_id'
    ];

    public function getParent($id){
        $category = $this->find($id);
        return $category->name_en;
    }
}
