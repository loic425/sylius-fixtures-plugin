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

namespace Tests\Acme\SyliusExamplePlugin\Doctrine\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Tests\Acme\SyliusExamplePlugin\PurgeDatabaseTrait;
use Zenstruck\Foundry\Test\Factories;

final class DefaultPaymentMethodsFixturesTest extends KernelTestCase
{
    use PurgeDatabaseTrait;
    use Factories;

    /** @test */
    public function it_creates_default_payment_methods(): void
    {
        self::bootKernel();

        /** @var Fixture $fixture */
        $fixture = self::getContainer()->get('sylius.fixtures_plugin.doctrine.fixtures.default_payment_methods');

        $fixture->load(self::getContainer()->get('doctrine.orm.entity_manager'));

        $paymentMethods = $this->getPaymentMethodRepository()->findAll();

        $this->assertCount(2, $paymentMethods);
    }

    private function getPaymentMethodRepository(): RepositoryInterface
    {
        return static::getContainer()->get('sylius.repository.payment_method');
    }
}
