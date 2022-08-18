<?php

namespace App\Entity;

use App\Entity\MismanagedPlastic;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use function PHPUnit\Framework\assertEquals;

/**
 * Test cases for Entity MismanagedPlastic.
 */
class MismanagedPlasticTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    private $mismanagedPlasticRepository;

    /**
     * SetUp environment for test
     * Will grab data from the mismanagedPlasticRepository
     */
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
        $this->mismanagedPlasticRepository = $this->entityManager
            ->getRepository(MismanagedPlastic::class);
    }

    /**
     * 
     */
    public function testGetId()
    {
        $mismanagedPlasticInSweden = $this->mismanagedPlasticRepository->findOneBy(['country' => 'Sweden']);
        $countryId = $mismanagedPlasticInSweden->getId();
        $this->assertNotEmpty($countryId);
        $this->assertIsInt($countryId);
        assertEquals(143, $countryId);
    }

    /**
     * Test to make sure country name is not Empty and is a string. 
     */
    public function testGetCountry()
    {
        $mismanagedPlasticInNorway = $this->mismanagedPlasticRepository->findOneBy(['country' => 'Norway']);
        $this->assertNotEmpty($mismanagedPlasticInNorway->getCountry());
        $this->assertIsString($mismanagedPlasticInNorway->getCountry());
        $this->assertNotEmpty($mismanagedPlasticInNorway->getCountry());
    }

    /**
     * Test to change a country name 
     */

    public function testSetCountry()
    {
        $mismanagedPlasticInNorway = $this->mismanagedPlasticRepository->findOneBy(['country' => 'Finland']);
        $mismanagedPlasticInNorway->setCountry('Suomi');
        $this->assertIsString($mismanagedPlasticInNorway->getCountry());
        $this->assertNotEmpty($mismanagedPlasticInNorway->getCountry());
    }

    /**
     * Test to get the year
     */
    public function testGetYear()
    {
        $mismanagedPlasticInSweden = $this->mismanagedPlasticRepository->findOneBy(['country' => 'Sweden']);
        $year = $mismanagedPlasticInSweden->getYear();
        $this->assertNotEmpty($year);
        $this->assertIsInt($year);
        assertEquals(2019, $year);
    }

    /**
     * Test to set the year
     */
    public function testSetYear()
    {
        $mismanagedPlasticInSweden = $this->mismanagedPlasticRepository->findOneBy(['country' => 'Sweden']);
        $mismanagedPlasticInSweden->setYear(2020);
        $year = $mismanagedPlasticInSweden->getYear();
        $this->assertNotEmpty($year);
        $this->assertIsInt($year);
        assertEquals(2020, $year);
    }

    /**
     * Test to get the plasticProbability
     */
    public function testGetProbabilityOfPlasticBeingEmittedToOcean()
    {
        $mismanagedPlasticInSweden = $this->mismanagedPlasticRepository->findOneBy(['country' => 'Sweden']);
        $plastic = $mismanagedPlasticInSweden->getProbabilityOfPlasticBeingEmittedToOcean();
        $this->assertNotEmpty($plastic);
        $this->assertIsFloat($plastic);
        assertEquals(1.03, $plastic);
    }

    /**
     * Test to get the year
     */
    public function testSetProbabilityOfPlasticBeingEmittedToOcean()
    {
        $mismanagedPlasticInSweden = $this->mismanagedPlasticRepository->findOneBy(['country' => 'Sweden']);
        $mismanagedPlasticInSweden->setProbabilityOfPlasticBeingEmittedToOcean(1.50);
        $plastic = $mismanagedPlasticInSweden->getProbabilityOfPlasticBeingEmittedToOcean();
        $this->assertNotEmpty($plastic);
        $this->assertIsFloat($plastic);
        assertEquals(1.50, $plastic);
    }
}
