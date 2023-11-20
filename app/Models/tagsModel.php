<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tagsModel extends Model
{
    use HasFactory;
    
    protected $table = 'tagsModel';
    
    protected $fillable = ['tags'];
    
    public function tool(){
        return $this->belongsToMany(toolsModel::class);
    }
}