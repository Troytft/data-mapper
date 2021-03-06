<?php

namespace Troytft\DataMapperBundle\Annotation;

use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Attributes;

/**
 * @Annotation
 */
class ArrayOfEntityType extends DataMapper
{
    /**
     * @var string|null
     */
    private $class;

    /**
     * @var string|null
     */
    private $field = 'id';

    /**
     * @var bool
     */
    private $nullable = false;

    /**
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);

        if (isset($options['class'])) {
            $this->class = $options['class'];
        }

        if (isset($options['field'])) {
            $this->field = $options['field'];
        }

        if (isset($options['nullable'])) {
            $this->nullable = $options['nullable'];
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'array_of_entity';
    }

    /**
     * @inheritdoc
     */
    public function getOptions()
    {
        return array_merge(parent::getOptions(), [
            'class' => $this->class,
            'field' => $this->field,
            'nullable' => $this->nullable,
        ]);
    }
}
