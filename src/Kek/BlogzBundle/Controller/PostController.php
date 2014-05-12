<?php

namespace Kek\BlogzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PostController extends Controller
{
    /**
     * @Route("/blog/{post}")
     * @Template()
     */
    public function showAction()
    {
        $post = $this->getDoctrine()->getRepository('KekBlogzBundle:Post')->findOneBy(['slug' => $this->getRequest()->attributes->get('post')]);

        return [
            'post' => $post,
        ];
    }
}
