<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ExpertiseController extends Controller
{
    public function show(string $slug): View
    {
        $key = expertise_key($slug, app()->getLocale());

        abort_if($key === null, 404);

        return view('pages.expertise', [
            'key' => $key,
            'expertise' => config("ogsa.expertises.$key"),
            'content' => __("expertises.$key"),
        ]);
    }
}
