<?php

/**
 * Cycle ORM Schema Builder.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

declare(strict_types=1);

namespace Cycle\Schema\Tests\Relation;

use Cycle\ORM\Relation;
use Cycle\Schema\Relation\OptionSchema;
use Cycle\Schema\Relation\RelationSchema;
use PHPUnit\Framework\TestCase;

class OptionSchemaTest extends TestCase
{
    public function testAliases(): void
    {
        $options = new OptionSchema([
            'alias' => Relation::TYPE
        ]);

        $options = $options->withTemplate([
            Relation::TYPE => 200
        ]);

        $this->assertSame(200, $options->get(Relation::TYPE));

        $options = $options->withOptions([
            'alias' => 100
        ]);

        $this->assertSame(100, $options->get(Relation::TYPE));
    }

    /**
     * @expectedException \Cycle\Schema\Exception\OptionException
     */
    public function testInvalidAlias(): void
    {
        $options = new OptionSchema([
            'alias' => Relation::TYPE
        ]);

        $options = $options->withTemplate([
            Relation::TYPE => 200
        ]);

        $options->withOptions([
            'unknown' => 100
        ]);
    }

    /**
     * @expectedException \Cycle\Schema\Exception\OptionException
     */
    public function testInvalidAlias2(): void
    {
        $options = new OptionSchema([
            'alias' => Relation::TYPE
        ]);

        $options = $options->withTemplate([
            Relation::TYPE => 200
        ])->withOptions([
            'alias' => 100
        ]);

        $options->get(RelationSchema::FK_ACTION);
    }

    public function testDebugInfo(): void
    {
        $options = new OptionSchema([
            'alias' => Relation::TYPE
        ]);

        $options = $options->withTemplate([
            Relation::TYPE => 200
        ])->withOptions([
            'alias' => 100
        ]);

        $this->assertSame([
            'alias' => 100
        ], $options->__debugInfo());
    }
}
