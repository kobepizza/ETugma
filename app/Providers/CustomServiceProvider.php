<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomServiceProvider extends EloquentUserProvider
{
    public function __construct($app, $config)
    {
        parent::__construct($app, $config);
        $this->model = \App\Models\UserProfile::class; // Update this to your custom model
    }
    
}