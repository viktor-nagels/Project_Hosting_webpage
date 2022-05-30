<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Domain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Domain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Domain query()
 * @mixin \Eloquent
 */
class Domain extends Model
{
    public function user(){
        return $this->hasMany('App\User', 'id', 'user_id');
    }
}
