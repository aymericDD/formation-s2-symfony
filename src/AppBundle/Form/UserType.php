<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('plainPassword')
            ->add('name')
            ->add('firstname')
            ->add('roles', 'choice',array(
                'choices' => array(
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                    'ROLE_MODERATOR' => 'ROLE_MODERATOR',
                    'ROLE_USER' => 'ROLE_USER',
                    'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN',
                ),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('enabled', 'checkbox', array(
                'required' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_user';
    }
}
