<?php
namespace KitNewsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use KitNewsBundle\Repository\CategoryRepository;
use KitNewsBundle\Entity\Category;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder
            ->add('parent', EntityType::class, [
                'class' => 'KitNewsBundle:Category',
                'query_builder' => function(CategoryRepository $repo){
                    return $repo->getParentCategory();
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
            'data_class' => 'KitNewsBundle\Entity\Category'
        ]);
    }
}