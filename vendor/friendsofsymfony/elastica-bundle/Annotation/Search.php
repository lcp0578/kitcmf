<?php

namespace FOS\ElasticaBundle\Annotation;

/**
 * Annotation class for setting search repository.
 *
 * @author Richard Miller <info@limethinking.co.uk>
 * @Annotation
 * @Target("CLASS")
 */
class Search
{
    /** @var string */
    public $repositoryClass;
}
