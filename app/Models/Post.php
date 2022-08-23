<?php

namespace App\Models;

use App\Http\Scopes\PostScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','content','user_id'];
    protected $hidden=['user_id'];
    protected $casts=[
        'created_at'=>'date:Y-m-d',
        'updated_at'=>'date:Y-m-d',
    ];
    protected $with=['user'];

    //Global Scope -> Execute PostScope Query in any Eloquent query of this Model
    protected static function booted()
    {
        static::addGlobalScope(new PostScope);
    }
    //Local Scope -> Execute this query if it call [Post::getUserPosts('1')->get();]
    public function scopeGetUserPosts($q,$user_id){
        return $q->where('user_id',$user_id);
    } 
    public function user(){
        return $this->belongsTo(User::class);
    }

}
