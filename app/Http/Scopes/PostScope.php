<?php
namespace App\Http\Scopes;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PostScope implements Scope{
    
    public function apply(Builder $builder,Model $model){
        $builder->where('created_at','>','2022-08-09');
    }
}