<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ScholarshipRequirement $scholarshipRequirement
 * @var string[]|\Cake\Collection\CollectionInterface $scholarships
 * @var string[]|\Cake\Collection\CollectionInterface $requirements
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $scholarshipRequirement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $scholarshipRequirement->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Scholarship Requirements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scholarshipRequirements form content">
            <?= $this->Form->create($scholarshipRequirement) ?>
            <fieldset>
                <legend><?= __('Edit Scholarship Requirement') ?></legend>
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
