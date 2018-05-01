<?php

namespace App\Http\Controllers;


use App\Models\DataTableSql;
use App\User;
use App\helpers;


use Bllim\Datatables\Datatables;
use Carbon\Carbon;
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
use \Bllim\Datatables\Facade;

class CharttableController extends Controller
{
    public function index()
    {
        return view('charttable');


    }
    public function readdata()
    {
        $charttbl = DB::table('tbl_comment')->select(array('title','category','tag_name','start_date','end_date','image'));

        return Facade\Datatables::of($charttbl)->make();
    }
}