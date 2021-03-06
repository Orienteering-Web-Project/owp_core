<?php

namespace Owp\OwpCore\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

abstract class AbstractNodeAdmin extends AbstractAdmin
{
    const LABEL = 'title';

    protected $datagridValues = [
        '_sort_by' => 'updateAt',
        '_sort_order' => 'DESC',
        '_per_page' => 50
    ];

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Méta-données', ['class' => 'col-12 col-lg-3'])
                ->add('createAt', DateTimeType::class, array(
                    'required' => false,
                    'disabled' => true,
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'form-control input-inline datetimepicker',
                        'data-provide' => 'datetimepicker',
                        'html5' => false,
                    ],
                ))
                ->add('createBy', TextType::class, array(
                    'required' => false,
                    'disabled' => true
                ))
                ->add('updateAt', DateTimeType::class, array(
                    'required' => false,
                    'disabled' => true,
                    'widget' => 'single_text',
                    'attr' => [
                        'class' => 'form-control input-inline datetimepicker',
                        'data-provide' => 'datetimepicker',
                        'html5' => false,
                    ],
                ))
                ->add('updateBy', TextType::class, array(
                    'required' => false,
                    'disabled' => true
                ))
                ->add('slug', TextType::class, array(
                    'label' => 'URL',
                    'required' => false,
                    'disabled' => true
                ))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add(self::LABEL);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->addIdentifier(self::LABEL)
        ->add('slug', 'text', [
            'label' => 'URL',
            'header_class' => 'd-none d-lg-table-cell',
        ])
        ->add('createAt', 'datetime', [
            'format' => 'd/m/Y H:i',
            'header_class' => 'd-none d-lg-table-cell',
        ])
        ->add('createBy.username', 'text', [
            'header_class' => 'd-none d-lg-table-cell',
        ])
        ->add('updateAt', 'datetime', [
            'format' => 'd/m/Y H:i',
            'header_class' => 'd-none d-lg-table-cell',
        ])
        ->add('updateBy.username', 'text', [
            'header_class' => 'd-none d-lg-table-cell',
        ])
        ->add('_action', null, [
            'actions' => [
                'show' => ['template' => '@OwpCore/Administration/CRUD/list__action_show.html.twig'],
                'edit' => ['template' => '@OwpCore/Administration/CRUD/list__action_edit.html.twig'],
                'delete' => ['template' => '@OwpCore/Administration/CRUD/list__action_delete.html.twig'],
            ]
        ]);
    }
}
