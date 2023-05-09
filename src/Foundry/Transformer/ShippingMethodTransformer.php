<?php

/*
 * This file is part of ShopFixturesPlugin.
 *
 * (c) Akawaka
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Akawakaweb\ShopFixturesPlugin\Foundry\Transformer;

final class ShippingMethodTransformer implements TransformerInterface
{
    use TransformNameToCodeAttributeTrait;

    public function transform(array $attributes): array
    {
        return $this->transformNameToCodeAttribute($attributes);
    }
}
