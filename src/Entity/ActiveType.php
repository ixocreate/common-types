<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Type\Entity;

use Doctrine\DBAL\Types\StringType;
use Ixocreate\Entity\Type\AbstractType;
use Ixocreate\Type\DatabaseTypeInterface;

final class ActiveType extends AbstractType implements DatabaseTypeInterface
{
    /**
     * @param $value
     * @throws \Exception
     * @return mixed
     */
    public function transform($value)
    {
        if (!\in_array($value, ['active', 'inactive'])) {
            //TODO Exception
            throw new \Exception("invalid type");
        }

        return $value;
    }

    public function convertToDatabaseValue()
    {
        return (string)$this;
    }

    public static function baseDatabaseType(): string
    {
        return StringType::class;
    }

    public static function serviceName(): string
    {
        return 'active';
    }
}
