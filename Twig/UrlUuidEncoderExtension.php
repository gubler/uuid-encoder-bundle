<?php

declare(strict_types=1);

namespace Gubler\UuidEncoderBundle\Twig;

use Gubler\UuidEncoderBundle\Util\UrlUuidEncoder;
use Ramsey\Uuid\UuidInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class UrlUuidEncoderExtension extends AbstractExtension
{
    /** @var UrlUuidEncoder */
    private $encoder;

    public function __construct(UrlUuidEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter(
                'urlUuid',
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
