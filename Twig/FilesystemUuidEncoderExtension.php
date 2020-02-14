<?php

declare(strict_types=1);

namespace Gubler\UuidEncoderBundle\Twig;

use Gubler\UuidEncoderBundle\Util\FilesystemUuidEncoder;
use Ramsey\Uuid\UuidInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FilesystemUuidEncoderExtension extends AbstractExtension
{
    /** @var FilesystemUuidEncoder */
    private $encoder;

    public function __construct(FilesystemUuidEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter(
                'fsUuid',
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
