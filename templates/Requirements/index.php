<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Requirement> $requirements
 */
?>
<div class="requirements index content">
    <?= $this->Html->link(__('New Requirement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Requirements') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('requirement_name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requirements as $requirement): ?>
                <tr>
                    <td><?= $this->Number->format($requirement->id) ?></td>
                    <td><?= h($requirement->requirement_name) ?></td>
                    <td><?= h($requirement->created) ?></td>
                    <td><?= h($requirement->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $requirement->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $requirement->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $requirement->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $requirement->id),
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