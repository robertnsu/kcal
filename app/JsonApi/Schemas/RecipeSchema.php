<?php

namespace App\JsonApi\Schemas;

use CloudCreativity\LaravelJsonApi\Schema\SchemaProvider;

class RecipeSchema extends SchemaProvider
{

    /**
     * @var string
     */
    protected string $resourceType = 'recipes';

    /**
     * {@inheritdoc}
     */
    public function getId($resource): string
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes($resource): array
    {
        /** @var \App\Models\Recipe $resource */
        return [
            'slug' => $resource->slug,
            'name' => $resource->name,
            'description' => $resource->description,
            'time_prep' => $resource->time_prep,
            'time_cook' => $resource->time_cook,
            'time_total' => $resource->time_total,
            'source' => $resource->source,
            'servings' => $resource->servings,
            'weight' => $resource->weight,
            'serving_weight' => $resource->serving_weight,
            'volume' => $resource->volume,
            'volumeFormatted' => $resource->volume_formatted,
            'units_supported' => $resource->units_supported->pluck('label'),
            'caloriesPerServing' => $resource->caloriesPerServing(),
            'carbohydratesPerServing' => $resource->carbohydratesPerServing(),
            'cholesterolPerServing' => $resource->cholesterolPerServing(),
            'fatPerServing' => $resource->fatPerServing(),
            'proteinPerServing' => $resource->proteinPerServing(),
            'sodiumPerServing' => $resource->sodiumPerServing(),
            'ironPerServing' => $resource->ironPerServing(),
            'calciumPerServing' => $resource->calciumPerServing(),
            'caloriesTotal' => $resource->caloriesTotal(),
            'carbohydratesTotal' => $resource->carbohydratesTotal(),
            'cholesterolTotal' => $resource->cholesterolTotal(),
            'fatTotal' => $resource->fatTotal(),
            'proteinTotal' => $resource->proteinTotal(),
            'sodiumTotal' => $resource->sodiumTotal(),
            'ironTotal' => $resource->ironTotal(),
            'calciumTotal' => $resource->calciumTotal(),
            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,
            'showUrl' => route('recipes.show', $resource),
            'editUrl' => route('recipes.edit', $resource),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getRelationships($resource, $isPrimary, array $includeRelationships): array
    {
        return [
            'ingredient-amounts' => [
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['ingredient-amounts']),
                self::DATA => function () use ($resource) {
                    return $resource->ingredientAmounts; // @codeCoverageIgnore
                },
            ],
            'media' => [
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['media']),
                self::DATA => function () use ($resource) {
                    return $resource->media; // @codeCoverageIgnore
                },
            ],
            'separators' => [
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['separators']),
                self::DATA => function () use ($resource) {
                    return $resource->separators; // @codeCoverageIgnore
                },
            ],
            'steps' => [
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['steps']),
                self::DATA => function () use ($resource) {
                    return $resource->steps; // @codeCoverageIgnore
                },
            ],
            'tags' => [
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['tags']),
                self::DATA => function () use ($resource) {
                    return $resource->tags; // @codeCoverageIgnore
                },
            ]
        ];
    }
}
