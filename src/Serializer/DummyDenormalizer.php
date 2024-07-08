<?php

namespace App\Serializer;

use App\Entity\Dummy;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

class DummyDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $data = $this->denormalizer->denormalize($data, $class, $format, $context + [__CLASS__ => true]);

        $data->setSlug(bin2hex(random_bytes(16)));

        return $data;
    }

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return (
            \in_array($format, ['json', 'jsonld'], true) &&
            is_a($type, Dummy::class, true) &&
            !isset($context[__CLASS__])
        );
    }
}
