<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('immatriculation')
            ->add('circulationAt')
            ->add('c1_titulaire')
            ->add('c4_proprietaire')
            ->add('c4_cotitulaire')
            ->add('c3_adresse')
            ->add('d1_marque')
            ->add('d2_version')
            ->add('d21_cnit')
            ->add('d3_commercial')
            ->add('e_identification')
            ->add('f1_ptac')
            ->add('f2_masse')
            ->add('f3_ptra')
            ->add('g_poidsmarche')
            ->add('g1_poidsvide')
            ->add('i_certificatAt')
            ->add('j_categorie')
            ->add('j1_genre')
            ->add('j2_carrosserie')
            ->add('j3_nat')
            ->add('k_reception')
            ->add('p1_cylindree')
            ->add('p2_puissance')
            ->add('p3_energie')
            ->add('p6_fiscal')
            ->add('q_kwkg')
            ->add('s1_assis')
            ->add('s2_debout')
            ->add('u1_sonore')
            ->add('u2_moteur')
            ->add('v7_co2')
            ->add('v9_classe')
            ->add('x1_visiteAt')
            ->add('y1_region')
            ->add('y2_formation')
            ->add('y3_ecotaxe')
            ->add('y4_gestion')
            ->add('y5_redevance')
            ->add('y6_total')
            ->add('acheterAt')
            ->add('valeur_achat')
            ->add('odometer')
            ->add('fiche_technique')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
