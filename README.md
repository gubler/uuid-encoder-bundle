# UuidEncoderBundle

This bundle provides Symfony integration for gubler/uuid-encoder with some helper utilities and twig extensions.

This autowires/autoconfigures the following classes:

- `UuidEncoder`
- `UrlUuidEncoder`
- `FilesystemUuidEncoder`

Each has default character sets (which characters are used to encode the UUID). `UrlUuidEncoder` and `FilesystemUuidEncoder` are wrappers around `UuidEncoder` that define a default character set.

You can configure the character set for each class by updating the `config/packages/gubler_uuid_encoder.yaml` file (shown here with defaults:

```yaml
gubler_uuid_encoder:
    charset:
        default: ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789
        url: ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_~.
        filesystem: ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789
``` 

You can also use the following Twig extensions for encoding UUIDs in your templates:

```twig

{# data.id is a UUID #}

Encoded UUID with UuidEncoder is {{ data.id|uuidEncoder }}

Encoded UUID with UrlUuidEncoder is {{ data.id|urlUuid }}

Encoded UUID with FilesystemUuidEncoder is {{ data.id|filesystemUuid }}

```
