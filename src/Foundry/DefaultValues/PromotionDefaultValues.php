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

namespace Akawakaweb\ShopFixturesPlugin\Foundry\DefaultValues;

use Faker\Generator;

final class PromotionDefaultValues implements DefaultValuesInterface
{
    public function __invoke(Generator $faker): array
    {
        return [
            'appliesToDiscounted' => $faker->boolean(),
            'code' => $faker->text(),
            'couponBased' => $faker->boolean(),
            'createdAt' => $faker->dateTime(),
            'exclusive' => $faker->boolean(),
            'name' => $faker->text(),
            'priority' => $faker->randomNumber(),
            'used' => $faker->randomNumber(),
        ];
    }
}
