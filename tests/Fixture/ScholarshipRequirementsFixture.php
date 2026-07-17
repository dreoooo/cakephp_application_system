<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ScholarshipRequirementsFixture
 */
class ScholarshipRequirementsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'scholarship_id' => 1,
                'requirement_id' => 1,
                'created' => '2026-07-16 08:55:30',
                'modified' => '2026-07-16 08:55:30',
            ],
        ];
        parent::init();
    }
}
