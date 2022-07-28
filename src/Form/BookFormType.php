<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BookFormType extends AbstractType
{
    /**
     * @var array $options
     */
    public $options = [];
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required' => $options['require_title']
            ])
            ->add('author', TextType::class, [
                'required' => $options['require_title']
            ])
            ->add('isbn', TextType::class)
            ->add('description', TextareaType::class, array(
                'attr' => array('cols' => '8', 'rows' => '5'),
            ))
            ->add('image', FileType::class, [
                'label' => 'Book image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image format',
                    ])
                ],
            ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
            'require_title' => true,
            'require_author' => true,
        ]);
        $resolver->setAllowedTypes('require_title', 'bool');
        $resolver->setAllowedTypes('require_author', 'bool');

    }
}
