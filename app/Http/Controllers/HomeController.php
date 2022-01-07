<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Phpfastcache\Helper\Psr16Adapter;

use InstagramScraper\Exception\InstagramException;

use App\Models\Company;

use App\Models\Competitor;

use App\Models\Statistic;

use App\Models\Profile;

use App\Models\User;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //Admin Home page
    public function index()
    {

        $total_companies = Company::count();
        $total_competitors = Competitor::count();
        $total_users = User::count();

        return view('home', compact('total_companies', 'total_competitors', 'total_users'));
    }


    //Admin Companies page
    public function companies()
    {
        $companies = Company::all();

        return view('companies', compact('companies'));
    }


    //Admin Add New Company
    public function add_company(Request $request)
    {

        $company = new Company;

        $company->name = $request->company_name;

        $company->insta_email = $request->insta_email;

        $company->insta_username = $request->insta_username;

        $company->insta_password = $request->insta_password;

        $company->save();

        return redirect('/companies');
        
    }


    //Admin Delete Company
    public function delete_company($id)
    {
        $company = Company::find($id);

        $company->delete();

        return redirect('/companies');
        
    }



    //Admin Company page
    public function company_page($id)
    {
        $company = Company::find($id);

        $competitors = Competitor::where('company_id', $id)->get();

        $statistics = Statistic::where('company_id', $id)->get();

        return view ('/company', compact('company', 'competitors', 'statistics'));
        
    }


    //Admin Delete Competitor
    public function delete_competitor($id)
    {
        $competitor = Competitor::find($id);

        $competitor->delete();

        return back();
        
    }



    //Admin Add New Competitor
    public function add_competitor(Request $request)
    {

        $competitor = new Competitor;

        $competitor->name = $request->name;

        $competitor->insta_username = $request->insta_username;

        $competitor->company_id = $request->company_id;

        $competitor->save();

        return back();
        
    }



     //Admin Start Followers
     public function start_followers($id)
     {

         $competitor_id = DB::table('competitors')->where('id', $id)->value('id');


         $competitor_company_id = DB::table('competitors')->where('id', $id)->value('company_id');
 
 
         $competitor_username = DB::table('competitors')->where('id', $id)->value('insta_username');
 
 
         $company_username = DB::table('companies')->where('id', $competitor_company_id)->value('insta_username');
 
         $company_password = DB::table('companies')->where('id', $competitor_company_id)->value('insta_password');
 
 
 
     $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), $company_username, $company_password, new Psr16Adapter('Files'));
     $instagram->setUserAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:93.0) Gecko/20100101 Firefox/93.0');
     $instagram->login(true, false);
     $instagram->saveSession();
 
 
     sleep(12); // Delay to mimic user
 
     $username = $competitor_username;
     $followers = [];
     $account = $instagram->getAccount($username);
     sleep(1);

     $followers = $instagram->getFollowers($account->getId(), 400, 10, true);
 
 
 
     foreach($followers as $item) {
        
        $account = $instagram->getAccount($item['username']);
        
        $profile = new Profile;

        $profile->insta_id = $account->getId();

        $profile->insta_username = $account->getUsername();

        $profile->competitor_id = $competitor_id;

        $profile->company_id = $competitor_company_id;

        $profile->save();

 
 
     }

     return back();
 
 
 
     }



    //Admin Run Followers
    public function run_followers($id)
    {

        $competitor_id = DB::table('competitors')->where('id', $id)->value('id');


        $competitor_company_id = DB::table('competitors')->where('id', $id)->value('company_id');


        $competitor_username = DB::table('competitors')->where('id', $id)->value('insta_username');


        $company_username = DB::table('companies')->where('id', $competitor_company_id)->value('insta_username');

        $company_password = DB::table('companies')->where('id', $competitor_company_id)->value('insta_password');


        

    $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), $company_username, $company_password, new Psr16Adapter('Files'));
    $instagram->setUserAgent('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win32; x32; rv:78.0) Gecko/20100101 Firefox/78.0');
    $instagram->login(true, false);
    $instagram->saveSession();


    sleep(12); // Delay to mimic user

    $username = $competitor_username;
    $account = $instagram->getAccount($username);
    sleep(1);
    $profiles= Profile::where('competitor_id', $competitor_id)->where('company_id', $competitor_company_id)->where('profile_status', 'none')->get();
    
    foreach($profiles as $profile) {

    Profile::where('id', $profile->id)->update(['profile_status' => 'follow']);

    $instagram->follow($profile->insta_id);

    sleep(1);


    }



    }


    //Admin Run UnFollowers
    public function run_unfollowers($id)
    {

        $competitor_id = DB::table('competitors')->where('id', $id)->value('id');


        $competitor_company_id = DB::table('competitors')->where('id', $id)->value('company_id');


        $competitor_username = DB::table('competitors')->where('id', $id)->value('insta_username');


        $company_username = DB::table('companies')->where('id', $competitor_company_id)->value('insta_username');

        $company_password = DB::table('companies')->where('id', $competitor_company_id)->value('insta_password');


        

    $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), $company_username, $company_password, new Psr16Adapter('Files'));
    $instagram->setUserAgent('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:78.0) Gecko/20100101 Firefox/78.0');
    $instagram->login();
    $instagram->saveSession();


    sleep(2); // Delay to mimic user

    $username = $competitor_username;
    $followers = [];
    $account = $instagram->getAccount($username);
    sleep(1);
    $profiles= Profile::where('competitor_id', $competitor_id)->where('company_id', $competitor_company_id)->where('profile_status', 'follow')->get();
    
    set_time_limit(20);

    foreach($profiles as $profile) {

        Profile::where('id', $profile->id)->update(['profile_status' => 'unfollow']);

    $instagram->unfollow($profile->insta_id);

    sleep(1);


    }



    }


    //Run snapshot
    public function snapshot($id)
    {

        $company_id = DB::table('companies')->where('id', $id)->value('id');

        $company_insta_username = DB::table('companies')->where('id', $id)->value('insta_username');

        $account = (new \InstagramScraper\Instagram(new \GuzzleHttp\Client()))->getAccount($company_insta_username);


        $statistic = new Statistic;

        $statistic->followers = $account->getFollowedByCount();

        $statistic->follows = $account->getFollowsCount();

        $statistic->posts_number = $account->getMediaCount();

        $statistic->company_id = $company_id;

        $statistic->save();


        return back();

        // Available fields by Paomei Master :P
        //echo "Account info:\n";
        //echo "Id: {$account->getId()}\n";
        //echo "Username: {$account->getUsername()}\n";
        //echo "Full name: {$account->getFullName()}\n";
        //echo "Biography: {$account->getBiography()}\n";
        //echo "Profile picture url: {$account->getProfilePicUrl()}\n";
        //echo "External link: {$account->getExternalUrl()}\n";
        //echo "Number of published posts: {$account->getMediaCount()}\n";
        //echo "Number of followers: {$account->getFollowedByCount()}\n";
        //echo "Number of follows: {$account->getFollowsCount()}\n";
        //echo "Is private: {$account->isPrivate()}\n";
        //echo "Is verified: {$account->isVerified()}\n";


    }




}
