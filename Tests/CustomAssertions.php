<?php

namespace FOS\OAuthServerBundle\Tests;

use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;

trait CustomAssertions {
    use ArraySubsetAsserts;

    /**
     * Replacement for assert removed in PHPUnit 9.
     *
     * @param mixed $expected
     * @param object $actualObject
     */
    public static function assertAttributeSame($expected, string $actualAttributeName, $actualObject, string $message = ''): void
    {
        $prop = new \ReflectionProperty(\get_class($actualObject), $actualAttributeName);

        $prop->setAccessible(true);
        self::assertSame($expected, $prop->getValue($actualObject));
    }
}
