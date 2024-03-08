<?php

namespace App\Tests\Kernel;

use App\Tests\TestTrait;
use Doctrine\DBAL\Exception;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DatabaseTest extends KernelTestCase
{
    use TestTrait;

    /**
     * @throws Exception
     * @return void
     */
    public function testSchemas(): void
    {
        $query = 'select schema_name from information_schema.schemata order by schema_name';

        $result = $this
            ->getDbConnection($this)
            ->fetchAllAssociative($query);

        $schemas = array_column($result, 'schema_name');

        $expected = [
            'information_schema',
            'pg_catalog',
            'pg_toast',
            'public',
        ];

        $this->assertEquals($expected, $schemas);
    }
}
