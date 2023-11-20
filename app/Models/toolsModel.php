<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class toolsModel extends Model
{   
    use HasFactory;

    protected $table = 'toolsModel';

    protected $fillable = ['title','link','description'];

    public function tags(){
        return $this->belongsToMany(tagsModel::class);
   }
}