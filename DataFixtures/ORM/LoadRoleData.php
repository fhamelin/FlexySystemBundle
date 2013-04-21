<?php

namespace Egzakt\Frontend\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Egzakt\SystemBundle\Entity\Role;
use Egzakt\SystemBundle\Entity\RoleTranslation;

class LoadRoleData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $role = new Role();
        $role->setRoleName('ROLE_ADMIN');

        $roleFr = new RoleTranslation();
        $roleFr->setLocale($manager->merge($this->getReference('locale-fr'))->getCode());
        $roleFr->setName('Administrateur');
        $roleFr->setTranslatable($role);

        $roleEn = new RoleTranslation();
        $roleEn->setLocale($manager->merge($this->getReference('locale-en'))->getCode());
        $roleEn->setName('Administrator');
        $roleEn->setTranslatable($role);

        $manager->persist($role);
        $manager->persist($roleFr);
        $manager->persist($roleEn);

        $manager->flush();

        $this->addReference('role-admin', $role);
    }

    /**
     * Get Order
     *
     * @return int
     */
    public function getOrder()
    {
        return 6;
    }
}