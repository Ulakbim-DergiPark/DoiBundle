<?php

namespace BulutYazilim\OjsDoiBundle\Entity;

use BulutYazilim\OjsDoiBundle\Validator\Constraints as DoiAssert;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Ojs\JournalBundle\Entity\JournalTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="doi_crossref_config")
 * @DoiAssert\ValidCrossrefConfig()
 * @Gedmo\Loggable
 */
class CrossrefConfig
{
    use BlameableEntity;
    use JournalTrait;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * crossref api username
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Gedmo\Versioned()
     */

    protected $username;
    /**
     * crossref api password
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Gedmo\Versioned()
     */
    protected $password;
    /**
     * DOI depositor name
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Gedmo\Versioned()
     */
    protected $fullName;
    /**
     * DOI depositor email
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Gedmo\Versioned()
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Gedmo\Versioned()
     */
    protected $prefix;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     * @Gedmo\Versioned()
     */
    protected $suffix = '%j.v%vi%i.%a';

    /**
     * @return CrossrefConfig
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return CrossrefConfig
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return CrossrefConfig
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return CrossrefConfig
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return CrossrefConfig
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return CrossrefConfig
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param string $suffix
     * @return CrossrefConfig
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return !empty($this->username) && !empty($this->password);
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
