<?php
namespace KitNewsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => '标题'
            ])
            ->add('thumb', null, [
                'label' => '标题图片'
            ])
            ->add('keyword', null, [
                'label' => '标题图片'
            ])
            ->add();
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'KitNewsBundle\Entity\News'
        ]);
    }
}