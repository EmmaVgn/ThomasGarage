<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Catégorie')
            ->setPageTitle('new', 'Ajouter une catégorie')
            ->setDefaultSort(['id' => 'ASC'])
            ->setPaginatorPageSize(10)
            ->setEntityLabelInSingular('Catégorie');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id', 'ID')->onlyOnIndex(),
            TextField::new('name', 'Nom de la catégorie')
            ->setFormTypeOptions(['attr' => ['placeholder' => 'Ex: SUV']]),
            TextField::new('slug', 'Slug')->onlyOnIndex(),
        ];
    }

    // public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    // {
    //     $this->sluggerName($entityInstance);
    //     // Apply ucfirst to relevant fields
    //     $entityInstance->setName(ucfirst($entityInstance->getName())); 
    //     parent::persistEntity($entityManager, $entityInstance);
    // }

    // public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    // {
    //     $this->sluggerName($entityInstance);
    //     $entityInstance->setName(ucfirst($entityInstance->getName())); 
    //     parent::updateEntity($entityManager, $entityInstance);
    // }

    // private function sluggerName(Category $category): void
    // {
    //     $category->setSlug(strtolower($this->slugger->slug($category->getName())));
    // }
}
