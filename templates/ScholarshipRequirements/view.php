<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScholarshipRequirement $scholarshipRequirement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Scholarship Requirement'), ['action' => 'edit', $scholarshipRequirement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Scholarship Requirement'), ['action' => 'delete', $scholarshipRequirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scholarshipRequirement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Scholarship Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Scholarship Requirement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scholarshipRequirements view content">
            <h3><?= h($scholarshipRequirement->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Scholarship') ?></th>
                    <td><?= $scholarshipRequirement->hasValue('scholarship') ? $this->Html->link($scholarshipRequirement->scholarship->scholarship_name, ['controller' => 'Scholarships', 'action' => 'view', $scholarshipRequirement->scholarship->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Requirement') ?></th>
                    <td><?= $scholarshipRequirement->hasValue('requirement') ? $this->Html->link($scholarshipRequirement->requirement->requirement_name, ['controller' => 'Requirements', 'action' => 'view', $scholarshipRequirement->requirement->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($scholarshipRequirement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($scholarshipRequirement->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($scholarshipRequirement->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>