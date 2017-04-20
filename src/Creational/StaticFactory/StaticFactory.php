<?php
/**
 * @name 静态工厂模式
 */

namespace DesignPatterns\Creational\StaticFactory;

use InvalidArgumentException;

final class StaticFactory
{
    const TYPE_STRING = 'string';
    const TYPE_NUMBER = 'number';

    /**
     * @param string $type
     * @return FormatterInterface
     */
    public static function factory(string $type): FormatterInterface
    {
        if ($type === self::TYPE_NUMBER)
            return new NumberFormatter();

        if ($type === self::TYPE_STRING)
            return new StringFormatter();

        throw new InvalidArgumentException(sprintf('Unknown formatter type %s', $type));
    }
}
