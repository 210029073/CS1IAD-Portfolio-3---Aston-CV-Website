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
    protected $fillable = [
            'name', 'email', 'password', 'keyprogramming', 'profile', 'education' ,'URLlinks'
        ];

    //this will find a specific ID
    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::check()) {
            //This will therefore find the corresponding
            //cvs details for that user based on their ID.

            $cv = cvs::find($id);
            //return the instance of view
            return view('/cv', array('cvs' => $cv));
        }

        else
        {
            return view('auth.login');
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
                cvs::query('INSERT INTO cvs WHERE ');

                echo "<script>alert('Successfully created a CV');</script>";
            }
        }

        catch (\Exception $ex)
        {
            echo "<script>alert('Failed to create a CV, please check your details.');</script>";
        }  finally {
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
            //try to retain the previous data
            $prevEducation = DB::table('cvs')->where('email', $email)->value('education');
            $prevProfile = DB::table('cvs')->where('email', $email)->value('profile');
            $prevURLlinks = DB::table('cvs')->where('email', $email)->value('URLlinks');
            $prevKeyProgram = DB::table('cvs')->where('email', $email)->value('keyprogramming');

            //place the new education details on top of the previous details
            if(!empty($education) || !empty($profile) || !empty($URLlinks) || !empty($keyprogramming)) {
                $education = "" . $education . ", " . $prevEducation;
                $profile = "" . $profile . ", " . $prevProfile;
                $URLlinks = "" . $URLlinks . ", " . $prevURLlinks;
                $keyprogramming = "" . $keyprogramming . ", " . $prevKeyProgram;
            }

            if(empty($education) || empty($profile) || empty($URLlinks) || empty($keyprogramming)) {
                $education = "" . $education;
                $profile = "" . $profile;
                $URLlinks = "" . $URLlinks;
                $keyprogramming = "" . $keyprogramming;
            }

//            dd($education);

            //update the records
//            DB::update('UPDATE cvs SET name = ? WHERE email = ?', [$name, $email]);
            DB::update('UPDATE cvs SET email = ? WHERE name = ?', [$email, $name]);
            DB::update('UPDATE cvs SET profile = ? WHERE email = ?', [$profile, $email]);
            DB::update('UPDATE cvs SET education = ? WHERE email = ?', [$education, $email]);
            DB::update('UPDATE cvs SET URLlinks = ? WHERE email = ?', [$URLlinks, $email]);
            DB::update('UPDATE cvs SET keyprogramming = ? WHERE email = ?', [$keyprogramming, $email]);

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
