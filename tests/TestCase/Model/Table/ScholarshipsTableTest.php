<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScholarshipsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScholarshipsTable Test Case
 */
class ScholarshipsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ScholarshipsTable
     */
    protected $Scholarships;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Scholarships',
        'app.Applications',
        'app.ScholarshipRequirements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Scholarships') ? [] : ['className' => ScholarshipsTable::class];
        $this->Scholarships = $this->getTableLocator()->get('Scholarships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Scholarships);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ScholarshipsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
