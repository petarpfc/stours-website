<?php
namespace Softwaretours\Site\Repositories\Page;
use Illuminate\Http\Request;

class PageRepository  implements PageInterface{
    
    protected $user_id;
    
    
    function __construct() {
        $this->user_id = $this->user_id = isset($_GET['accid']) ? $_GET['accid'] : env('ACCOUNT_ID');
    }
    
    
    /** Returns page content with given title and user_id
      * {@inheritDoc}
     * @see \Softwaretours\Site\Repositories\Page\PageInterface::page()
     */
    public function page($title){
    
       $json['title'] = $title;
       $json['user_id'] = $this->user_id;
       return curlWrap('page-content', $json, "POST", null);
    }
    
    
   
    
    /** Returns more blog posts (with ajax, or not)
     * {@inheritDoc}
     * @see \Modules\Site\Repositories\Page\PageInterface::loadPosts()
     */
    public function loadPosts(Request $request){
        $json['category_id'] = $request->get('id');
        $json['user_id'] = $this->user_id;
        $json['counter'] = $request->get('counter');
        return curlWrap('load-posts', $json, 'POST', null);
    }
    
    
    
}