<?php

namespace App\Controller\Admin;

use App\Entity\Type;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeCrudController extends AbstractCrudController
{   
    public static function getEntityFqcn(): string
    {
        return Type::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Modèles')
            ->setPageTitle('new', 'Ajouter un modèle')
            ->setDefaultSort(['name' => 'ASC'])
            ->setPaginatorPageSize(10)
            ->setEntityLabelInSingular('un Modèle');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('name', 'Nom du modèle')
            ->setFormTypeOptions(['attr' => ['placeholder' => 'Ex: A3 SPORTBACK']]),
            TextField::new('slug', 'Slug')->onlyOnIndex(),
        ];
    }
}
