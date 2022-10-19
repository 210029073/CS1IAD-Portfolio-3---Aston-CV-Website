<?php

namespace App\Http\Controllers;

use App\Models\CVSs;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\cvs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\Promise\all;

class CVSController extends Controller
{
    protected $cvs;
    protected $fillable = [
            'name', 'email', 'password', 'keyprogramming', 'profile', 'education' ,'URLlinks'
        ];

    //this will find a specific ID
    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::check()) {
            //This will therefore find the corresponding
            //cvs details for that user based on their ID.

            $cvs = cvs::find($id);
            //return the instance of view
            return view('/cv', array('cvs' => $cvs));
        }

        else
        {
            return view('auth.login');
        }
    }

    //this will find a specific ID
    public function updateSingle($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::check()) {
            //This will therefore find the corresponding
            //cvs details for that user based on their ID.

            $cvs = cvs::find($id);
            //return the instance of view
            return view('/cv.updateSingle', array('cvs' => $cvs));
        }

        else
        {
            return view('auth.login');
        }
    }

    public function updateSingleCV(Request $request)
    {
        //Assign form inputs to variables
        //for database to reference
        $name = $request->input('name');
        $email = $request->input('email');
        $profile = $request->input('profile');
        $education = $request->input('education');
        $URLlinks = $request->input('URLlinks');
        $keyprogramming = $request->input('keyprogramming');

        $id = DB::table('cvs')->where('email', $email)->value('id');

        $cvs = cvs::find($id);

        //update record from database
        try {
            //retain the previous data, accordingly to the tables columns for each record
//            $name = DB::table('cvs')->where('email', $email)->value('name');
//            $education = DB::table('cvs')->where('email', $email)->value('education');
//            $profile = DB::table('cvs')->where('email', $email)->value('profile');
//            $URLlinks = DB::table('cvs')->where('email', $email)->value('URLlinks');
//            $keyprogramming = DB::table('cvs')->where('email', $email)->value('keyprogramming');

            //CHECKs Before Updating a record
            //check if there is any existing data for the corresponding records column
            //if all passes, then check if the current user input is not null
            //if passes then append the changes to the database
            //otherwise append changes without including the previous data from the column for
            //the corresponding row

//            if (!empty($education)) {
                DB::update('UPDATE cvs SET education = ? WHERE email = ?', [$education, $email]);
//            }

//            if(!empty($profile)) {
                DB::update('UPDATE cvs SET profile = ? WHERE email = ?', [$profile, $email]);
//            }

//            if (!empty($URLlinks)) {
                DB::update('UPDATE cvs SET URLlinks = ? WHERE email = ?', [$URLlinks, $email]);
//            }

//            if (!empty($keyprogramming)) {
                DB::update('UPDATE cvs SET keyprogramming = ? WHERE email = ?', [$keyprogramming, $email]);
//            }

            //show the message
            echo "<script>alert('Successfully updated the CV');window.location.replace('../{$id}')</script>";

//            dd($request->$cvs);
        }

        catch (QueryException $ex)
        {
            echo "<script>alert('Failed to update the CV, please check your details.');</script>";
        } finally {
            return view('cv.updateSingle', ['cvs' => $cvs]);
        }

    }


    public function showAll(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('/cv_collections', array('cvCollections' => cvs::all()));
    }

    public function showAllRecords(){
        if(Auth::check()) {
            $all = DB::table('cvs')
                ->select('*')
                ->simplePaginate(4);
            return view('viewall', compact('all'));
        }

        else {
            return  view('auth.login');
        }
    }

    public function querySearch(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $input = $request->input('search');

            if(Auth::check()) {
                $cvCollections = DB::table('cvs')
                    ->Where('name', 'LIKE', '%' . $input . '%')
                    ->orWhere('email', 'LIKE', '%' . $input . '%')
                    ->orWhere('keyprogramming', 'LIKE', '%' . $input . '%')
                    ->simplePaginate(3);

                $cvCollections->appends(['search' => $input]);
//                ->get();

                return view('cv_collections', compact('cvCollections'));
            }
            else{
                return view('auth.login');
            }

    }

    public function insertForm()
    {
        if(Auth::check()) {
            return view('/cv.create');
        }
        else
        {
            return view('auth.login');
        }
    }

    public function appendCV(Request $request)
    {
        //Assign form inputs to variables
        //for database to reference
        try {


            $name = $request->input('name');
            $email = $request->input('email');
            $profile = $request->input('profile');
            $education = $request->input('education');
            $URLlinks = $request->input('URLlinks');
            $keyprogramming = $request->input('keyprogramming');


            $data = Validator::make($request->all(), [
                'name' => 'required|string|min:3|max:100',
                'email' => 'required|email|max:100',
            ]);

            if($data->fails()) {
                return redirect('create')
                    ->withErrors($data)
                    ->withInput();
            }

            else {
                //store the new record to the database
                //bind the form data to the new record
                $cvDetails = array('name' => $name, 'email' => $email, 'profile' => $profile, 'education' => $education,
                    'URLlinks' => $URLlinks, 'keyprogramming' => $keyprogramming);

                DB::table('cvs')->insert($cvDetails);
//                cvs::query('INSERT INTO cvs WHERE ');

                echo "<script>alert('Successfully created a CV');</script>";
            }
        }

        catch (\Exception $ex)
        {
            echo "<script>alert('Failed to create a CV for $name, please check your details.');</script>";
        } finally {
            return view('cv.create');
        }


    }


    public function updateForm()
    {
        if(Auth::check()) {
            return view('cv.update');
        }
        else
        {
            return view('auth.login');
        }
    }

    public function updateCV(Request $request)
    {
        //Assign form inputs to variables
        //for database to reference
        $name = $request->input('name');
        $email = $request->input('email');
        $profile = $request->input('profile');
        $education = $request->input('education');
        $URLlinks = $request->input('URLlinks');
        $keyprogramming = $request->input('keyprogramming');



        //update record from database
        try {
            //retain the previous data, accordingly to the tables columns for each record
            $prevEducation = DB::table('cvs')->where('email', $email)->value('education');
            $prevProfile = DB::table('cvs')->where('email', $email)->value('profile');
            $prevURLlinks = DB::table('cvs')->where('email', $email)->value('URLlinks');
            $prevKeyProgram = DB::table('cvs')->where('email', $email)->value('keyprogramming');

            //CHECKs Before Updating a record
            //check if there is any existing data for the corresponding records column
            //if all passes, then check if the current user input is not null
            //if passes then append the changes to the database
            //otherwise append changes without including the previous data from the column for
            //the corresponding row

            if(!empty($prevEducation)) {
                if (!empty($education)) {
                    $education = "" . $education . ", " . $prevEducation;
                    DB::update('UPDATE cvs SET education = ? WHERE email = ?', [$education, $email]);
                }
            }

            else {
                $education = "" . $education;
                DB::update('UPDATE cvs SET education = ? WHERE email = ?', [$education, $email]);
            }

            if(!empty($prevProfile)) {
                if(!empty($profile)) {
                    $profile = "" . $profile . ", " . $prevProfile;
                    DB::update('UPDATE cvs SET profile = ? WHERE email = ?', [$profile, $email]);
                }
            }
            else {
                $profile = "" . $profile;
                DB::update('UPDATE cvs SET profile = ? WHERE email = ?', [$profile, $email]);
            }

            if(!empty($email)) {
                DB::update('UPDATE cvs SET email = ? WHERE name = ?', [$email, $name]);
            }

            if(!empty($prevURLlinks)) {
                if (!empty($URLlinks)) {
                    $URLlinks = "" . $URLlinks . ", " . $prevURLlinks;
                    DB::update('UPDATE cvs SET URLlinks = ? WHERE email = ?', [$URLlinks, $email]);
                }
            }

            else {
                $URLlinks = "" . $URLlinks;
                DB::update('UPDATE cvs SET URLlinks = ? WHERE email = ?', [$URLlinks, $email]);
            }

            if(!empty($prevKeyProgram)) {
                if (!empty($keyprogramming)) {
                    $keyprogramming = "" . $keyprogramming . ", " . $prevKeyProgram;
                    DB::update('UPDATE cvs SET keyprogramming = ? WHERE email = ?', [$keyprogramming, $email]);
                }
            }
            else {
                $keyprogramming = "" . $keyprogramming;
                DB::update('UPDATE cvs SET keyprogramming = ? WHERE email = ?', [$keyprogramming, $email]);
            }

            //show the message
            echo "<script>alert('Successfully updated the CV');</script>";
        }

        catch (QueryException $ex)
        {
            echo "<script>alert('Failed to update the CV, please check your details.');</script>";
        } finally {
            return view('cv.update');
        }

    }

    public function updateSearch(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $input = $request->input('search');

        if(Auth::check()) {
            $record = DB::table('cvs')
                ->Where('email', 'LIKE', '%' . $input . '%');


            return view('cv.update', compact('record'));
        }
        else{
            return view('auth.login');
        }

    }

}
