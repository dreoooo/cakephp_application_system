<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scholarship $scholarship
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Scholarships'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scholarships form content">
            <?= $this->Form->create($scholarship) ?>
            <fieldset>
                <legend><?= __('Add Scholarship') ?></legend>
                <?php
                    echo $this->Form->control('scholarship_name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
