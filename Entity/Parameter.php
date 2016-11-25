<?php

namespace WH\ParameterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Parameter
 *
 * @ORM\Table(name="parameter")
 * @ORM\Entity(repositoryClass="WH\ParameterBundle\Repository\ParameterRepository")
 *
 * @package WH\ParameterBundle\Entity
 */
class Parameter
{

	/**
	 * @var array
	 */
	public static $types = array(
		'string' => 'Valeur courte',
		'text'   => 'Valeur longue',
		'link'   => 'Lien',
	);

	/**
	 * @return array
	 */
	public static function getTypes()
	{

		return self::$types;
	}

	/**
	 * Parameter constructor.
	 */
	public function __construct()
	{
		$this->type = 'string';
	}

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="slug", type="string", length=255)
	 */
	private $slug;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="type", type="string", length=255)
	 */
	private $type;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="value_string", type="string", length=255, nullable=true)
	 */
	private $valueString;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="value_link", type="string", length=255, nullable=true)
	 */
	private $valueLink;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="value_text", type="text", nullable=true)
	 */
	private $valueText;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 *
	 * @return Parameter
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get value_string
	 *
	 * @return string
	 */
	public function getValue()
	{
		$value = '';

		switch ($this->type) {
			case 'string':
				$value = $this->getValueString();
				break;

			case 'text':
				$value = $this->getValueText();
				break;

			case 'link':
				$value = $this->getValueLink();
				break;
		}

		return $value;
	}

	/**
	 * Set value_string
	 *
	 * @param string $valueString
	 *
	 * @return Parameter
	 */
	public function setValueString($valueString)
	{
		$this->valueString = $valueString;

		return $this;
	}

	/**
	 * Get value_string
	 *
	 * @return string
	 */
	public function getValueString()
	{
		return $this->valueString;
	}

	/**
	 * Set valueText
	 *
	 * @param string $valueText
	 *
	 * @return Parameter
	 */
	public function setValueText($valueText)
	{
		$this->valueText = $valueText;

		return $this;
	}

	/**
	 * Get valueText
	 *
	 * @return string
	 */
	public function getValueText()
	{
		return $this->valueText;
	}

	/**
	 * Set valueLink
	 *
	 * @param string $valueLink
	 *
	 * @return Parameter
	 */
	public function setValueLink($valueLink)
	{
		$this->valueLink = $valueLink;

		return $this;
	}

	/**
	 * Get valueLink
	 *
	 * @return string
	 */
	public function getValueLink()
	{
		return $this->valueLink;
	}

	/**
	 * Set slug
	 *
	 * @param string $slug
	 *
	 * @return Parameter
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;

		return $this;
	}

	/**
	 * Get slug
	 *
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * Set type
	 *
	 * @param string $type
	 *
	 * @return Parameter
	 */
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * Get type
	 *
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

}
