<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class tags_model_tools_model extends Model
{
    use HasFactory;
    
    protected $table = 'tags_model_tools_model';

    protected $fillable = ['tags_model_id', 'tools_model_id'];
}
