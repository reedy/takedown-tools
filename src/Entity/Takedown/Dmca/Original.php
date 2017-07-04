<?php

namespace App\Entity\Takedown\Dmca;

use App\Entity\Takedown\Dmca\Dmca;
use Doctrine\ORM\Mapping as ORM;
use GeoSocio\EntityAttacher\Annotation\Attach;
use GeoSocio\EntityUtils\ParameterBag;

/**
 * @ORM\Entity
 * @ORM\Table(name="takedown_dmca_original")
 *
 * @todo add validation.
 */
class Original {

	/**
	 * @var Dmca
	 *
	 * @ORM\Id
	 * @ORM\ManyToOne(
	 *	targetEntity="App\Entity\Takedown\Dmca\Dmca",
	 *	inversedBy="originals"
	 *)
	 * @ORM\JoinColumn(name="takedown_id", referencedColumnName="takedown_id")
	 * @Attach()
	 */
	private $dmca;

	/**
	 * @var string
	 *
	 * The Prefixed DB Key.
	 *
	 * @ORM\Id
	 * @ORM\Column(name="url", type="string", length=511)
	 */
	private $url;

	/**
	 * Takedown
	 *
	 * @param array $data Data to construct the object.
	 */
	public function __construct( array $data = [] ) {
		$params = new ParameterBag( $data );
		$this->dmca = $params->getInstance( 'dmca', Dmca::class, new Dmca() );
		$this->url = $params->getString( 'url' );
	}

	/**
	 * Set Dmca
	 *
	 * @param Dmca $dmca Dmca
	 *
	 * @return self
	 */
	public function setDmca( Dmca $dmca ) : self {
		$this->dmca = $dmca;

		return $this;
	}

	/**
	 * Get Dmca
	 *
	 * @return Dmca
	 */
	public function getDmca() :? Dmca {
		return $this->dmca;
	}

	/**
	 * Set Url.
	 *
	 * @param string $url Url
	 *
	 * @return self
	 */
	public function setUrl( string $url ) {
		$this->url = $url;

		return $this;
	}

	/**
	 * Get Url
	 *
	 * @return string
	 */
	public function getUrl() :? string {
		return $this->url;
	}
}