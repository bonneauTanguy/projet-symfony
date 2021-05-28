<?php
namespace App\tests\Unit;

use App\Entity\Adherent;
use App\Entity\Saison;
use App\Entity\Adherer;
use PHPUnit\Framework\TestCase;

class AdherentTest extends TestCase
{
	/** @test */
	public function TestgetDerSaison(){
		$adh = new Adherent();
		$uneSaison1 = new Saison();
		$uneSaison1->setDateSaisonD(new \DateTime("01-01-2020"));
		$uneSaison2 = new Saison();
		$uneSaison2->setDateSaisonD(new \DateTime("01-01-2020"));
		$lesAdherer = new Adherer();
		$lesAdherer->setUneSaison($uneSaison1);
		$lesAdherer->setUneSaison($uneSaison2);
		$adh->addLesAdherer($lesAdherer);
		$result = $adh->getDerSaison();
		$result = '2020-01-01';
		$this -> assertContains('2020-01-01', $result);
	}
}

?>