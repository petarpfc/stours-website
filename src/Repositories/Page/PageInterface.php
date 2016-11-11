<?php
namespace Softwaretours\Site\Repositories\Page;


use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Mixed;

interface PageInterface {
    
    /**
     * @param mixed $title
     * return mixed
     */
    public function page($title);
    
    /**
     * @param Request $request
     * return mixed
     */
    public function  loadPosts(Request $request);
    
    
    
}