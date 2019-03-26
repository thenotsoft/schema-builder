<?php declare(strict_types=1);
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

namespace Cycle\Schema;

use Cycle\Schema\Definition\Entity;

/**
 * Gives ability for the relation to be inverted.
 */
interface InversableInterface extends RelationInterface
{
    /**
     * Return all targets to which relation must be inversed to.
     *
     * @param Registry $registry
     * @return Entity[]
     */
    public function inverseTargets(Registry $registry): array;

    /**
     * Inverse relation options into given schema.
     *
     * @param RelationInterface $relation
     * @param string            $into Target relation name.
     * @return RelationInterface
     */
    public function inverseRelation(RelationInterface $relation, string $into): RelationInterface;
}