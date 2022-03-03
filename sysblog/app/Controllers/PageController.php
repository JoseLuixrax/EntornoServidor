<?php
/**
 * PageController
 *
 */

namespace App\Controllers;

class PageController extends BaseController
{

/*     public function indexAction($request, $response, $args)
    {
        $this->view->render($response, 'index.html.twig');
    } */

    public function aboutAction()
    {
        return $this->renderHTML('Page/about.html.twig');
    }

    public function contactAction()
    {
        return $this->renderHTML('Page/contact.html.twig');
    }

    public function contactActionSend($request)
    {
        $postData = array();
        if ($request->getMethod() == 'POST') {
            $postData = $request->getParsedBody();
            $name = $postData['name'];
            $email = $postData['email'];
            $subject = $postData['subject'];
            $message = $postData['message'];

        }
        return $this->renderHTML('Page/comentario.html.twig', [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
        ]);
    }

}
