<?php

return [
    'deploy_hook' => env('VERCEL_DEPLOY_HOOK'),
    'latest_limit' => 5,
    'throttle' => env('VERCEL_THROTTLE', 10),
    'user_model' => \App\Models\User::class,
];
