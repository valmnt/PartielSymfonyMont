<?php

namespace App\DataFixtures;

use App\Entity\Advert;
use App\Entity\User;
use App\Utils\EstimationPrix;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $estimationPrix;
    private $passwordEncoder;

    public function __construct(EstimationPrix $estimationPrix, UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->estimationPrix = $estimationPrix;
        $this->passwordEncoder = $userPasswordEncoderInterface;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 50; $i++) {
            $advert = new Advert();
            $year = $faker->year();
            $km =  $faker->numberBetween($min = 50000, $max = 100000);
            $days = $faker->numberBetween($min = 1, $max = 15);

            $advert->setTitle($faker->sentence($nbWords = 3, $variableNbWords = true))
                ->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true))
                ->setCity($faker->state())
                ->setCarYear($year)
                ->setNbKm($km)
                ->setNbDays($days)
                ->setPrice($this->estimationPrix->Price($year, $km, $days));

            $manager->persist($advert);
        }
        for ($i = 0; $i <= 5; $i++) {
            $user = new User();
            $user->setEmail($faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPassword($this->passwordEncoder->encodePassword($user, 'user'));

            $manager->persist($user);
        }

        $user = new User();
        $user->setEmail('mnt@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->passwordEncoder->encodePassword($user, 'val'));

        $manager->persist($user);

        $manager->flush();
    }
}
