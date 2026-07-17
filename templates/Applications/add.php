<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 * @var \App\Model\Entity\Scholarship $scholarship
 */
?>

<div class="page-header">



    <h2>Scholarship Application</h2>

</div>



<div class="details-card">

    <h3><?= h($scholarship->scholarship_name) ?></h3>

    <p>

        <?= nl2br(h($scholarship->description)) ?>

    </p>

</div>



<div class="details-card">

    <h3>Required Documents</h3>

    <?php if (!empty($scholarship->scholarship_requirements)): ?>

        <ul class="requirements-list">

            <?php foreach ($scholarship->scholarship_requirements as $item): ?>

                <li>

                    ✓ <?= h($item->requirement->requirement_name) ?>

                </li>

            <?php endforeach; ?>

        </ul>

    <?php else: ?>

        <p>No requirements have been assigned.</p>

    <?php endif; ?>

</div>



<div class="details-card">

    <h3>Student Confirmation</h3>

    <p>

        By clicking <strong>Submit Application</strong>, you confirm that:

    </p>

    <ul class="requirements-list">

        <li>✓ You have read the scholarship requirements.</li>

        <li>✓ The information you will submit is true and correct.</li>

        <li>✓ You understand that false information may result in disqualification.</li>

    </ul>

</div>



<div class="action-area">

    <?= $this->Form->create($application) ?>

    <?= $this->Form->button(
        'Submit Application',
        [
            'class' => 'btn-apply'
        ]
    ) ?>

    <?= $this->Form->end() ?>

</div>