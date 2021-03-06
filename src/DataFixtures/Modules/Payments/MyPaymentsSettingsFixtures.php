<?php

namespace App\DataFixtures\Modules\Payments;

use App\DataFixtures\Providers\Modules\PaymentsSettings;
use App\Entity\Modules\Payments\MyPaymentsSettings;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class MyPaymentsSettingsFixtures extends Fixture implements OrderedFixtureInterface
{

    /**
     * Factory $faker
     */
    private $faker;

    const MULTIPLIER = 4.56;

    const SETTING_NAME = 'type';

    public function __construct() {
        $this->faker = Factory::create('en');

    }

    public function load(ObjectManager $manager)
    {

        $currency_multiplier = new MyPaymentsSettings();
        $currency_multiplier->setName('currency_multiplier');
        $currency_multiplier->setValue(static::MULTIPLIER);

        $manager->persist($currency_multiplier);

        foreach ( PaymentsSettings::CATEGORIES_NAMES as $category_name ) {

            $payment_type = new MyPaymentsSettings();
            $payment_type->setName(static::SETTING_NAME);
            $payment_type->setValue($category_name);

            $manager->persist($payment_type);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder() {
        return 4;
    }
}
