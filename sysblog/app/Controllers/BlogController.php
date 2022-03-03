<?php

namespace App\Controllers;

use App\Models\Blog;
use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;


class BlogController extends BaseController
{

    public function indexAction()
    {
        $posts = Blog::all();
        var_dump($posts);
        return $this->renderHTML('index.html.twig', [
            'posts' => $posts
        ]);
    }

    public function showBlogAction($request)
    {
        $uri=explode('/',$request->getRequestTarget());
        $id=end($uri);
        $blog=Blog::find($id);
        $comments=Blog::find($id)->comments;
        return $this->renderHTML('blog.html.twig', [
            'blog' => $blog,
            'comments' => $comments
        ]);
    } 
}