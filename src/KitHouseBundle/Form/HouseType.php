<?php

namespace KitHouseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HouseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sellStatus')->add('title')->add('type')->add('trait')->add('address')->add('areaId')->add('propertyFee')->add('propertyCompany')->add('location')->add('priceType')->add('price')->add('owership')->add('telephone')->add('sellAddress')->add('bus')->add('education')->add('hospital')->add('bank')->add('planArea')->add('buildArea')->add('households')->add('carport')->add('plotRatio')->add('greeningRate')->add('openDate')->add('completionDate')->add('buildingType')->add('developers')->add('decorateType')->add('bbs')->add('tags')->add('setPrice')->add('content')->add('thumbOne')->add('thumbTwo')->add('thumbThree')->add('editor')->add('level')->add('status')->add('hits')->add('tplId')->add('createAt')->add('updateAt')->add('ip')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KitHouseBundle\Entity\House'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'kithousebundle_house';
    }


}
