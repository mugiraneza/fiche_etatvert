<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\Moistraitement;
use App\Entity\Personnel;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker= Factory::create('FR_fr ');
        //CREATION ENTREPRISE
        $entreprise = new Entreprise();
        $entreprise->setLibelle($faker->company)
            ->setNomcreateur('CISCO ACADEMIE')
            ->setLogo('logo.jpg')
            ->setCreationdate(new \DateTime())
            ->setNomdirecteur($faker->name)
            ->setRccm('REWQREW321DS')
            ->setNomresponsablecomptable($faker->name);
        $manager->persist($entreprise);
        $manager->flush();
        //CREATION UTILISATEUR
        $utilisateur = new Utilisateur();
        $utilisateur->setLogin('admin')
        ->setPrenom('oscar')
        ->setNom('mugiranezao')
        ->setMail('mugiranezao@gmail.com')
        ->setPassword($this->encoder->encodePassword($utilisateur, 'goslowchrist0'))
        ->setConfirmPassword($this->encoder->encodePassword($utilisateur, 'goslowchrist0'))
        ->setEntreprise($entreprise);
        $manager->persist($utilisateur);
        $manager->flush();
        //CREATION MOISTRAITEMENT
        for($i=1;$i<17;$i++){
            $mois=new Moistraitement();
            if($i==1)$mois->setNumeros($i)->setLibelle( 'Janvier')->setCode('JAN')->setAffichage('true');
            if($i==2)$mois->setNumeros($i)->setLibelle( 'Fevrier')->setCode('FEV')->setAffichage('true');
            if($i==3)$mois->setNumeros($i)->setLibelle( 'Mars')->setCode('MAR')->setAffichage('true');
            if($i==4)$mois->setNumeros($i)->setLibelle( 'Avril')->setCode('AVR')->setAffichage('true');
            if($i==5)$mois->setNumeros($i)->setLibelle( 'Mai')->setCode('MAI')->setAffichage('true');
            if($i==6)$mois->setNumeros($i)->setLibelle( 'Juin')->setCode('JUN')->setAffichage('true');
            if($i==7)$mois->setNumeros($i)->setLibelle( 'Juillet')->setCode('JUL')->setAffichage('true');
            if($i==8)$mois->setNumeros($i)->setLibelle( 'Aout')->setCode('AUT')->setAffichage('true');
            if($i==9)$mois->setNumeros($i)->setLibelle( 'Septembre')->setCode('SEP')->setAffichage('true');
            if($i==10)$mois->setNumeros($i) ->setLibelle('Octobre')->setCode('OCT')->setAffichage('true');
            if($i==11)$mois->setNumeros($i)->setLibelle('Novembre')->setCode('NOV')->setAffichage('true');
            if($i==12)$mois->setNumeros($i)->setLibelle('Gratification')->setCode('GRATIF')->setAffichage('false');
            if($i==13)$mois->setNumeros($i)->setLibelle('13é Mois')->setCode('13 EME')->setAffichage('false');
            if($i==14)$mois->setNumeros($i)->setLibelle('TOTAL 1')->setCode('TOTAL1')->setAffichage('false');
            if($i==15)$mois->setNumeros($i)->setLibelle('Décembre')->setCode('DEC')->setAffichage('true');
            if($i==16)$mois->setNumeros($i)->setLibelle('TOTAL 2')->setCode('TOTAL2')->setAffichage('false');
            $manager->persist($mois);
            $manager->flush();
        }
        //CREATION POSTE
        $finder = new Finder();
        $finder->in('public/sql');
        $finder->name('poste.sql');

        foreach( $finder as $file ){
            $content = $file->getContents();
            $manager->getConnection()->exec($content);
            $manager->flush();
        }
    }
}
