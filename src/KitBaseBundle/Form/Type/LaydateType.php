<?php
namespace KitBaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LaydateType extends AbstractType 
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'placeholder' => '请输入日期',
            'onclick' => 'laydate()'
        ));
    }
    
    public function getParent()
    {
        return TextType::class;
    }
}