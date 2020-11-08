<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code')
            ->add('description')
            ->add('price')
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'label_format' => "Image",
                'label' => "Image",
                'download_link' => true,
                'allow_delete' => true,
                'asset_helper' => true,
                'empty_data' => $builder->getForm()->getData('product')->getImageFile(),
                //  'download_uri' => '...',
                'download_label' => 'download_file',
                'attr' => [
                    'height' => 150,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
