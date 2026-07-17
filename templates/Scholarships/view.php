<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scholarship $scholarship
 */
?>


<style>
    .page-header {

        background: #ffffff;
        padding: 30px;
        border-radius: 18px;
        margin-bottom: 25px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);

    }


    /* Back Button */

    .btn-back {

        display: inline-block;
        text-decoration: none;
        color: #166534;
        font-weight: 600;
        font-size: 15px;
        margin-bottom: 20px;

    }


    .btn-back:hover {

        color: #15803d;

    }



    /* Scholarship Title */

    .scholarship-title {

        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;

    }


    .page-header h2 {

        margin: 0;
        color: #166534;
        font-size: 30px;
        font-weight: 700;

    }



    /* Open Badge */

    .status-badge {

        display: inline-block;
        padding: 8px 20px;
        border-radius: 30px;
        background: #dcfce7;
        color: #166534;
        font-size: 14px;
        font-weight: 700;

    }



    /* Details Card */

    .details-card {

        background: #ffffff;
        padding: 25px;
        border-radius: 18px;
        margin-bottom: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);

    }


    .details-card h3 {

        color: #166534;
        font-size: 21px;
        margin-bottom: 15px;
        font-weight: 700;

    }


    .details-card p {

        color: #555;
        line-height: 1.7;
        font-size: 15px;

    }



    /* Requirements */

    .requirements-list {

        list-style: none;
        padding: 0;
        margin: 0;

    }


    .requirements-list li {

        background: #f0fdf4;
        color: #166534;
        padding: 12px 15px;
        border-radius: 12px;
        margin-bottom: 10px;
        font-weight: 600;

    }



    /* Apply Button */

    .action-area {

        text-align: center;
        margin-top: 30px;

    }


    .btn-apply {

        display: inline-block;
        background: #166534;
        color: white;
        padding: 13px 40px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 700;
        font-size: 16px;
        transition: .3s;

    }


    .btn-apply:hover {

        background: #15803d;

    }
</style>




<div class="page-header">



    <div class="scholarship-title">


        <h2>
            <?= h($scholarship->scholarship_name) ?>
        </h2>


        <span class="status-badge">
            Open
        </span>


    </div>


</div>






<div class="details-card">


    <h3>
        Description
    </h3>


    <p>
        <?= nl2br(h($scholarship->description)) ?>
    </p>


</div>







<div class="details-card">


    <h3>
        Required Documents
    </h3>



    <?php if (!empty($scholarship->scholarship_requirements)): ?>


        <ul class="requirements-list">


            <?php foreach ($scholarship->scholarship_requirements as $requirement): ?>


                <li>

                    ✓
                    <?= h($requirement->requirement->requirement_name) ?>

                </li>


            <?php endforeach; ?>


        </ul>



    <?php else: ?>


        <p>
            No requirements have been assigned to this scholarship.
        </p>


    <?php endif; ?>


</div>







<div class="action-area">


    <?= $this->Html->link(
        'Apply Now',
        [
            'controller' => 'Applications',
            'action' => 'add',
            $scholarship->id
        ],
        [
            'class' => 'btn-apply'
        ]
    ) ?>


</div>