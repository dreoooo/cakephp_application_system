<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScholarshipRequirement $scholarshipRequirement
 * @var \Cake\Collection\CollectionInterface|string[] $scholarships
 * @var \Cake\Collection\CollectionInterface|string[] $requirements
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Scholarship Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scholarshipRequirements form content">
            <?= $this->Form->create($scholarshipRequirement) ?>
            <fieldset>
                <legend><?= __('Add Scholarship Requirement') ?></legend>
                <?php
                    echo $this->Form->control('scholarship_id', ['options' => $scholarships]);
                    echo $this->Form->control('requirement_id', ['options' => $requirements]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
