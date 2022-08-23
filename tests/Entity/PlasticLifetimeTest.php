<?php

namespace App\Entity;

use App\Entity\PlasticLifetime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;

/**
 * Test cases for Entity MismanagedPlastic.
 */

class PlasticLifetimeTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    private $plasticLifeRepository;

    /**
     * SetUp environment for test
     * Will grab data from the
     * mismanagedPlasticRepository
     */
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
        $this->mismanagedPlasticRepository = $this->entityManager
            ->getRepository(PlasticLifetime::class);
    }

    /**
     * Test to check that id is 
     * not empty and an integer
     */
    public function testGetId()
    {
        $plasticLifeInPackaging = $this->mismanagedPlasticRepository->findOneBy(['sector' => 'Packaging']);
        $plasticLifeTimeId = $plasticLifeInPackaging->getId();
        $this->assertNotEmpty($plasticLifeTimeId);
        $this->assertIsInt($plasticLifeTimeId);
        assertEquals(6, $plasticLifeTimeId);
    }
    /**
     * Test to make sure sector name is 
     * not empty and is a string. 
     */
    public function testGetSector()
    {
        $plasticLifeInPackaging = $this->mismanagedPlasticRepository->findOneBy(['sector' => 'Packaging']);
        $this->assertNotEmpty($plasticLifeInPackaging->getSector());
        $this->assertIsString($plasticLifeInPackaging->getSector());
        $this->assertNotEmpty($plasticLifeInPackaging->getSector());
    }
    /**
     * Test to change a sector 
     */
    public function testSetSector() 
    {
        $plasticLifeInPackaging = $this->mismanagedPlasticRepository->findOneBy(['sector' => 'Packaging']);
        $plasticLifeInPackaging->SetSector('Transport packaging');
        $this->assertIsString($plasticLifeInPackaging->getSector());
        $this->assertNotEmpty($plasticLifeInPackaging->getSector());
    }
}
