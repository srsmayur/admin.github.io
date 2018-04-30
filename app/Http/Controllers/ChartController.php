<?php

namespace App\Http\Controllers;

use App\User;
use App\helpers;
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

class ChartController extends Controller
{
    public function index(){
        return view('charts');
    }
    public function readdata(){
        if ( !empty ( $_GET['from_date'] ) &&  ( $_GET['to_date'] )) {

            $date_from =  $_GET['from_date'];
            $date_to =  $_GET['to_date'];

            $from_date = date('Y-m-d H:i:s',strtotime($date_from));
            $to_date = date('Y-m-d H:i:s',strtotime($date_to));

            $current = DB::table('csv_chart')
                ->select('MWCT_BR_001_ACT','MWCT_BR_002_ACT',DB::raw('round(MWCT_BR_001_ACT,2) as MWCT_BR_003_ACT'),'MWCT_PR_001_ACT','MWCT_DS_001_ACT','MWCT_DS_002_ACT',DB::raw('round(MWCT_DS_003_ACT,2) as MWCT_DS_003_ACT'),DB::raw('round(MWCT_DS_004_ACT,2) as MWCT_DS_004_ACT'),'MWCT_DS_005_ACT','MWCT_DS_006_ACT',DB::raw('CONCAT(Date," ",Time) as datetime'))
                ->whereBetween(DB::raw('CONCAT(Date," ",Time)'),array($from_date,$to_date))
                ->orderby('datetime')
                ->get();
            return Response::json(array("status" => "success", "data" =>  $current));
        }
        else
        {
            return redirect('charts')->with('danger', true)->with('message','Please Select Some Data to create chart');
        }
    }
    public function comment_box(){
        $data = Input::all();


        $title = $data['title'];
        $category = $data['cate'];
        $comment = $data['comment'];
        $chartname = $data['charttitle'];
        $start_date = date('Y-m-d H:i:s',strtotime($data['startdate']));
        $end_date = date('Y-m-d H:i:s',strtotime($data['enddate']));
        $image_data = $data['image'];

        $png_url = date('m-d-Yhis').$title.".png";
        $dbpath = "/chart/".$png_url;
        $path = public_path() . $dbpath;
        $img = substr($image_data, strpos($image_data, ",")+1);
        $image = base64_decode($img);
        $success = file_put_contents($path, $image);


        DB::table('tbl_comment')->insert(
            array(
                'title'     =>   $title,
                'category'   =>   $category,
                'tag_name'   => $chartname,
                'comment' => $comment,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'image' => $dbpath,
                'create_at' => now(),
            )
        );

        $create_id = DB::getPdo()->lastInsertId();
        if($create_id)
        {
            return Redirect::back();
        }
    }

}