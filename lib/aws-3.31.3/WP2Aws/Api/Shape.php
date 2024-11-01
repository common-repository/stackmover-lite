<?php
namespace WP2Aws\Api;

/**
 * Base class representing a modeled shape.
 */
class Shape extends AbstractModel
{
    /**
     * Get a concrete shape for the given definition.
     *
     * @param array    $definition
     * @param ShapeMap $shapeMap
     *
     * @return mixed
     * @throws \RuntimeException if the type is invalid
     */
    public static function create(array $definition, ShapeMap $shapeMap)
    {
        static $map = [
            'structure' => 'WP2Aws\Api\StructureShape',
            'map'       => 'WP2Aws\Api\MapShape',
            'list'      => 'WP2Aws\Api\ListShape',
            'timestamp' => 'WP2Aws\Api\TimestampShape',
            'integer'   => 'WP2Aws\Api\Shape',
            'double'    => 'WP2Aws\Api\Shape',
            'float'     => 'WP2Aws\Api\Shape',
            'long'      => 'WP2Aws\Api\Shape',
            'string'    => 'WP2Aws\Api\Shape',
            'byte'      => 'WP2Aws\Api\Shape',
            'character' => 'WP2Aws\Api\Shape',
            'blob'      => 'WP2Aws\Api\Shape',
            'boolean'   => 'WP2Aws\Api\Shape'
        ];

        if (isset($definition['shape'])) {
            return $shapeMap->resolve($definition);
        }

        if (!isset($map[$definition['type']])) {
            throw new \RuntimeException('Invalid type: '
                . print_r($definition, true));
        }

        $type = $map[$definition['type']];

        return new $type($definition, $shapeMap);
    }

    /**
     * Get the type of the shape
     *
     * @return string
     */
    public function getType()
    {
        return $this->definition['type'];
    }

    /**
     * Get the name of the shape
     *
     * @return string
     */
    public function getName()
    {
        return $this->definition['name'];
    }
}
