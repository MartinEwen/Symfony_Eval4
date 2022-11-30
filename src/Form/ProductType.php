<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options, File $file = null): void
    {
        $builder
            ->add('nameProduct')
            ->add('imgProduct', FileType::class, [
                'label' => 'Photo of the Product',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5000k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'image trop lourde',
                    ])
                ],
            ])
            ->add('descriptionProduct')
            ->add('priceProduct')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'nameCategory',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
