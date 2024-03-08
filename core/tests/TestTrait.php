<?php

namespace App\Tests;

use Doctrine\DBAL\Connection as DBALConnection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

trait TestTrait
{
    /**
     * @param  KernelBrowser $client
     * @return array<mixed>
     */
    protected function getArrayContent(KernelBrowser $client): array
    {
        return (array) json_decode($client->getResponse()->getContent(), true);
    }

    /**
     * @param  KernelTestCase $kernel
     * @return DBALConnection
     */
    protected function getDbConnection(KernelTestCase $kernel): DBALConnection
    {
        return $this->getEntityManager($kernel)->getConnection();
    }

    /**
     * @param  KernelTestCase         $kernel
     * @return EntityManagerInterface
     */
    protected function getEntityManager(KernelTestCase $kernel): EntityManagerInterface
    {
        return $kernel::getContainer()->get('doctrine.orm.entity_manager');
    }
}
