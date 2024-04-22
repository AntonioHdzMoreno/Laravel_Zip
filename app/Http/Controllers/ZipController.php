<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use ZipArchive;
use Illuminate\Filesystem\Filesystem;
class ZipController extends Controller
{
    public function  zipFile()
    {

    $fileb = new Filesystem;
    $fileb->cleanDirectory(public_path('zip'));

    $zip = new ZipArchive;

    $fileName = "download-filessdsssdsa.zip";

    if($zip->open($fileName,ZipArchive::CREATE))
    {
        $files = FacadesFile::files(public_path('files'));

        foreach($files as $file)
        {

            $nameInZipFile = basename($file);

            $zip->addFile($file,$nameInZipFile);

        }

        $zip->close();
    }


    return response()->download($fileName);
    }
}
