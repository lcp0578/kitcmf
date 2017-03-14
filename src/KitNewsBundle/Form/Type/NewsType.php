<?php
namespace KitNewsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use KitBaseBundle\Form\Type\FulltextType;

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
                'label' => '关键字'
            ])
            ->add('author', null, [
                'label' => '作者'
            ])
            ->add('introduction', TextareaType::class, [
                'label' => '简介'
            ])
            ->add('content', NewsContentType::class)
//             ->add('content', FulltextType::class, [
//                 'attr' => [
//                     'id' => 'myEditor',
//                     'width' => '80%',
//                     'height' => '240px'
//                 ],
//                 'label' => '文章内容'
//             ])
            ->add('submit', SubmitType::class, [
                'label' => '提交'
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'KitNewsBundle\Entity\News'
        ]);
    }
}