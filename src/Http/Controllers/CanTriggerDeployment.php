<?php

namespace Davidsneal\LaravelNovaVercel\Http\Controllers;

use App\Http\Controllers\Controller;
use Davidsneal\LaravelNovaVercel\Models\Deployment;

class CanTriggerDeployment extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function __invoke()
    {
        $deployment = Deployment::orderBy('created_at', 'desc')
            ->first();

        $can = !$deployment || $deployment->created_at < now()->subMinutes(config('laravel-nova-vercel.throttle'));

        if (!$can) {
            $wait = $deployment->created_at->diffInMinutes(now()->subMinutes(config('laravel-nova-vercel.throttle')));
        }

        return response()->json([
            'can' => $can,
            'wait' => $wait ?? null,
            'throttle' => config('laravel-nova-vercel.throttle'),
        ]);
    }
}
