<?php
namespace KitNewsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use KitNewsBundle\Repository\ClassifyRepository;
use KitNewsBundle\Entity\Classify;

class ClassifyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder
            ->add('parent', EntityType::class, [
                'class' => 'KitNewsBundle:Classify',
                'query_builder' => function(ClassifyRepository $repo){
                    return $repo->getParentClassify();
                },
                //'choice_label' => 'name',
                'label' => '用户组'
            ])
            ->add('name', null, [
                'label' => '分类名称'
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'KitNewsBundle\Entity\Classify'
        ]);
    }
}