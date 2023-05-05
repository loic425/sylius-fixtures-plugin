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

namespace Akawakaweb\ShopFixturesPlugin\Doctrine\Fixtures;

use Akawakaweb\ShopFixturesPlugin\Foundry\Story\DefaultLocalesStoryInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class DefaultLocalesFixtures extends Fixture
{
    public function __construct(
        private DefaultLocalesStoryInterface $defaultLocalesStory,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $this->defaultLocalesStory::load();
    }
}
