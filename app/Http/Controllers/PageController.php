<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use App\Models\Industry;
use App\Models\Category;
use App\Models\Service;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\ServiceBooking;
use App\Models\Cart;
use App\Models\User;
use URL;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller {
    // public function __construct()
    // {

    // }

    public function home(){
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->limit(3)->get();
        $industries = DB::table('industries')->orderBy('created_at', 'desc')->limit(3)->get();
        $products = DB::table('products')->orderBy('created_at', 'desc')->where('products.active', 'yes')->limit(3)->get();
        $services = DB::table('services')->orderBy('created_at', 'desc')->where('services.active', 'yes')->limit(3)->get();
        $plans = DB::table('plans')->orderBy('created_at', 'asc')->limit(3)->get();
        // return view('public.index', compact('categories', 'industries', 'products', 'services', 'plans'));
        $getLocale = app()->getLocale();
        return view('user.home.home', compact('categories', 'industries', 'products', 'services', 'plans', 'getLocale'));
    }
    public function about(){ return view('public.about'); }
    //public function faq(){ return view('public.faq'); }
    public function categories(){
        $page = 'industries';
        $categories = Industry:: orderBy('name', 'asc')->first();
        return view('user.categories.categories', compact('categories','page'));
    }
    public function industries(){
        $industries = DB::table('industries')->orderBy('name', 'asc')->get();
        return view('public.industries', compact('industries'));
    }
    public function products(){
        $products = DB::table('products')->orderBy('name', 'asc')->where('products.active', 'yes')->get();
        return view('public.products', compact('products'));
    }
    public function services(){
        $services = DB::table('services')->orderBy('name', 'asc')->where('services.active', 'yes')->get();
        return view('public.services', compact('services'));
    }
    public function faq(){ return view('public.faq'); }

    public function contact(){
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        return view('public.contact', compact('categories'));
    }
    public function contactAction(Request $request){
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'title' => $request->input('title'),
            'message' => $request->input('message'),
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s")
        ];
        $id = DB::table('contact_messages')->insertGetId($data);
        $categories = DB::table('categories')->orderBy('name', 'asc')->get();
        if($id){
            return view('public.contact', ['status' => 'success', 'categories' => $categories]);
        } else {
            return view('public.contact', ['status' => 'failure', 'categories' => $categories]);
        }
    }

    public function book_now($id){

        // $user = Auth::user();        
        // if($user->role === 'admin' || $user->role === 'superadmin'){
        //     return redirect('admin/dashboard');
        // }else if($user->role === 'owner' || $user->role === 'business'){
        //     return redirect('owner/dashboard');
        // }

        $category = Category::get();
        $product = Product::orderBy('created_at', 'desc')->where('active', 'yes')->get();
        $services= Service::where('status', 1)->where('category_id',$id)
        ->inRandomOrder()
        ->get();
        return view('user.booking.booknow',compact('category','services','product'));
    }

    public function get_collaboratera(Request $request){
        $collaborate[] = array('name' =>'AEL - Auto-école Lémanique',
                            'id'   => '1');
                            $html = '<option value="">'."Select Collaborater".'</option>';
                            foreach ($collaborate as $data) {


                                $html .= '<option value="' . $data['id']. '">' . $data['name'] . '</option>';
                            }

                            echo json_encode($html);
    }
    public function get_service(Request $request){

     $service = Service::where('status', 1)->where('industry_id',$request->category)->get();
                            $html = '<option value="">'."Select Collaborater".'</option>';
                            foreach ($service as $data) {


                                $html .= '<option value="' . $data['id']. '">' . $data['name'] . '</option>';
                            }

                            echo json_encode($html);
    }


    public function get_appointment(Request $request){
        $category = $request->category;
        $location = $request->location;
        $collaborater = $request->collaborater;
        $locationtext = $request->locationtext;


        $serviceCollection  = Service::where('status', 1)->where('industry_id',$request->category)->where('location',$request->location)->get();
        $html = '';
        if(count($serviceCollection) > 0){
            foreach($serviceCollection as $service){
                if($service->duration == 1){
                    $hr = 'hr';
                }else{
                    $hr = 'hrs';
                }
                $html .= '<div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class=" card-title">'.$service->name .' </h5>
                        <p class="text-muted">
                            <i class="fa-sharp fa-solid fa-location-dot"></i> '.$locationtext.'
                        </p>
                        <p class="card-text">  Duration : '.$service->duration.' '. $hr. ' <br></p>
                        <p class="card-text">  Cancellation Limit : '.$service->cancellation_limit.' '. $hr. ' <br></p>
                        <del class="fw-600 opacity-50 ">
                        '.$service->price_original.'  CHF
               </del>
                        <h5 class="price">'.$service->price_discounted.' CHF<span class="float-end"><a href='.route('booking.book_appointment',$service->id).'
                                    class="btn btn-primary">Buy now</a>
                            </span></h5>

                    </div>
                </div>
            </div>';


            }

        }else{
            $html .= '<div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <p>Not Available Appointments</p>

                    </div>
                </div>
            </div>';


        }




    echo json_encode($html);

    }

    public function bookcategory(Request $request){

        return view('user.booking.bookcalender');
    }

    public function book_appointment($id){
        $service = Service :: find($id);
         return view('user.booking.book_appointment',compact('service'));
    }

    public function booking_personal_info(){
        $cart = [];
        if(\Auth::check()){
            $cart = Cart::where('user_id',\Auth::user()->id)->get();
        }
        return view('user.booking.booking_personal_info',compact('cart'));
    }

    public function checkout(){
        $cart = [];
        if(\Auth::check()){
            $cart = Cart::where('user_id',\Auth::user()->id)->get();
        }
         return view('user.booking.checkout',compact('cart'));
    }

    public function order_confirmation(){

        if(\Auth::check()){
            $cart = Cart::where('user_id',\Auth::user()->id)->delete();
        }
        return view('user.booking.order_confirm');
    }

    public function add_to_cart(Request $req){
        //dd($req);
        $service = $req->service;

        if($req->user_id){

            \App\Models\Cart::Create(['product_id'=>$service['id'],'user_id'=>$req->user_id,'qty'=>$req->qty]);
        }else{
            \Session::set('cart', $service);
        }
        return response()->json(['msg'=>'success']);
    }

    public function remove_cart_item($id){

        $delete =  \App\Models\Cart::destroy($id);

        if($delete){
             return response()->json(['msg'=>'success']);
        }
    }
    public function create_stripe_intent(){
         $price = 0;
         $cart = Cart::where('user_id',\Auth::user()->id)->get();
         foreach ($cart as $product) {
            $item = \App\Models\Service::find($product->product_id);
             $price += (int)$item->price_discounted;
         }

            try {
                // $stripeSecretKey = 'sk_test_51IVyvECgG9Z1id5FuG7SacrbF8wTpux00lZ844KZX5VSconhCSbcc35HSb5QdkGZp4WmoPeHoG4HufiybavYyTOa00OunzwSFB';

                $stripeSecretKey = 'sk_test_51JvvSdA7giYczcnrAvKloOZJnFvjArKM007Sn5CsbTRyC2qQdX2QQTZe2z0PHY5Za4YRdvDrmcgOoU3MHeiIIiMi00u9cqTADv';
                \Stripe\Stripe::setApiKey($stripeSecretKey);
        // retrieve JSON from POST body
                // $jsonStr = file_get_contents('php://input');
                // $jsonObj = json_decode($jsonStr);

                $customer = \Stripe\Customer::create([
                  'name' => 'Jenny Rosen',
                  'address' => [
                    'line1' => '510 Townsend St',
                    'postal_code' => '98140',
                    'city' => 'San Francisco',
                    'state' => 'CA',
                    'country' => 'US',
                  ],

                ]);
                    // $stripe = new \Stripe\StripeClient('sk_test_51NV9R0KqzD7CrSAXYhZ0UQ23KCpuqR0SnSkc93kWCAmc5bQMjRP3a0mkPglI8rPjmixBHOMlzEraPCJEIKu49ptP00AKzMf9HQ');
                      // $connectedaccount =   $stripe->accounts->create([
                      //     'country' => 'FR',
                      //     'type' => 'custom',
                      //     'capabilities' => [
                      //       'card_payments' => ['requested' => true],
                      //       'transfers' => ['requested' => true],
                      //     ],
                      //     //'account_token' => 'ct_GcbCQ1lBFIx9RUe7YiEtiWfq',
                      //   ]);

                     // dd($connectedaccount);

                // Create a PaymentIntent with amount and currency
                $paymentIntent = \Stripe\PaymentIntent::create([
                    'amount' => $price*100,
                    'currency' => 'usd',
                    'automatic_payment_methods' => [
                        'enabled' => true,
                    ],
                    'application_fee_amount' => 123,
                   // 'on_behalf_of' => 'acct_1LDhyyALbapuvdoa',
                     'transfer_data' => ['destination' =>  'acct_1NVC7xPR5jXq8X1s'],
                    'description'=>'service',
                    'customer' =>$customer->id,
                ]);
                $output = [
                    'clientSecret' => $paymentIntent->client_secret,
                ];
                return response()->json(['data'=> $output]);

                //echo json_encode($output);
            } catch (Error $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
    }

    public function create_order(Request $req){
        //$currenturl = URL::full();
        //$cart = \App\Models\Cart::
        //dd($request);


        $payment_details = ['payment_intent'=>$req->payment_intent, 'payment_intent_client_secret'=>$req->payment_intent_client_secret];
        $products = [['product_id'=>1,'qty'=>1],['product_id'=>2,'qty'=>1]];
       $create =  ProductOrder::Create(['user_id' => \Auth::user()->id, 'products'=>$products, 'quantity'=>1, 'amount'=>$req->price, 'order_status'=>'success','delivery_address'=>'Address','payment_status'=>'paid','payment_method'=>'stripe','payment_details'=>$payment_details]);

       $service_order = ServiceBooking::Create(['user_id'=>\Auth::user()->id, 'service_id'=>1, 'type'=>'service', 'amount'=>$req->price, 'booking_status'=>'success', 'payment_method'=>'Stripe', 'payment_status'=>'Success']);

        if($create){
            return response()->json(['msg'=>'success']);
        }
        // $payment_intent = $request->all();
        // $payment_intent_client_secret = $request->query('payment_intent_client_secret');

       //  dd( $_GET);
       // // $stripe = Stripe('pk_test_51JvvSdA7giYczcnr7o3ZLd82BpCv8nuRYjGAQwG8WG4D5kM2we9scikZzLtufNeLiX33urs3rC41C0FJFAni0ksD00EMehACWm');
       //   $stripeSecretKey = 'sk_test_51JvvSdA7giYczcnrAvKloOZJnFvjArKM007Sn5CsbTRyC2qQdX2QQTZe2z0PHY5Za4YRdvDrmcgOoU3MHeiIIiMi00u9cqTADv';
       //          \Stripe\Stripe::setApiKey($stripeSecretKey);

       //  $paymentIntent =  \Stripe\PaymentIntent::retrieve($payment_intent);
       //  dd( $paymentIntent);    

    }

    public function stripe_return_url(){
        $currenturl = URL::full();
        // $payment_intent = $request->all();
        // $payment_intent_client_secret = $request->query('payment_intent_client_secret');

        dd( $_GET);
       // $stripe = Stripe('pk_test_51JvvSdA7giYczcnr7o3ZLd82BpCv8nuRYjGAQwG8WG4D5kM2we9scikZzLtufNeLiX33urs3rC41C0FJFAni0ksD00EMehACWm');
         $stripeSecretKey = 'sk_test_51JvvSdA7giYczcnrAvKloOZJnFvjArKM007Sn5CsbTRyC2qQdX2QQTZe2z0PHY5Za4YRdvDrmcgOoU3MHeiIIiMi00u9cqTADv';
                \Stripe\Stripe::setApiKey($stripeSecretKey);

        $paymentIntent =  \Stripe\PaymentIntent::retrieve($payment_intent);
        dd( $paymentIntent);    

    }

    public function check_valid_email(Request $req){
        $user = User::where('email',$req->email)->count();
        //dd($user);
        if($user != 0){
            return response()->json(['msg'=>'success','email_exists'=>true]);
        }else{
             return response()->json(['msg'=>'success','email_exists'=>false]);
        }

    }

    public function send_resetpassword_email(Request $request){

        $user = User::where('email',$request->email)->first();
        $data = [];
        if($user){
            $encrypted_id = Crypt::encryptString($user->id);
        }else{
             return response()->json(['msg'=>'success','email_exists'=>false]);
        }
        try{
            

        $text = '<html><h1>Please click on the following link to reset your password';
        $text .= env('APP_URL').'/reset-password-email/'.$encrypted_id;
        $text .= '</h1></html>';

        $data = ['encrypted_id'=>$encrypted_id];

        Mail::send(['text'=>'mail'], $data, function($message) use ($request,$text ){
         $message->to($request->email, 'Booker')->subject
            ('Reset Password Mail');
            //$message->setBody($text,'text/html');
         $message->from('info@booker.com','Booker');
      });
    }catch(\Exception $e){
        dd($e);
    }

    return response()->json(['msg'=>'success','email_exists'=>true,'email'=>$request->email,'message'=>'Si cette adresse e-mail est enregistrée dans notre boutique, vous recevrez un lien pour réinitialiser votre mot de passe sur info@gmail.com.']); 
    }

    public function reset_password_email($id){
        $decrypted_id = (int)Crypt::decryptString($id);

        //dd($decrypted_id);

       $user =  User::find($decrypted_id);
       if($user){
        $categories = DB::table('categories')->orderBy('created_at', 'desc')->limit(3)->get();
        $industries = DB::table('industries')->orderBy('created_at', 'desc')->limit(3)->get();
        $products = DB::table('products')->orderBy('created_at', 'desc')->where('products.active', 'yes')->limit(3)->get();
        $services = DB::table('services')->orderBy('created_at', 'desc')->where('services.active', 'yes')->limit(3)->get();
        $plans = DB::table('plans')->orderBy('created_at', 'asc')->limit(3)->get();
        $email = $user->email;
        // return view('public.index', compact('categories', 'industries', 'products', 'services', 'plans'));
        return view('user.home.home', compact('categories', 'industries', 'products', 'services', 'plans','email'));
       }
    }


    public function reset_password_ajax(Request $request){
        $email = $request->email;

        if($email){
            $user = User::where('email',$email)->first();

            if($user){
                $pw=\Hash::make($request->password);
                $user->password = $pw;
                $user->update();

               if($user->isDirty('password')){
                 return response()->json(['msg'=>'success','email_updated'=>true,'email'=>$email,'message'=>'Password Updated Successfully']); 
               }
            }else{
                 return response()->json(['msg'=>'success','email_updated'=>false,'email'=>$email, 'message'=>'Failed to update password. Try again later']); 
            }
        }else{
             return response()->json(['msg'=>'success','email_updated'=>false,'email'=>$email, 'message'=>'Failed to update password. Try again later']); 
        }
    }
}
