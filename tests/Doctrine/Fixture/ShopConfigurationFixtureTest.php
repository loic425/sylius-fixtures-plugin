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

namespace Tests\Acme\SyliusExamplePlugin\Doctrine\Fixture;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Tests\Acme\SyliusExamplePlugin\PurgeDatabaseTrait;
use Zenstruck\Foundry\Test\Factories;

final class ShopConfigurationFixtureTest extends KernelTestCase
{
    use PurgeDatabaseTrait;
    use Factories;

    /** @test */
    public function it_creates_shop_configuration(): void
    {
        self::bootKernel();

        /** @var Fixture $fixture */
        $fixture = self::getContainer()->get('sylius.shop_fixtures.foundry.fixture.shop_configuration');

        $fixture->load(self::getContainer()->get('doctrine.orm.entity_manager'));

        $adminUsers = $this->getAdminUserRepository()->findAll();
        $channels = $this->getChannelRepository()->findAll();
        $customerGroups = $this->getCustomerGroupRepository()->findAll();
        $customers = $this->getCustomerRepository()->findAll();
        $shippingMethods = $this->getShippingMethodRepository()->findAll();
        $taxa = $this->getTaxonRepository()->findAll();
        $taxCategories = $this->getTaxCategoryRepository()->findAll();

        $this->assertCount(2, $adminUsers);
        $this->assertCount(1, $channels);
        $this->assertCount(1, $customers);
        $this->assertCount(2, $customerGroups);
        $this->assertCount(3, $shippingMethods);
        $this->assertCount(1, $taxa);
        $this->assertCount(2, $taxCategories);
    }

    private function getAdminUserRepository(): RepositoryInterface
    {
        return self::getContainer()->get('sylius.repository.admin_user');
    }

    private function getChannelRepository(): RepositoryInterface
    {
        return self::getContainer()->get('sylius.repository.channel');
    }

    private function getCustomerRepository(): RepositoryInterface
    {
        return static::getContainer()->get('sylius.repository.customer');
    }

    private function getCustomerGroupRepository(): RepositoryInterface
    {
        return static::getContainer()->get('sylius.repository.customer_group');
    }

    private function getShippingMethodRepository(): RepositoryInterface
    {
        return static::getContainer()->get('sylius.repository.shipping_method');
    }

    private function getTaxonRepository(): RepositoryInterface
    {
        return static::getContainer()->get('sylius.repository.taxon');
    }

    private function getTaxCategoryRepository(): RepositoryInterface
    {
        return static::getContainer()->get('sylius.repository.tax_category');
    }
}
