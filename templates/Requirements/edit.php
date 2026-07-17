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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $requirement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $requirement->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="requirements form content">
            <?= $this->Form->create($requirement) ?>
            <fieldset>
                <legend><?= __('Edit Requirement') ?></legend>
                <?php
                    echo $this->Form->control('requirement_name');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
