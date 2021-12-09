<?php
namespace Slub\SlubFindFlexibleviews\Domain\Model;


/***
 *
 * This file is part of the "SLUB" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 
 *
 ***/
/**
 * Flexibleviews
 */
class Flexibleviews extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Titel
     * 
     * @var string
     */
    protected $title = '';

    /**
     * query
     * 
     * @var string
     */
    protected $query = '';

    /**
     * description
     * 
     * @var string
     */
    protected $description = '';

    /**
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * link
     * 
     * @var string
     */
    protected $link = '';

    /**
     * slug
     * 
     * @var string
     */
    protected $slug = '';

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the query
     * 
     * @return string $query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Sets the query
     * 
     * @param string $query
     * @return void
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the image
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the link
     * 
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     * 
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Returns the slug
     * 
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     * 
     * @param string $slug
     * @return void
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
}
