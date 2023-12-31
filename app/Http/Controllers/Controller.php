<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Session;
use Mail;
use App\Mail\MailNotify;
use App\Models\User;
use App\Models\Venues;
use App\Models\Coordinators;
use App\Models\CoordinatorsEvents;
use App\Models\CoordinatorsAlbums;
use App\Models\Eventbooking;
use App\Models\Coordinatorbooking;
use App\Models\VenuesAlbums;
use App\Models\VenuesAmeneties;
use App\Models\VenuesEvents;
use App\Models\VenuesServices;
use App\Models\VenuesFacilities;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Services\OTP\Types\EmailOTP;
use App\Services\OTP\OTPService;
use Faker\Core\Coordinates;

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

        
        return redirect('/dashboard')->with('message', 'User successfully edited!');

    }

    public function deleteUser(Request $data){

        DB::table('users')->where('id', $data['id'])->delete();

    }

    public function addvenue(Request $data){

        $mainPhoto = $data->file('main_photo');
        $mainPhoto->move(public_path('/mainpage/main photos'), $mainPhoto->getClientOriginalName());
        $mainPhotoName = $mainPhoto->getClientOriginalName();

        // $packagePhoto = $data->file('package_photo');
        // $packagePhoto->move(public_path('/mainpage/main photos'), $packagePhoto->getClientOriginalName());
        // $packagePhotoName = $packagePhoto->getClientOriginalName();
        
        $packagePhotos = [];
        
        foreach($data->file('package_photos') as $file){
            $file->move(public_path('/mainpage/main photos'), $file->getClientOriginalName());
            array_push($packagePhotos,$file->getClientOriginalName());
        }

        $packagePhotos = implode(",",$packagePhotos);

        $additionalPics = [];
        
        foreach($data->file('additional_photos') as $file){
            $file->move(public_path('/mainpage/additional photos'), $file->getClientOriginalName());
            array_push($additionalPics,$file->getClientOriginalName());
        }

        $additionalPhotos = implode(",",$additionalPics);

        $id = Venues::addVenue($data,$mainPhotoName,$additionalPhotos,$packagePhotos);
        
        if($data['events_offered'] != null) {
            foreach ($data['events_offered'] as $key => $event) {
                $venueEvent = new VenuesEvents;
                $venueEvent->venue_id = $id;
                $venueEvent->event_name = ucfirst($event);
                $venueEvent->save();
            }
        }
        if($data['services_offered'] != null) {
            foreach ($data['services_offered'] as $key => $service) {
                $venueService = new VenuesServices;
                $venueService->venue_id = $id;
                $venueService->service_name = ucfirst($service);
                $venueService->save();
            }
        }
        if($data['amenities_offered'] != null) {
            foreach ($data['amenities_offered'] as $key => $amenity) {
                $venueAmenity = new VenuesAmeneties;
                $venueAmenity->venue_id = $id;
                $venueAmenity->amenity_name = ucfirst($amenity);
                $venueAmenity->save();
            }
        }

        return redirect('/venueslist')->with('message', 'Venue successfully added!');
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

    public function newvenue()
    {
        $events = VenuesEvents::all()->unique('event_name');
        $services = VenuesServices::all()->unique('service_name');
        $amenities = VenuesAmeneties::all()->unique('amenity_name');

        return view('admin.newVenue', compact('events', 'services', 'amenities'));
    }

    public function venuedetails($id){
        
        $data = Venues::with(['venueAlbums', 'venueFacilities', 'venueAmenities', 'venueEvents', 'venueServices', 'venueUser'])->where('venue_id', $id)->first();

        //dd($data);
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

    public function facilitylist($id){

        $venue = Venues::where('venue_id', $id)->first();
        $data = DB::table('venues_facilities')
            ->select('*')
            ->where('venue_id',$id)
            ->get();
       
        return view('admin.facilityList',compact('data', 'venue'));
    }

    public function newfacility($id){
        $venue = Venues::where('venue_id', $id)->first();
        return view('admin.newfacility',compact('venue'));
    }

    public function addfacility(Request $data)
    {
        $photo = $data->file('photo');
        $photo->move(public_path('/mainpage/facilities'), $photo->getClientOriginalName());
        $facilityPhoto = $photo->getClientOriginalName();

        $facility = new VenuesFacilities();
        $facility->title = $data['title'];
        $facility->venue_id = $data['venue_id'];
        $facility->photo = $facilityPhoto;
        $facility->save();

        $venue = Venues::where('venue_id', $data['venue_id'])->first();

        return redirect('/venuefacilitylist/'.$venue->venue_id)->with('message', 'Facility successfully added!');

    }

    public function deletefacility(Request $data)
    {
        $facility = VenuesFacilities::where('id', $data['id'])->first();
        File::delete("mainpage/facilities/".$facility->photo);
        $facility->delete();

    }

    public function coordinatoralbumlist($id){

        $coordinator = Coordinators::with('coordinatorUser')->where('coordinator_id', $id)->first();
        $data = DB::table('coordinators_albums')
            ->select('*')
            ->where('coordinator_id',$id)
            ->get();
       
        return view('admin.coordinatoralbumlist',compact('data', 'coordinator'));
    }

    public function newcoordinatoralbum($id){
        $coordinator = Coordinators::where('coordinator_id', $id)->first();
        return view('admin.newcoordinatoralbum',compact('coordinator'));
    }

    public function addcoordinatoralbum(Request $data) 
    {
        $photos = [];
        
        foreach($data->file('photos') as $file){
            $file->move(public_path('/mainpage/coordinators/albums'), $file->getClientOriginalName());
            array_push($photos,$file->getClientOriginalName());
        }

        $photos = implode(",",$photos);

        $album = new CoordinatorsAlbums();
        $album->title = $data['title'];
        $album->coordinator_id = $data['coordinator_id'];
        $album->photos = $photos;
        $album->save();

        // $venue = Venues::where('venue_id', $data['venue_id'])->first();

        return redirect('/coordinatoralbumlist/'.$data['coordinator_id'])->with('message', 'Album successfully added!');
    }

    public function deletecoordinatoralbum(Request $data)
    {
        $album = CoordinatorsAlbums::where('id', $data['id'])->first();
        $otherphotos = explode(",", $album->photos);
            for($x = 0; $x < count($otherphotos); $x++){
                File::delete("mainpage/coordinators/albums".$otherphotos[$x]);
            }
        $album->delete();

    }

    

    public function albumlist($id){

        $venue = Venues::where('venue_id', $id)->first();
        $data = DB::table('venues_albums')
            ->select('*')
            ->where('venue_id',$id)
            ->get();
       
        return view('admin.albumlist',compact('data', 'venue'));
    }

    public function newalbum($id){
        $venue = Venues::where('venue_id', $id)->first();
        return view('admin.newalbum',compact('venue'));
    }

    public function addalbum(Request $data)
    {
        $photos = [];
        
        foreach($data->file('photos') as $file){
            $file->move(public_path('/mainpage/albums'), $file->getClientOriginalName());
            array_push($photos,$file->getClientOriginalName());
        }

        $photos = implode(",",$photos);

        $album = new VenuesAlbums();
        $album->title = $data['title'];
        $album->venue_id = $data['venue_id'];
        $album->photos = $photos;
        $album->save();

        $venue = Venues::where('venue_id', $data['venue_id'])->first();

        return redirect('/albumlist/'.$venue->venue_id)->with('message', 'Album successfully added!');

    }

    public function deletealbum(Request $data)
    {
        $album = VenuesAlbums::where('id', $data['id'])->first();
        $otherphotos = explode(",", $album->photos);
            for($x = 0; $x < count($otherphotos); $x++){
                File::delete("mainpage/albums/".$otherphotos[$x]);
            }
        $album->delete();

    }

    public function venueedit($id){
        
        $venue = Venues::where('venue_id',$id)->first();
        $venueEvents = VenuesEvents::where('venue_id', $id)->pluck('event_name')->toArray();
        $venueServices = VenuesServices::where('venue_id', $id)->pluck('service_name')->toArray();
        $venueAmenities = VenuesAmeneties::where('venue_id', $id)->pluck('amenity_name')->toArray();

        $events = VenuesEvents::all()->unique('event_name');
        $services = VenuesServices::all()->unique('service_name');
        $amenities = VenuesAmeneties::all()->unique('amenity_name');

        return view('admin.venueEdit',compact('venueAmenities','venueServices', 'venueEvents', 'venue', 'events', 'services', 'amenities'));
    }

    public function editvenue(Request $data){
        if(!empty($data['package_photos'])){

            $otherpics = Venues::where('venue_id',$data['venue_id'])->first();

            $otherphotos = explode(",",$otherpics->package_photo);

            for($x = 0; $x < count($otherphotos); $x++){
                File::delete("mainpage/main photos/".$otherphotos[$x]);
            }

            $additionalPics = [];
        
            foreach($data->file('package_photos') as $file){
                $file->move(public_path('/mainpage/main photos'), $file->getClientOriginalName());
            }

        }

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
        //check for existing events saved for this venue
        $events = VenuesEvents::where('venue_id', $data['venue_id'])->count();
        $services = VenuesServices::where('venue_id', $data['venue_id'])->count();
        $amenities = VenuesAmeneties::where('venue_id', $data['venue_id'])->count();

        if($events > 0) {
            VenuesEvents::where('venue_id', $data['venue_id'])->delete();
        }
        if($services > 0) {
            VenuesServices::where('venue_id', $data['venue_id'])->delete();
        }
        if($amenities > 0) {
            VenuesAmeneties::where('venue_id', $data['venue_id'])->delete();
        }

        if($data['events_offered'] != null) {
            foreach ($data['events_offered'] as $key => $event) {
                $venueEvent = new VenuesEvents;
                $venueEvent->venue_id = $data['venue_id'];
                $venueEvent->event_name = ucfirst($event);
                $venueEvent->save();
            }
        }
        if($data['services_offered'] != null) {
            foreach ($data['services_offered'] as $key => $service) {
                $venueService = new VenuesServices;
                $venueService->venue_id = $data['venue_id'];
                $venueService->service_name = ucfirst($service);
                $venueService->save();
            }
        }
        if($data['amenities_offered'] != null) {
            foreach ($data['amenities_offered'] as $key => $amenity) {
                $venueAmenity = new VenuesAmeneties;
                $venueAmenity->venue_id = $data['venue_id'];
                $venueAmenity->amenity_name = ucfirst($amenity);
                $venueAmenity->save();
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


        if(session('user_type') == "Administrator"){
            
            $coordinator = DB::table('coordinators')
                ->join('users','users.id','=','coordinators.user_id')
                ->select('coordinators.*','users.*')
                ->where('coordinators.user_id',$id)
                ->first();
            $coordinatorEvents = CoordinatorsEvents::where('coordinator_id', $coordinator->coordinator_id)->pluck('event_name')->toArray();
        }
        else{

            $coordinator = DB::table('coordinators')
                ->join('users','users.id','=','coordinators.user_id')
                ->select('coordinators.*','users.*')
                ->where('coordinators.user_id',session('userid'))
                ->first();
            $coordinatorEvents = CoordinatorsEvents::where('coordinator_id', $coordinator->coordinator_id)->pluck('event_name')->toArray();
        }
        $events = CoordinatorsEvents::all()->unique('event_name');
        return view('admin.coordinatorEdit',compact('coordinator', 'events', 'coordinatorEvents'));
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

        if(!empty($data['package_photo'])){

            $packagephoto = $data->file('package_photo');
            $packagephoto->move(public_path('/mainpage/coordinators/packages'), $packagephoto->getClientOriginalName());

        }

        if(!empty($data['additional_photos'])){
        
            foreach($data->file('additional_photos') as $file){
                $file->move(public_path('/mainpage/coordinators/additional photos'), $file->getClientOriginalName());
            }
        }

        User::editCoordinator($data);

        Coordinators::addOrUpdateCoordinator($data);
        $coordinators = Coordinators::where('user_id', $data['user_id'])->first();
        $coordinators->location = $data['location'];
        if(!empty($data['package_photo'])){

            $packagephoto = $data->file('package_photo');
            $packagephoto->move(public_path('/mainpage/coordinators/packages'), $packagephoto->getClientOriginalName());
            $coordinators->package_photo = $data->file('package_photo')->getClientOriginalName();
        }
        
        $coordinators->save();

        $coordinatorEvents = CoordinatorsEvents::where('coordinator_id', $coordinators->coordinator_id)->count();

        if($coordinatorEvents > 0) {
            CoordinatorsEvents::where('coordinator_id', $coordinators->coordinator_id)->delete();
        }

        if(!empty($data['events_offered'])){
            foreach ($data['events_offered'] as $key => $event) {
                $coordinatorEvent = new CoordinatorsEvents;
                $coordinatorEvent->coordinator_id = $coordinators->coordinator_id;
                $coordinatorEvent->event_name = ucfirst($event);
                $coordinatorEvent->save();
            }
        }

        return redirect('/coordinatoredit/'.$data['user_id'])->with('message','Profile Successfully Edited!');

    }

    public function coordinatordetails($id){
        
        // $data = DB::table('users')
        //         ->join('coordinators','users.id','=','coordinators.user_id')
        //         ->select('coordinators.*','users.*')
        //         ->where('coordinators.coordinator_id',$id)
        //         ->first();

        $data = Coordinators::with(['coordinatorUser', 'coordinatorEvents', 'CoordinatorsAlbums'])->where('coordinator_id', $id)->first();

        return view('mainpage.coordinatordetails',compact('data'));
    }

    public function allvenues(){

        $data = Venues::all();

        $events = VenuesEvents::all()->unique('event_name');
        $services = VenuesServices::all()->unique('service_name');
        $locations = Venues::all()->pluck('location')->toArray();
        $maxCapacity = Venues::max('max_capacity');
        
        return view('mainpage.allevents',compact('data', 'events', 'services', 'locations', 'maxCapacity'));
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
        //check if venue is max booking that day
        $bookings = Eventbooking::where('venue_id', $request['venue_id'])->whereDate('reserved_date', $request['reserved_date'])->count();
        
        if($bookings == $venues->booking_allowed) {
            return redirect('venuedetails/'.$venues->venue_id)->with('form_errors', 'Venue is already at max capacity to accept another event');
        }

        //check for conflicting time
        $times = Eventbooking::where('venue_id', $request['venue_id'])
                    ->whereDate('reserved_date', $request['reserved_date'])
                    ->where(fn($query) => 
                        $query->whereTime('time_start', '>=', $request['time_start'])
                        ->whereTime('time_start', '<=', $request['time_end'])
                    )
                    ->orWhere(fn($query) =>                         
                        $query->whereTime('time_end', '>=', $request['time_start'])
                        ->whereTime('time_end', '<=', $request['time_end'])->whereDate('reserved_date', $request['reserved_date'])
                    )
                    ->count();
        if($times > 0 ) {
            return redirect('venuedetails/'.$venues->venue_id)->with('form_errors', 'Venue is already booked at this time slot');
        }
        $body1 = "Thank you for booking at ".$venues->venue_name;
        $body2 = "Details of your event:";
       
        $deets1 = "Date: ".$request['reserved_date'];
        $deets2 = "Time: ". $request['time_start']. " to ". $request['time_end'];
        $deets3 = "Event name: " . $request['event_name'];
        $deets4 = "Client Name: " . $request['client_name'];
        $deets5 = "Number of Guests: " . $request['number_of_guests'];
        $body3 =  "Make your event come true at MakeEvents Memorable!";
        
        $data = [
            'subject' => 'Booking Confirmation from Make Events',
            'body1' => $body1,
            'body2' => $body2,
            'body3' => $body3,
            'deets1' => $deets1,
            'deets2' => $deets2,
            'deets3' => $deets3,
            'deets4' => $deets4,
            'deets5' => $deets5,
        ];

        Mail::to($users->email)->send(new MailNotify($data));
        
        Eventbooking::newBooking($request);

        return redirect('venuedetails/'.$venues->venue_id)->with('form_success', 'Venue has been booked. Please check your email for payment instructions.');
    }

    public function logincustomer(Request $data){
        
        
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $request = User::where('email',$data['email'])->first();

            if($request->active_status != 1) {
                return back()->withErrors([
                    'email' => 'Account is not verified',
                ])->onlyInput('email');
            }

            $data->session()->regenerate();

           
            $data->session()->put('logged', true);
            $data->session()->put('user_type', $request->user_type);
            $data->session()->put('user_id', $request->id);
            $data->session()->put('profpic', $request->profile_picture);

            if($request->user_type == 'Event Coordinator' || $request->user_type == 'Vendor') {
                return redirect('/dashboard');
            } else {
                return redirect('/')->with('message', 'Welcome!');
            }
            
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
            'password_confirmation' => 'required|min:8',
            'agree' => 'required'
        ],
        [
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'contact_number.required' => 'Contact number is required',
            'email_address.required' => 'Email Address is required',
            'email_address.email' => 'Please input a valid email address',
            'email_address.unique' => 'User already existing. Please input a different email address.',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm password is required',
            'agree.required' => 'Please agree to the privacy policy'
        ]);
        
        User::addCustomer($data);
       
        $emailOTPMethod = new EmailOTP($data['email_address']);
        $service = new OTPService($emailOTPMethod);
        $service->send();
        session()->put('email_otp', $data['email_address']);
        //session()->forget('voucher_attempts');
        //session()->get('mobile_number')
        //dd($data['email_address']);
        return view('mainpage/otpverify', [
            'email' => $data['email_address'],
            'expiry' => $service->getExpiry()
        ]);
        // return redirect('/customerlogin')->with('message', 'Successfully Registered');
    }

    public function onetimepassword()
    {
        $email = session()->get('email_otp');
        $emailOTPMethod = new EmailOTP($email);
        $service = new OTPService($emailOTPMethod);
        return view('mainpage.otpverify', [
            'email' => $email,
            'expiry' => $service->getExpiry()
        ]);
        // return view('mainpage/otpverify');
    }

    public function resend() {
        $email = session()->get('email_otp');
        $emailOTPMethod = new EmailOTP($email);
        $service = new OTPService($emailOTPMethod);
        if (!$service->isExpired()) {
            return redirect()->route('One-Time-Password')->withError(['code' => 'OTP is not yet expired!']);
        }
        if ($service->send()) {
            return redirect()->route('One-Time-Password')->withSuccess('OTP has been sent!');
        }
        return redirect()->route('One-Time-Password')->withError(['code' => 'Failed on resending OTP!']);
    }

    public function cancel() {
        $email = session()->get('email_otp');
        $user = User::where('email', $email)->delete();
        Session::flush();
        return redirect('/register');
    }

    public function userverify(Request $data)
    {
        $email = $data['email'];
        $emailOTPMethod = new EmailOTP($email);
        $service = new OTPService($emailOTPMethod);
        $status = $service->verify($data['code'], $email);
        if ($status) {
            session()->forget('email_otp');
            return redirect('/customerlogin')->with('message', 'Successfully Registered');
        }
        return redirect()->route('One-Time-Password')
            ->with([
                'email' => $email,
                'expiry' => $service->getExpiry()
            ])
            ->withErrors(['code' => $service->getMessage()]);
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
                    'end' => $booking->reserved_date,
                    'time' => $booking->time_start. ' - '.$booking->time_end,
                    'event_name' => $booking->event_name,
                    'client_name' => $booking->client_name,
                    'number_of_guests' => $booking->number_of_guests,
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

        Eventbooking::eventCancel($data);
    }

    public function coordinatoreventcancel(Request $data){
        Coordinatorbooking::eventCancel($data);
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
        $coordinatorsprice = Coordinators::where('coordinator_id',$request['coordinator_id'])->first();
        $coordinators = User::where('id',$coordinatorsprice->user_id)->first(); //user id
        $body1 = "Hi, ".$users->first_name."!";
        $body2 = "Thank you for booking an event coordinator at  MakeEvents Memorable!";
        $deets1 ="Name of event coordinator: ".$coordinators->first_name . ' '. $coordinators->last_name;
        $deets2 ="Date: ".$request['reserved_date'];
        $body3 =  "Together make your event come true at MakeEvents Memorable!";
        
        $data = [
            'subject' => 'Booking Confirmation from Make Events',
            'body1' => $body1,
            'body2' => $body2,
            'body3' => $body3,
            'deets1' => $deets1,
            'deets2' => $deets2,
            'deets3' => '',
            'deets4' => '',
            'deets5' => '',
        ];

        Mail::to($users->email)->send(new MailNotify($data));
        
        Coordinatorbooking::newBooking($request);

        return redirect('/')->with('message', 'Successfully Booked!');

    }

    public function filtervenues(Request $request){
        
        
        $venues = Venues::with(['venueEvents', 'venueServices'])->where('venue_id', '!=', 0);
        if(!empty($request['event_offered'])) {
            $venues->whereHas('venueEvents', function (Builder $query) use (
                $request
            ) {
                $query->where('event_name', $request['event_offered']);
            });
        }
        
        if(!empty($request['service_offered'])) {
            $venues->whereHas('venueServices', function (Builder $query) use (
                $request
            ) {
                // // dd($request['event_offered']);
                // $query->select('id');
                $query->where('service_name', $request['service_offered']);
            });
        }

        if(!empty($request['maxcapacity'])) {
            $venues->where('max_capacity', '>=', $request['maxcapacity']);
        }

        if(!empty($request['location_offered'])) {
            $venues->where('location', 'like', '%'.$request['location_offered'].'%');
        }

        $data = $venues->get();
        // if(!empty($request['maxprice'])){
        //     if(!empty($request['location'])){
        //         $data = DB::table('venues')
        //                 ->select('*')
        //                 ->where('price', '<=', $request['maxprice'])
        //                 ->where('location', 'LIKE', '%'.$request['location'].'%')
        //                 ->get();
        //     }
        //     else{

        //         $data = DB::table('venues')
        //                 ->where('price', '<=', $request['maxprice'])
        //                 ->select('*')
        //                 ->get();

        //     }
        // }
        // else{
        //     if(!empty($request['location'])){
        //         $data = DB::table('venues')
        //                 ->select('*')
        //                 ->where('location', 'LIKE', '%'.$request['location'].'%')
        //                 ->get();
        //     }
        //     else{
        //         $data = DB::table('venues')
        //                 ->select('*')
        //                 ->get();
        //     }
        // }

        $events = VenuesEvents::all()->unique('event_name');
        $services = VenuesServices::all()->unique('service_name');
        $locations = Venues::all()->pluck('location')->toArray();
        $maxCapacity = Venues::max('max_capacity');
    
        return view('mainpage.allevents',compact('data', 'events', 'services', 'locations', 'maxCapacity'));
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
