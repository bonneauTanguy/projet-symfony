<?php

namespace App\Form;

use App\Entity\Adherent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numLicence')
            ->add('prenom')
            ->add('dateNaiss')
            ->add('rue')
            ->add('ville')
            ->add('cp')
            ->add('sexe')
            ->add('unCertificat')
            ->add('desPersonnesConf')
            ->add('uneCateg')
            ->add('desNoms')
            ->add('unPass')
            ->add('lesAdherer')
            ->add('lesMails')
            ->add('lesTel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
