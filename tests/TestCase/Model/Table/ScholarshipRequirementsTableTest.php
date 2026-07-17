<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScholarshipRequirementsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScholarshipRequirementsTable Test Case
 */
class ScholarshipRequirementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ScholarshipRequirementsTable
     */
    protected $ScholarshipRequirements;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ScholarshipRequirements',
        'app.Scholarships',
        'app.Requirements',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ScholarshipRequirements') ? [] : ['className' => ScholarshipRequirementsTable::class];
        $this->ScholarshipRequirements = $this->getTableLocator()->get('ScholarshipRequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ScholarshipRequirements);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ScholarshipRequirementsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ScholarshipRequirementsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
