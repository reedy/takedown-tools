<?php

namespace App\Entity\Takedown;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="takedown_cp")
 *
 * @TODO add validation.
 */
class ChildProtection {

	/**
	 * @var Takedown
	 *
	 * @ORM\Id
	 * @ORM\OneToOne(targetEntity="App\Entity\Takedown\Takedown")
   * @ORM\JoinColumn(name="takedown_id", referencedColumnName="takedown_id")
	 */
	private $id;

}
