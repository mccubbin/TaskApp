<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'tasks/update-priorities'
    ];

    public function terminate($request, $response)
    {
        if (\App\Models\User::count() == 0) {
            \App\Models\User::factory()->count(10)->create();
            //file_put_contents('terminate.text', "factory run");
        }
        if (\App\Models\Task::count() == 0) {
            \App\Models\Task::factory()->count(30)->create();
        }

    }
}
