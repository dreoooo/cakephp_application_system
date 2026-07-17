<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scholarship $scholarship
 */

$statusClass = strtolower($scholarship->status) === 'open'
    ? 'status-open'
    : 'status-closed';

$statusIcon = strtolower($scholarship->status) === 'open'
    ? '🟢'
    : '🔴';

?>

<style>
    .scholarship-crud {

        max-width: 1000px;
        margin: auto;
        padding: 25px;

    }


    /* ==========================
   HEADER
========================== */


    .scholarship-crud .page-header {

        background: linear-gradient(135deg, #166534, #15803d);

        color: white;

        padding: 35px;

        border-radius: 20px;

        margin-bottom: 25px;

        box-shadow: 0 10px 25px rgba(0, 0, 0, .12);

    }



    .scholarship-crud .page-header h2 {

        margin: 0;

        color: white;

        font-size: 32px;

        font-weight: 700;

    }



    .scholarship-crud .page-header p {

        margin-top: 10px;

        color: white;

        opacity: .95;

        line-height: 1.7;

    }



    /* ==========================
   STATUS
========================== */


    .scholarship-crud .status-badge {

        display: inline-block;

        margin-top: 18px;

        padding: 10px 22px;

        border-radius: 30px;

        font-size: 14px;

        font-weight: bold;

    }



    .scholarship-crud .status-open {

        background: #dcfce7;

        color: #166534;

    }



    .scholarship-crud .status-closed {

        background: #fee2e2;

        color: #991b1b;

    }



    /* ==========================
   DETAILS CARD
========================== */


    .scholarship-crud .details-card {

        background: white;

        border-radius: 18px;

        padding: 28px;

        margin-bottom: 22px;

        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);

    }



    .scholarship-crud .details-card h3 {

        margin-top: 0;

        margin-bottom: 18px;

        color: #166534;

        font-size: 22px;

    }



    .scholarship-crud .details-card p {

        color: #555;

        line-height: 1.8;

        font-size: 15px;

    }



    /* ==========================
   REQUIREMENTS
========================== */


    .scholarship-crud .requirements-grid {

        display: grid;

        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));

        gap: 15px;

    }



    .scholarship-crud .requirement-item {

        background: #f0fdf4;

        border: 1px solid #bbf7d0;

        border-radius: 14px;

        padding: 15px;

        font-weight: 600;

        color: #166534;

        transition: .25s;

    }



    .scholarship-crud .requirement-item:hover {

        transform: translateY(-3px);

        box-shadow: 0 8px 15px rgba(0, 0, 0, .08);

    }



    .scholarship-crud .empty-message {

        text-align: center;

        color: #888;

        padding: 25px;

        background: #fafafa;

        border-radius: 12px;

    }



    /* ==========================
   ACTIONS
========================== */


    .scholarship-crud .action-area {

        display: flex;

        justify-content: center;

        gap: 15px;

        margin-top: 35px;

        flex-wrap: wrap;

    }



    .scholarship-crud .btn {

        display: inline-block;

        text-decoration: none;

        padding: 13px 28px;

        border-radius: 30px;

        font-weight: bold;

        transition: .3s;

    }



    .scholarship-crud .btn-back {

        background: #e5e7eb;

        color: #374151;

    }



    .scholarship-crud .btn-back:hover {

        background: #d1d5db;

    }



    .scholarship-crud .btn-apply {

        background: #166534;

        color: white;

        padding: 12px 26px;

        border-radius: 25px;

        display: inline-flex;

        align-items: center;

        gap: 8px;

        font-weight: 600;

    }


    .scholarship-crud .btn-apply:hover {

        background: #15803d;

    }



    @media(max-width:768px) {


        .scholarship-crud .action-area {

            flex-direction: column;

        }


        .scholarship-crud .btn {

            width: 100%;

            text-align: center;

        }

    }
</style>



<div class="scholarship-crud">


    <div class="page-header">


        <h2>

            <?= h($scholarship->scholarship_name) ?>

        </h2>



        <span class="status-badge <?= $statusClass ?>">


            <?= $statusIcon ?>

            <?= h($scholarship->status) ?>


        </span>


    </div>





    <div class="details-card">


        <h3>
            Scholarship Description
        </h3>



        <p>

            <?= nl2br(h($scholarship->description)) ?>

        </p>


    </div>






    <div class="details-card">


        <h3>
            Required Documents
        </h3>




        <?php if (!empty($scholarship->requirements)): ?>


            <div class="requirements-grid">



                <?php foreach ($scholarship->requirements as $requirement): ?>


                    <div class="requirement-item">


                        📄 <?= h($requirement->requirement_name) ?>


                    </div>



                <?php endforeach; ?>


            </div>



        <?php else: ?>


            <div class="empty-message">


                No documentary requirements have been assigned to this scholarship.


            </div>



        <?php endif; ?>


    </div>







    <div class="action-area">



        <?= $this->Html->link(

            '← Back to Scholarships',

            ['action' => 'index'],

            [
                'class' => 'btn btn-back'
            ]

        ) ?>




        <?=

        strtolower($scholarship->status) === 'open'

            ?

            $this->Html->link(

                'Apply Now',

                [
                    'controller' => 'Applications',
                    'action' => 'add',
                    $scholarship->id
                ],

                [
                    'class' => 'btn btn-apply'
                ]

            )

            :

            ''

        ?>



    </div>




</div>