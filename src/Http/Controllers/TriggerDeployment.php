<?php

namespace Davidsneal\LaravelNovaVercel\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Davidsneal\LaravelNovaVercel\Models\Deployment;

class TriggerDeployment extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function __invoke($notes)
    {
        $response = Http::post(config('laravel-nova-vercel.deploy_hook'));

        $json = $response->json();

        if ($json['job']) {
            Deployment::create([
                'job_id' => $json['job']['id'],
                'notes' => $notes,
                'user_id' => request()->user()->id,
            ]);
        }

        return response()->json($json);
    }
}
