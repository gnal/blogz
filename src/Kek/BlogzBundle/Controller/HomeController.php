<?php

namespace Kek\BlogzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository('KekBlogzBundle:Post')->findAll();

        return [
            'posts' => $posts,
        ];
    }
}
