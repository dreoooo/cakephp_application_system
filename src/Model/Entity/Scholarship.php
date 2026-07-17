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
 */
class Scholarship extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
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
    ];
}
