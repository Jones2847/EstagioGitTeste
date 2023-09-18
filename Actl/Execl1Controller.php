<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class Execl1Controller extends Controller
{
    public function ExcelDownload()
    {
        return view('backend.ExcelDownload.excelDownloadView');
    }


}
