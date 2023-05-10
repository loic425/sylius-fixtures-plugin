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

namespace Akawakaweb\ShopFixturesPlugin\Foundry\Updater;

interface UpdaterInterface
{
    public function __invoke(object $object, array $attributes): array;

    public function allowExtraAttributes(array $attributes = []): self;

    public function alwaysForceProperties(array $properties = []): self;
}
