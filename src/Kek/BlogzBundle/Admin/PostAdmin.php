<?php

namespace Kek\BlogzBundle\Admin;

use Msi\AdminBundle\Admin\Admin;
use Msi\AdminBundle\Grid\Grid;
use Symfony\Component\Form\FormBuilder;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("kek_blogz_post_admin", parent="msi_admin.admin")
 * @DI\Tag("msi.admin")
 */
class PostAdmin extends Admin
{
    public function configure()
    {
        $this->class = 'Kek\BlogzBundle\Entity\Post';
    }

    public function buildGrid(Grid $builder)
    {
        $builder
            ->add('published', 'boolean')
            ->add('title')
        ;
    }

    public function buildForm(FormBuilder $builder)
    {
        $builder
            ->add('published', 'checkbox')
            ->add('title')
            ->add('content', 'textarea', [
                'attr' => [
                    'class' => 'tinymce',
                ],
            ])
            ->add('tags')
            ->add('site')
        ;
    }
}
