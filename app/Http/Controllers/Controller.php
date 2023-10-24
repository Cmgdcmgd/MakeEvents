<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
use App\Mail\MailNotify;
use App\Models\User;
use App\Models\Venues;
use App\Models\Coordinators;
use App\Models\Eventbooking;
use App\Models\Coordinatorbooking;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard(){


        $authenticateduser = User::where('id',auth()->user()->id)->first();

        if($authenticateduser->user_type == "Customer"){
            return redirect('/chatify');
        }
        else{

            session(['name' => $authenticateduser->name]);
            session(['user_type' => $authenticateduser->user_type]);
            session(['userid' => auth()->user()->id]);
            session(['profpic' => $authenticateduser->profile_picture]);
        
            return view('admin.dashboard');
        }

        
    }

    public function adduser(Request $data){
        
        $data->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'contact_number'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
            'user_type' => 'required',
        ],
        [
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'contact_number.required' => 'Contact number is required',
            'email.required' => 'Email Address is required',
            'email.email' => 'Please input a valid email address',
            'email.unique' => 'User already existing. Please input a different email address.',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm password is required',
            'user_type.required' => 'User Type is required'
        ]);

        if(!empty($data['profpic'])){
            $file = $data->file('profpic');
            $file->move(public_path('/admin/images/users'), $file->getClientOriginalName());
        }

        User::addUser($data);

        return redirect('/newuser')->with('message', 'User successfully added!');

    }

    public function userslist(){

        $data = User::all();

        return view('admin.usersList',compact('data'));
    }

    public function useredit($id){
        
        $user = User::where('id',$id)->first();
        
        return view('admin.userEdit',compact('user'));
    }

    public function editUser(Request $data){

        if($data['user_type'] == "Administrator"){

            if(!empty($data['profpic'])){

                $file = $data->file('profpic');
                $fileName = $file->getClientOriginalName();
    
                $data->file('profpic')->move(public_path('/admin/images/users'), $fileName);
                
            }
    
            User::editUser($data);
    
        }
        else{

            $data->validate([
                'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'contact_number'=> 'required',
                'email' => 'required|email|',
                'user_type' => 'required',
            ],
            [
                'first_name.required' => 'First Name is required',
                'last_name.required' => 'Last Name is required',
                'contact_number.required' => 'Contact number is required',
                'email.required' => 'Email Address is required',
                'email.email' => 'Please input a valid email address',
                'email.unique' => 'User already existing. Please input a different email address.',
                'user_type.required' => 'User Type is required'
            ]);

            if(!empty($data['profpic'])){

                $file = $data->file('profpic');
                $fileName = $file->getClientOriginalName();
    
                $data->file('profpic')->move(public_path('/admin/images/users'), $fileName);
                
            }
        
            User::editUser($data);
        }

        
        return redirect('/userslist')->with('message', 'User successfully edited!');

    }

    public function deleteUser(Request $data){

        User::where('user_id',$data['id'])->delete();

    }

    public function addvenue(Request $data){

        $mainPhoto = $data->file('main_photo');
        $mainPhoto->move(public_path('/mainpage/main photos'), $mainPhoto->getClientOriginalName());
        $mainPhotoName = $mainPhoto->getClientOriginalName();

        $additionalPics = [];
        
        foreach($data->file('additional_photos') as $file){
            $file->move(public_path('/mainpage/additional photos'), $file->getClientOriginalName());
            array_push($additionalPics,$file->getClientOriginalName());
        }

        $additionalPhotos = implode(",",$additionalPics);

        Venues::addVenue($data,$mainPhotoName,$additionalPhotos);
      
        return redirect('/newvenue')->with('message', 'Venue successfully added!');
    }

    public function index(){

        $venues = Venues::all();
        $coordinators = DB::table('users')
                        ->join('coordinators','users.id','=','coordinators.user_id')
                        ->select('users.*','coordinators.*')
                        ->where('user_type','Event Coordinator')
                        ->get();

        return view('mainpage.index',compact('venues','coordinators'));
    }

    public function venuedetails($id){
        
        $data = Venues::where('venue_id',$id)->first();

        return view('mainpage.venuedetails',compact('data'));
    }

    public function venueslist(){

        if(session('user_type') == "Administrator"){
            $data = Venues::all();
        }
        else{
            $data = DB::table('venues')
                ->select('*')
                ->where('user_id',session('userid'))
                ->get();
        }
        
        return view('admin.venuesList',compact('data'));
    }

    public function venueedit($id){
        
        $venue = Venues::where('venue_id',$id)->first();
        
        return view('admin.venueEdit',compact('venue'));
    }

    public function editvenue(Request $data){

        if(!empty($data['main_photo'])){

            $mainphoto = Venues::where('venue_id',$data['venue_id'])->first();

            File::delete("mainpage/main photos/".$mainphoto->main_photo);

            $mainPhoto = $data->file('main_photo');
            $mainPhoto->move(public_path('/mainpage/main photos'), $mainPhoto->getClientOriginalName());

        }

        if(!empty($data['additional_photos'])){
            $otherpics = Venues::where('venue_id',$data['venue_id'])->first();

            $otherphotos = explode(",",$otherpics->additional_photos);

            for($x = 0; $x < count($otherphotos); $x++){
                File::delete("mainpage/additional photos/".$otherphotos[$x]);
            }

            $additionalPics = [];
        
            foreach($data->file('additional_photos') as $file){
                $file->move(public_path('/mainpage/additional photos'), $file->getClientOriginalName());
            }

        }

        Venues::editVenue($data);

        return redirect('venueslist')->with('message','Venue successfully edited');

    }

    public function deleteVenue(Request $data){

        DB::table('venues')->where('venue_id', $data['id'])->delete();


    }

    public function coordinatorslist(){

        if(session('user_type') == "Administrator"){
            $users = DB::table('coordinators')
            ->join('users','users.id','=','coordinators.user_id')
            ->select('coordinators.*','users.*')
            ->get();
        }
        else{
            $users = DB::table('coordinators')
                ->join('users','users.id','=','coordinators.user_id')
                ->select('coordinators.*','users.*')
                ->where('coordinators.user_id',session('userid'))
                ->get();
        }
        
        return view('admin.coordinatorsList',compact('users'));
    }

    public function coordinatoredit($id){

        $coordinator = DB::table('coordinators')
                ->join('users','users.id','=','coordinators.user_id')
                ->select('coordinators.*','users.*')
                ->where('coordinators.user_id',session('userid'))
                ->first();
        
        
        return view('admin.coordinatorEdit',compact('coordinator'));
    }

    public function coordinatorprofilemanagement(Request $data){

        if(!empty($data['profpic'])){
            $file = $data->file('profpic');
            $file->move(public_path('/admin/images/users'), $file->getClientOriginalName());
        }

        if(!empty($data['main_photo'])){

            $mainPhoto = $data->file('main_photo');
            $mainPhoto->move(public_path('/mainpage/coordinators/main photos'), $mainPhoto->getClientOriginalName());

        }

        if(!empty($data['additional_photos'])){
        
            foreach($data->file('additional_photos') as $file){
                $file->move(public_path('/mainpage/coordinators/additional photos'), $file->getClientOriginalName());
            }
        }

        User::editCoordinator($data);

        Coordinators::addOrUpdateCoordinator($data);

        return redirect('/coordinatoredit/'.$data['user_id'])->with('message','Profile Successfully Edited!');

    }

    public function coordinatordetails($id){
        
        $data = DB::table('users')
                ->join('coordinators','users.id','=','coordinators.user_id')
                ->select('coordinators.*','users.*')
                ->where('coordinators.coordinator_id',$id)
                ->first();

        return view('mainpage.coordinatordetails',compact('data'));
    }

    public function allvenues(){

        $data = Venues::all();

        return view('mainpage.allevents',compact('data'));
    }

    public function allcoordinators(){

        $data = DB::table('users')
                ->join('coordinators','users.id','=','coordinators.user_id')
                ->select('coordinators.*','users.*')
                ->where('users.user_type','Event Coordinator')
                ->get();

        return view('mainpage.allcoordinators',compact('data'));
    }

    public function eventbooking(Request $request){

        $users = User::where('id',$request['user_id'])->first();

        $venues = Venues::where('venue_id',$request['venue_id'])->first();

        $body1 = "Hi, ".$users->first_name."!";
        $body2 = "Thank you for booking with us! To fully reserve your venue, please pay the ₱".$venues->price." fee to the bank details below: ";
        $bankdetails = $venues->bank;
        $body3 =  "Please do not reply to this message. This email was sent from a notification-only email address that cannot accept incoming email.";
        
        $data = [
            'subject' => 'Booking Confirmation from Make Events',
            'body1' => $body1,
            'body2' => $body2,
            'body3' => $body3,
            'bankdetails' => $bankdetails
        ];

        Mail::to($users->email)->send(new MailNotify($data));
        
        Eventbooking::newBooking($request);

        return redirect('/')->with('message', 'Successfully Booked!');
    }

    public function logincustomer(Request $data){

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            
            $data->session()->regenerate();

            $request = User::where('email',$data['email'])->first();
            $data->session()->put('logged', true);
            $data->session()->put('user_id', $request->id);
            $data->session()->put('profpic', $request->profile_picture);

            return redirect('/')->with('message', 'Welcome!');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function customerlogout(Request $data){

        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('message', 'Logout Successful');
    }

    public function addcustomer(Request $data){

        $data->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'contact_number'=> 'required',
            'email_address' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ],
        [
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'contact_number.required' => 'Contact number is required',
            'email_address.required' => 'Email Address is required',
            'email_address.email' => 'Please input a valid email address',
            'email_address.unique' => 'User already existing. Please input a different email address.',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm password is required'
        ]);

        User::addCustomer($data);

        
        return redirect('/customerlogin')->with('message', 'Successfully Registered');
    }

    public function adminlogin(Request $data){
        
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'user_type' => 'Administrator'])) {
            
            $data->session()->regenerate();

            $request = User::where('email',$data['email'])->first();
            $data->session()->put('logged', true);
            $data->session()->put('user_id', $request->user_id);
            

            return redirect('/dashboard')->with('message', 'Welcome!');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function pendingpayments(){

        $data = DB::table('eventbooking')
                ->join('venues','eventbooking.venue_id','=','venues.venue_id')
                ->join('users','eventbooking.user_id','=','users.id')
                ->select('eventbooking.*','venues.*','users.*')
                ->where('eventbooking.reservation_status','Pending Payment')
                ->where('venues.user_id',session('userid'))
                ->get();


        return view('admin.pendingpayments', compact('data'));
    }

    public function pendingpaymentscoordinator(){

        if(session('user_type') == "Administrator"){
            $data = DB::table('coordinatorbooking')
                ->join('users','coordinatorbooking.booked_by','=','users.id')
                ->select('coordinatorbooking.*','users.*')
                ->where('coordinatorbooking.reservation_status','Pending Payment')
                ->get();
        }

        $data = DB::table('coordinatorbooking')
                ->join('users','coordinatorbooking.booked_by','=','users.id')
                ->select('coordinatorbooking.*','users.*')
                ->where('coordinatorbooking.reservation_status','Pending Payment')
                ->where('coordinatorbooking.coordinator_id',session('userid'))
                ->get();


        return view('admin.pendingpaymentscoordinator', compact('data'));
    }

    public function confirmpayment(Request $data){

        Eventbooking::confirmPayment($data);

    }

    public function confirmpaymentcoordinator(Request $data){

        Coordinatorbooking::confirmPayment($data);

    }

    public function adminlogout(){

        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/administrator')->with('message', 'Logout Successful');
    }

    public function eventscalendar(){

        $bookings = DB::table('eventbooking')
                    ->join('venues','eventbooking.venue_id','=','venues.venue_id')
                    ->join('users','eventbooking.user_id','=','users.id')
                    ->select('eventbooking.*','venues.*','users.*')
                    ->where('eventbooking.reservation_status','Reserved')
                    ->where('venues.user_id',session('userid'))
                    ->get();

        if(count($bookings) >= 1){
            foreach($bookings as $booking){
                $events[] = [
                    'id' => $booking->eventbooking_id,
                    'title' => $booking->first_name." ".$booking->last_name,
                    'reserved' => $booking->reserved_date,
                    'email' => $booking->email,
                    'start' => $booking->reserved_date,
                    'location' => $booking->location,
                    'phone' =>$booking->contact_number,
                    'end' => $booking->reserved_date
                ];
            }
        }
        else{
            $events = [];
        }
        

        return view('admin.eventscalendar', compact('events'));
    }

    public function coordinatorcalendar(){

        $bookings = DB::table('coordinatorbooking')
                ->join('users','coordinatorbooking.booked_by','=','users.id')
                ->select('coordinatorbooking.*','users.*')
                ->where('coordinatorbooking.reservation_status','Reserved')
                ->where('coordinatorbooking.coordinator_id',session('userid'))
                ->get();

        
        if(count($bookings) >= 1){
            foreach($bookings as $booking){
                $events[] = [
                    'id' => $booking->coordinatorbooking_id,
                    'title' => $booking->first_name." ".$booking->last_name,
                    'reserved' => $booking->reserved_date,
                    'email' => $booking->email,
                    'start' => $booking->reserved_date,
                    'phone' =>$booking->contact_number,
                    'end' => $booking->reserved_date
                ];
            }
        }
        else{
            $events = [];
        }
        

        return view('admin.coordinatorcalendar', compact('events'));
    }

    public function updateevent(Request $request ,$id){

        $booking = Eventbooking::where('eventbooking_id',$id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        
        Eventbooking::updateEvent($request->start_date,$id);

        return response()->json('Event updated');
    }

    public function eventcancel(Request $data){

        Eventboking::eventCancel($data);
    }

    public function updatecoordinatorevent(Request $request ,$id){

        $booking = Coordinatorbooking::where('coordinatorbooking_id',$id);
        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        
        Coordinatorbooking::updateEvent($request->start_date,$id);

        return response()->json('Event updated');
    }

    public function broadcast(Request $request)
    {
        dd($request);
        broadcast(new PusherBroadcast($request->get('message')))->toOthers();

        return view('admin.broadcast', ['message' => $request->get('message')]);
    }


    public function receive(Request $request)
    {
        return view('admin.receive', ['message' => $request->get('message')]);
    }

    public function coordinatorbooking(Request $request){

        $users = User::where('id',$request['user_id'])->first(); //session

        $coordinators = User::where('id',$request['coordinator_id'])->first(); //user id

        $coordinatorsprice = Coordinators::where('user_id',$request['coordinator_id'])->first();

        $body1 = "Hi, ".$users->first_name."!";
        $body2 = "Thank you for booking a coordinator! To fully reserve your coordinator, please pay the ₱".$coordinatorsprice->price." fee to the bank details below: ";
        $bankdetails = $coordinatorsprice->bank;
        $body3 =  "Please do not reply to this message. This email was sent from a notification-only email address that cannot accept incoming email.";
        
        $data = [
            'subject' => 'Booking Confirmation from Make Events',
            'body1' => $body1,
            'body2' => $body2,
            'body3' => $body3,
            'bankdetails' => $bankdetails
        ];

        Mail::to($users->email)->send(new MailNotify($data));
        
        Coordinatorbooking::newBooking($request);

        return redirect('/')->with('message', 'Successfully Booked!');

    }

    public function filtervenues(Request $request){

        if(!empty($request['maxprice'])){
            if(!empty($request['location'])){
                $data = DB::table('venues')
                        ->select('*')
                        ->where('price', '<=', $request['maxprice'])
                        ->where('location', 'LIKE', '%'.$request['location'].'%')
                        ->get();
            }
            else{

                $data = DB::table('venues')
                        ->where('price', '<=', $request['maxprice'])
                        ->select('*')
                        ->get();

            }
        }
        else{
            if(!empty($request['location'])){
                $data = DB::table('venues')
                        ->select('*')
                        ->where('location', 'LIKE', '%'.$request['location'].'%')
                        ->get();
            }
            else{
                $data = DB::table('venues')
                        ->select('*')
                        ->get();
            }
        }

        

        return view('mainpage.allevents',compact('data'));
    }

    public function myprofile(){

        $user = User::where('id',session('user_id'))->first();

        return view('mainpage.myprofile', compact('user'));
    }

    public function editprofile(){

        $user = User::where('id',session('user_id'))->first();

        return view('mainpage.editprofile', compact('user'));
    }

    public function editcustomer(Request $data){

        $profpic = session('profpic');

        if(!empty($data['profpic'])){
           
            $file = $data->file('profpic');
            $fileName = $file->getClientOriginalName();
            
            $data->file('profpic')->move(public_path('/admin/images/users'), $fileName);

            $profpic = $fileName;
        }

        User::editCustomer($data);

        \Session::forget('profpic');

        session(['profpic' => $profpic]);

        return redirect('/myprofile');
    }

    public function aboutus(){

        return view('mainpage.aboutus');
    }
    
    public function test(){

        return view('admin.test');
    }


}
