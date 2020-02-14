<?php

declare(strict_types=1);

namespace Gubler\UuidEncoderBundle\Twig;

use Gubler\UuidEncoder\UuidEncoder;
use Ramsey\Uuid\UuidInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UuidEncoderExtension extends AbstractExtension
{
    /** @var UuidEncoder */
    private $encoder;

    public function __construct(UuidEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter(
                'uuidEncoder',
                [$this, 'encodeUuid']
            ),
        ];
    }

    /**
     * @param UuidInterface|string $uuid
     */
    public function encodeUuid($uuid): string
    {
        return $this->encoder->encode($uuid);
    }
}
