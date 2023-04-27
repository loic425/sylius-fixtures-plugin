<?php

declare(strict_types=1);

namespace Akawakaweb\ShopFixturesPlugin\Foundry\DefaultValues;

use Faker\Generator;
use Sylius\Component\Core\Model\CustomerInterface;

final class CustomerDefaultValues implements CustomerDefaultValuesInterface
{
    public function getDefaultValues(Generator $faker): array
    {
        return [
            'createdAt' => $faker->dateTime(),
            'firstName' => $faker->firstName(),
            'lastName' => $faker->firstName(),
            'email' => $faker->email(),
            'gender' => CustomerInterface::UNKNOWN_GENDER,
            'phoneNumber' => $faker->phoneNumber(),
            'birthday' => $faker->dateTimeBetween('-80 years', '-18 years'),
            'subscribedToNewsletter' => $faker->boolean(),
        ];
    }
}
