<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $with = ['author','category'];


    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function scopeFilter($query, array $filters){  // scopeFilter return a function name filter
         //Serach Filtering
        $query->when($filters['search'] ?? false , fn($query,$search) =>
            // fixing a bug to include only the matched search and category by adding this query:
            //$query->where(fn($query) => $query...
            $query->where(fn($query) => $query->where('title','like','%' . $search . '%')
            ->orWhere('excerpt','like','%' . $search . '%'))
    );
    // Category Filtering
    $query->when($filters['category'] ?? false , fn($query,$category) =>
    $query->whereHas('category',fn($query)=>$query->where('slug',$category)));

    //Author Filtering
       $query->when($filters['author'] ?? false , fn($query,$author) =>
    $query->whereHas('author',fn($query)=>$query->where('username',$author)));
    }
}

