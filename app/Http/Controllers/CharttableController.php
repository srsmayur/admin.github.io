<?php

namespace App\Http\Controllers;

use App\User;
use App\helpers;
use Bllim\Datatables\Facade\Datatables;
use Carbon\Carbon;
use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use MongoDB\BSON\Javascript;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CharttableController extends Controller
{
    public function index()
    {
        return view('charttable');


    }
    public function readdata()
    {
        $charttbl = DB::table('tbl_comment')->get();
        return Datatables::class;
       // return Response::json(array("data" =>  $charttbl, "options" => [],"files" => [],"draw" => 16,"recordsTotal" => $charttbl->count(),"recordsFiltered" => $charttbl->count()));
    }
}