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

namespace Tests\Akawakaweb\SyliusFixturesPlugin\Doctrine\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Tests\Akawakaweb\SyliusFixturesPlugin\PurgeDatabaseTrait;
use Zenstruck\Foundry\Test\Factories;

final class RandomProductReviewsFixturesTest extends KernelTestCase
{
    use PurgeDatabaseTrait;
    use Factories;

    /** @test */
    public function it_creates_random_product_reviews(): void
    {
        self::bootKernel();

        /** @var Fixture $fixture */
        $fixture = self::getContainer()->get('sylius.fixtures_plugin.doctrine.fixtures.random_product_reviews');

        $fixture->load(self::getContainer()->get('doctrine.orm.entity_manager'));

        $productReviews = $this->getProductReviewRepository()->findAll();

        $this->assertCount(40, $productReviews);
    }

    private function getProductReviewRepository(): RepositoryInterface
    {
        return static::getContainer()->get('sylius.repository.product_review');
    }
}
