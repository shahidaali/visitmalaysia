<?php

namespace Connectpx\LaravelBuilder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use Connectpx\LaravelBuilder\Facades\LaravelBuilder;

class LaravelBuilderController extends Controller
{
    public function snippets()
    {
        return view('laravelbuilder::snippets.snippets');
    }
}
