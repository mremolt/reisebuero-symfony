<?php

namespace Wma\ReisebueroAdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ReiseType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('titel');
        //$builder->add('preis', 'money', array('currency' => 'USD'));
        $builder->add('preis');
    }
}