<?php

/*
 * This file is part of SyliusFixturesPlugin.
 *
 * (c) Akawaka
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Akawakaweb\SyliusFixturesPlugin\Foundry\Transformer;

final class CustomerTransformer implements TransformerInterface
{
    use TransformStringToDateAttributeTrait;

    public function transform(array $attributes): array
    {
        return $this->transformStringToDateAttribute($attributes, 'birthday');
    }
}
