<?php

namespace App\Factory;

use App\Entity\Soutenance;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Soutenance>
 */
final class SoutenanceFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Soutenance::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'numjury' => self::faker()->numberBetween(1, 5),
            'datesoutenance' => self::faker()->dateTimeBetween('now', '+1 month'),
            'note' => self::faker()->randomFloat(1, 10, 20),
            'etudiant' => EtudiantFactory::new(),
            'relation' => EnseignantFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Soutenance $soutenance): void {})
        ;
    }
}
