<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Scholarship Entity
 *
 * @property int $id
 * @property string $scholarship_name
 * @property string|null $description
 * @property string $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Application[] $applications
 * @property \App\Model\Entity\ScholarshipRequirement[] $scholarship_requirements
 * @property \App\Model\Entity\Requirement[] $requirements
 */
class Scholarship extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'scholarship_name' => true,
        'description' => true,
        'status' => true,
        'created' => true,
        'modified' => true,

        'applications' => true,
        'scholarship_requirements' => true,

        // BelongsToMany association
        'requirements' => true,
    ];
}
