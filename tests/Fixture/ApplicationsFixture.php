<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicationsFixture
 */
class ApplicationsFixture extends TestFixture
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
                'user_id' => 1,
                'scholarship_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'submitted_at' => '2026-07-16 08:55:34',
                'created' => '2026-07-16 08:55:34',
                'modified' => '2026-07-16 08:55:34',
            ],
        ];
        parent::init();
    }
}
