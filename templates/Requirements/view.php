<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Requirement $requirement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Requirement'), ['action' => 'edit', $requirement->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Requirement'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Requirement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requirements view content">
            <h3><?= h($requirement->requirement_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Requirement Name') ?></th>
                    <td><?= h($requirement->requirement_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($requirement->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($requirement->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($requirement->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($requirement->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Scholarship Requirements') ?></h4>
                <?php if (!empty($requirement->scholarship_requirements)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Scholarship Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($requirement->scholarship_requirements as $scholarshipRequirement) : ?>
                        <tr>
                            <td><?= h($scholarshipRequirement->id) ?></td>
                            <td><?= h($scholarshipRequirement->scholarship_id) ?></td>
                            <td><?= h($scholarshipRequirement->created) ?></td>
                            <td><?= h($scholarshipRequirement->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ScholarshipRequirements', 'action' => 'view', $scholarshipRequirement->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ScholarshipRequirements', 'action' => 'edit', $scholarshipRequirement->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'ScholarshipRequirements', 'action' => 'delete', $scholarshipRequirement->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $scholarshipRequirement->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>