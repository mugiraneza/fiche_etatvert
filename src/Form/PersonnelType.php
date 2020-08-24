<?php

namespace App\Form;

use App\Entity\Personnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule')
            ->add('nom')
            ->add('prenom')
            ->add('datenaissance', DateType::class, array(
                'widget' => 'single_text',
                'html5' => true,
                'required' => true,
                'attr' => array(
                    'data-provide' => 'datetimepicker',
                    'data-format' => 'dd/mm/yyyy',
                    'input' => 'string',
                    'input_format' => 'Y-m-d')
            ))
            ->add('nationalite')
            ->add('numcartesejour')
            ->add('datevalidite', DateType::class, array(
                'widget' => 'single_text',
                'html5' => true,
                'required' => true,
                'attr' => array(
                    'data-provide' => 'datetimepicker',
                    'data-format' => 'dd/mm/yyyy',
                    'input' => 'string',
                    'input_format' => 'Y-m-d')
            ))
            ->add('situationfamille', ChoiceType::class, array(
                'choices'=> [
                    '...'=> null,
                    'Célibataire'=>'Célibataire',
                    'Marié'=>'Marié',
                    'Vie maritale'=>'Vie maritale',
                ]
            ))
            ->add('enfantscharge')
            ->add('numsecuritesociale')
            ->add('adresse')
            ->add('codepostal')
            ->add('ville_code_postal')
            ->add('tel')
            ->add('mail')
            ->add('emploi')
            ->add('qualification')
            ->add('cocontrat', ChoiceType::class, [
                'choices'=>[
                    '...'=> null,
                    'CDD'=>'CDD',
                    'CDI'=>'CDI',
                    'Stagiaire'=>'Stagiaire',
                    'Apprentissage'=>'Apprentissage',
                    'Professionnalisation'=>'Professionnalisation' ],
            ])
            ->add('dureemois')
            ->add('salaire_mensuel')
            ->add('avantages_natures')
            ->add('date_entree', DateType::class, array(
                'widget' => 'single_text',
                'html5' => true,
                'required' => true,
                'attr' => array(
                    'data-provide' => 'datetimepicker',
                    'data-format' => 'dd/mm/yyyy',
                    'input' => 'string',
                    'input_format' => 'Y-m-d')
            ))
            ->add('datesortie', DateType::class, array(
                'widget' => 'single_text',
                'html5' => true,
                'required' => true,
                'attr' => array(
                    'data-provide' => 'datetimepicker',
                    'data-format' => 'dd/mm/yyyy',
                    'input' => 'string',
                    'input_format' => 'Y-m-d')
            ))
            ->add('situationembauche', ChoiceType::class, [
                'choices'=> array(
                '...'=> null,
                'CDD'=>'CDD',
                'CDI'=>'CDI',
                'Étudiant'=>'Étudiant',
                'Demandeur d\'emploi'=>'Demandeur d\'emploi',
                'Sans emploi'=>'Sans emploi'),
            ])
            ->add('sex', ChoiceType::class, [
                'choices'=> array(
                    'Non Spécifé'=> 'Non Spécifié',
                    'Masculin'=>'Masculin',
                    'Feminin'=>'Feminin'
                )
            ])
            ->add('nombre_epoux_se')
            ->add('entreprise')
            ->add('dossier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personnel::class,
        ]);
    }
}
