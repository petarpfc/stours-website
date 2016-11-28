<?php

namespace Softwaretours\Site\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Modules\Core\Entities\Products\Product;
use Modules\Core\Entities\Products\Gallery\Image;
use Modules\Core\Entities\Settings\SettingsGoogleMap;
use Modules\Core\Entities\Settings\SettingsColor;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Entities\Settings\Menu\MenuItem;
use Modules\Core\Entities\Settings\SettingsPosts;
use Modules\Api\Repositories\Products\ProductRepository;
use Modules\Core\Entities\Settings\Menu\Menu;
use Modules\Site\Repositories\Page\PageInterface;
use Illuminate\Support\Facades\View;


class PageController extends Controller
{
    
    /**
     * @var PageInterface $repositoryObj
     */
    protected $repositoryObj;
    
    
   
     
    /**
     *
     * @param PageInterface $obj
     * 
     */
    public function __construct(\Softwaretours\Site\Repositories\Page\PageInterface $obj)
    {
        $this->repositoryObj = $obj;
        
    }
    
    
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        
    }
    
    public function page($title = null)
    {
        
       $result = json_decode($this->repositoryObj->page($title));
       $result = (isset($result->content))? $result->content:$result;
       //var_dump($result); exit();
       if($result->not_found)
       		return view('site::page.not-found');
       if(isset($result->custom_footer) && $result->custom_footer != null)
           	View::share('custom_footer', $result->custom_footer);
        $myViewData = View::make('site::page.page', ['title' => $result->title, 'product' => $result->product, 'posts' => $result->posts, 'settings' => $result->settings, 'menuMiddle' => $result->menuMiddle, 'page_list' => $result->page_list, 'totalPosts' => $result->totalPosts])->render();
       echo $this->add_analytics_tracking_to_urls($myViewData, ['user_id' => $result->user_id]);
    }

    
    /**
     * @param string $body
     * @param array $params
     * @return mixed
     */
    protected function add_analytics_tracking_to_urls($body, array $params) {
    	return preg_replace_callback('#(<a.*?href=")([^"]*)("[^>]*?>)#i', function($match) use ($params) {
    		$url = $match[2];
    		if (strpos($url, '?') === false) {
    			$url .= '?';
    		} else {
    			$url .= '&';
    		}
    		$url .= 'accid='.$params['user_id'];
    		return $match[1] . $url . $match[3];
    	}, $body);
    }
    
    
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('site::create');
    }

    /**
     * Load more posts
     * @param Request $request
     */
    public function loadPosts(Request $request)
    {
        $result = json_decode($this->repositoryObj->loadPosts($request));
        $returnHTML =  view('site::partials.posts',['posts' => $result->posts, 'settings' => $result->settings, 'ajax' => $result->ajax])->render();
        return response()->json( array('success' => true, 'html'=>$returnHTML) );

    }

   
    public function contactForm(Request $request){

//        $data['first_name']=$request['first_name'];
//        $data['second_name']=$request['last_name'];
//        $data['phone']=$request['phone'];
//        $data['address']=$request['address'];
//        $data['city']=$request['city'];
//        $data['state']=$request['state'];
//        $data['zip_code']=$request['zip'];
//        $data['message']=$request['comment'];
//        $data['admin_email']= $request['admin_email'];

        $first_name=$request['first_name'];
        $second_name=$request['last_name'];
        $phone=$request['phone'];
        $address=$request['address'];
        $city=$request['city'];
        $state=$request['state'];
        $zip_code=$request['zip'];
        $message=$request['comment'];


        if(isset($request['email'])){
            // EDIT THE 2 LINES BELOW AS REQUIRED
            if(isset ($request['admin_email']))
                $email_to = $request['admin_email'];
            else
                $email_to='semko2m@gmail.com';
            $email_subject = "Contact form from website";
            $email_from = $request['email']; // required
            $subject  = 'Contact Message'; // not required



            function clean_string($string) {
                $bad = array("content-type","bcc:","to:","cc:","href");
                return str_replace($bad,"",$string);
            }

            $datum = date('d/m/Y H:i:s');

            $email_message = "===================================================\n";
            $email_message .= "Contact form " . $_SERVER['HTTP_HOST'] . "\n";
            $email_message .= "===================================================\n\n";
            $email_message .= "Name: ".clean_string($first_name). " ". clean_string($second_name)."\n";
            $email_message .= "E-mail: ".clean_string($email_from)."\n";
            $email_message .= "Phone : ".clean_string($phone)."\n";
            $email_message .= "Adress: ".clean_string($address)."\n";
            $email_message .= "City  : ".clean_string($city)."\n";
            $email_message .= "State: ".clean_string($state)."\n";
            $email_message .= "Zip Code: ".clean_string($zip_code)."\n";
            $email_message .= "Message: ".clean_string($message)."\n";
            $email_message .= "Subject: ".clean_string($subject)."\n";
            $email_message .= "Send on " . $datum . " from IP address " . $_SERVER['REMOTE_ADDR'] . "\n\n";
            $email_message .= "===================================================\n";
            $email_message .= "Tech support:semko2m@gmail.com\n";
            $email_message .= "===================================================\n\n";
            $email_message .= $_SERVER['HTTP_USER_AGENT'];

            // create email headers
            $headers = 'From: '.$email_from."\r\n".
                'Reply-To: '.$email_from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
            try {
                @mail($email_to, $email_subject, $email_message, $headers);
                return response()->json([
                    'success' => 'success message',
                ]);
            }
            catch (Exception $e){
                return response()->json([
                    'error' => $e,
                ]);
            }
//            @mail($email_to, $email_subject, $email_message, $headers);
//            return redirect()->back()->with(['success' => 'Thanks for subscribe']);
        }
    }
}
