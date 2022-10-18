<?php

use Illuminate\Support\Str;

function uploadfile($request, $namefolder)
{
    if (request()->hasFile($request)) {
        $folder = $namefolder . date("y");
        $name = Str::random(5);
        $extension = request()->file($request)->extension();
        $url = request()->file($request)->storeAs($folder, "$name." . $extension);
        return $url;
    }
}

function updateFile($request, $namefolder, $data)
{
    if (request()->hasFile($request)) {
        deleteFIle($data);
        $folder = $namefolder . date("y");
        $name = Str::random(5);
        $extension = request()->file($request)->extension();
        $url = request()->file($request)->storeAs($folder, "$name." . $extension);
        return $url;
    }
}

function deleteFIle($file)
{
    if ($file) {
        $path = public_path($file);
        if (file_exists($path)) {
            unlink($path);
            return true;
        }
    }
}

