<?php

namespace gift\appli\core\services\catalogue;

interface CatalogueInterface
{
    public function getCategories(): array;
    public function getCategoriesById(int $id): array;
    public function getPrestationById(string $id): array;
    public function getPrestationByCategorie(int $cat_id): array;
    public function creatCategorie(array $data):int;
    public function updatePrestation(array $data):void;
    public function createOrUpdateCategoriePrestation(int $id, int $cat_id):void;
}