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

namespace Akawakaweb\SyliusFixturesPlugin\Foundry\Updater;

use Akawakaweb\SyliusFixturesPlugin\Foundry\Factory\LocaleFactory;
use Sylius\Component\Locale\Model\LocaleInterface;
use Sylius\Component\Product\Model\ProductOptionValueInterface;
use Webmozart\Assert\Assert;
use Zenstruck\Foundry\Proxy;

final class ProductOptionValueUpdater implements UpdaterInterface
{
    public function __construct(
        private UpdaterInterface $decorated,
    ) {
    }

    public function __invoke(object $object, array $attributes): array
    {
        Assert::isInstanceOf($object, ProductOptionValueInterface::class);

        $value = $attributes['value'] ?? null;
        Assert::nullOrString($value);

        $attributes = ($this->decorated)($object, $attributes);

        /** @var Proxy<LocaleInterface> $locale */
        foreach (LocaleFactory::all() as $locale) {
            $localeCode = $locale->getCode() ?? '';

            $object->setCurrentLocale($localeCode);
            $object->setFallbackLocale($localeCode);

            $object->setValue($value);
        }

        return $attributes;
    }
}
