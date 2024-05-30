<?php

namespace gift\appli\core\services\catalogue;

use gift\appli\core\domaine\entities\Categorie;
use gift\appli\core\domaine\entities\Prestation;
use gift\appli\core\services\catalogue\CatalogueInterface;

class CatalogueService implements CatalogueInterface
{

    public function getCategories(): array
    {
        // TODO: Implement getCategories() method.
        $categories = new Categorie();
        $category = $categories->get()->toArray();

        return $category;
    }

    public function getCategoriesById(int $id): array
    {
        // TODO: Implement getCategoriesById() method.
        try {
            $categorie = new Categorie();
            $category = $categorie::where('id', '=', $id)->firstOrFail();
            $presta = $category->prestations;
        }catch (\Exception $e){
            throw new \mysqli_sql_exception($e->getMessage());
        }

        return ['categorie' => $category, 'prestations' => $presta];
    }

    public function getPrestationById(string $id): array
    {
        // TODO: Implement getPrestationById() method.
        $prestation = new Prestation();
        $prest = $prestation::where('id', '=', $id)->firstOrFail();
        $cat = $prest->categorie;

        return ['presta' => $prest, 'cat' => $cat];
    }

    public function getPrestationByCategorie(int $cat_id): array
    {
        // TODO: Implement getPrestationByCategorie() method.
        return [];
    }

    public function creatCategorie(array $data):int
    {
        $categorie = new Categorie();
        $categorie->libelle = $data['libelle'];
        $categorie->description = $data['description'];
        $categorie->save();

        return $categorie->id;
    }

    public function updatePrestation(array $data):void{
        $prestation = new Prestation();
        $presta = $prestation::where('id', '=', $data['id'])->firstOrFail();
        $presta->libelle = $data['libelle'];
        $presta->description = $data['description'];
        $presta->url = $data['url'];
        $presta->unite = $data['unite'];
        $presta->tarif = $data['tarif'];
        $presta->img = $data['img'];
        $presta->cat_id = $data['cat_id'];
        $presta->save();
    }


    public function createOrUpdateCategoriePrestation(int $id, int $cat_id): void
    {
        $prestation = new Prestation();
        $presta = $prestation::where('id', '=', $id)->firstOrFail();
        $presta->cat_id = $cat_id;
        $presta->save();
    }
}