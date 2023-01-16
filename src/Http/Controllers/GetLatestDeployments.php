<?php

namespace Davidsneal\LaravelNovaVercel\Http\Controllers;

use App\Http\Controllers\Controller;
use Davidsneal\LaravelNovaVercel\Models\Deployment;
use Davidsneal\LaravelNovaVercel\Http\Resources\DeploymentResource;

class GetLatestDeployments extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function __invoke()
    {
        $deployments = Deployment::orderBy('created_at', 'desc')
            ->limit(config('laravel-nova-vercel.latest_limit'))
            ->get();

        $deployments = $deployments->map(function ($deployment) {
            return ['model' => $deployment];
        });

        DeploymentResource::withoutWrapping();

        return DeploymentResource::collection($deployments);
    }
}
