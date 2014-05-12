<?php

namespace Kek\BlogzBundle\Admin;

use Msi\AdminBundle\Admin\Admin;
use Msi\AdminBundle\Grid\Grid;
use Symfony\Component\Form\FormBuilder;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * @DI\Service("kek_blogz_tag_admin", parent="msi_admin.admin")
 * @DI\Tag("msi.admin")
 */
class TagAdmin extends Admin
{
    public function configure()
    {
        $this->class = 'Kek\BlogzBundle\Entity\Tag';
    }

    public function buildGrid(Grid $builder)
    {
        $builder
            ->add('published', 'boolean')
            ->add('name')
        ;
    }

    public function buildForm(FormBuilder $builder)
    {
        $builder
            ->add('published', 'checkbox')
            ->add('name')
        ;
    }
}
