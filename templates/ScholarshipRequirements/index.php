<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ScholarshipRequirement> $scholarshipRequirements
 */
?>
<div class="scholarshipRequirements index content">
    <?= $this->Html->link(__('New Scholarship Requirement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Scholarship Requirements') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('scholarship_id') ?></th>
                    <th><?= $this->Paginator->sort('requirement_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scholarshipRequirements as $scholarshipRequirement): ?>
                <tr>
                    <td><?= $this->Number->format($scholarshipRequirement->id) ?></td>
                    <td><?= $scholarshipRequirement->hasValue('scholarship') ? $this->Html->link($scholarshipRequirement->scholarship->scholarship_name, ['controller' => 'Scholarships', 'action' => 'view', $scholarshipRequirement->scholarship->id]) : '' ?></td>
                    <td><?= $scholarshipRequirement->hasValue('requirement') ? $this->Html->link($scholarshipRequirement->requirement->requirement_name, ['controller' => 'Requirements', 'action' => 'view', $scholarshipRequirement->requirement->id]) : '' ?></td>
                    <td><?= h($scholarshipRequirement->created) ?></td>
                    <td><?= h($scholarshipRequirement->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $scholarshipRequirement->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scholarshipRequirement->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $scholarshipRequirement->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $scholarshipRequirement->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>