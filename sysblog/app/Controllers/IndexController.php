<?php
namespace App\Controllers;

use App\Models\Blog;
use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;


class IndexController extends BaseController
{

    public function indexAction()
    {
        $blogs = Blog::all();
        //var_dump($blogs);
        return $this->renderHTML('index.html.twig', [
            'blogs' => $blogs
        ]);
    }
   /*  public function indexAction($request, $response, $args)
    {
        $blog = new Blog();
        $posts = $blog->getPosts();
        return $this->renderHTML('index.html.twig', [
            'posts' => $posts
        ]);
    } */
}