<?php

namespace Kek\BlogzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Msi\AdminBundle\Tools\Cutter;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Msi\AdminBundle\Entity\EntityRepository")
 */
class Post
{
    use \Msi\AdminBundle\Doctrine\Extension\Model\Timestampable;
    use \Msi\AdminBundle\Doctrine\Extension\Model\Blameable;
    use \Msi\AdminBundle\Doctrine\Extension\Model\Publishable;
    use \Msi\AdminBundle\Doctrine\Extension\Model\Uploadable;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string")
     */
    protected $slug;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $content;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     */
    protected $tags;

    /**
     * @ORM\ManyToOne(targetEntity="Msi\CmsBundle\Entity\Site")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $site;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $image;

    protected $imageFile;

    public function __construct()
    {
        $this->tags = new ArrayCollection;
    }

    public function processImage($file)
    {
        $cutter = new Cutter($file);
        $cutter->resize(970, 500)->save();
    }

    public function getUploadFields()
    {
        return ['image'];
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;
        $this->updatedAt = new \DateTime;

        return $this;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->title;
    }

    public function getId()
    {
        return $this->id;
    }
}
