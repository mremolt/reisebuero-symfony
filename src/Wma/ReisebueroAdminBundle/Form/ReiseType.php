<?php

namespace Wma\ReisebueroAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ReiseType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('titel');
        $builder->add('preis', 'money', array('currency' => 'EUR'));
        $builder->add('kategorie');
        $builder->add('region');
        $builder->add('kurzbeschreibung');
        $builder->add('beschreibung');
        $builder->add('beginn');
        $builder->add('ende');
        $builder->add('bild');
        $builder->add('thumbnail');
    }
}