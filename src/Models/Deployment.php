<?php

namespace Davidsneal\LaravelNovaVercel\Models;

use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'deployments';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * The user that triggered the deployment.
     */
    public function user()
    {
        return $this->belongsTo(config('laravel-nova-vercel.user_model'), 'user_id', 'id')
            ->withTrashed();
    }
}
