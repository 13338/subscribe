<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function download($uuid)
    {
        $subscribe = Subscribe::where('file', $uuid)->firstOrFail();

        $subscribe->file = Str::uuid()->toString();
        $subscribe->save();

        $filename = storage_path('app/file.mp3');
        return response()->download($filename);
    }
}
