<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Scholarship> $scholarships
 */
?>

<style>
    .scholarship-crud {
        max-width: 1100px;
        margin: 0 auto;
        padding: 25px;
    }


    /* ============================
   PAGE HEADER
============================ */

    .scholarship-crud .page-header {

        background: #0b6b3a;
        color: white;

        border-radius: 15px;
        padding: 30px;

        display: flex;
        align-items: center;
        gap: 20px;

        margin-bottom: 35px;

        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);

    }


    .scholarship-crud .header-icon {

        width: 70px;
        height: 70px;

        background: white;
        color: #0b6b3a;

        border-radius: 50%;

        display: flex;
        justify-content: center;
        align-items: center;

        font-size: 32px;

    }


    .scholarship-crud .page-header h2 {

        margin: 0 0 8px;

        color: white;

        font-size: 28px;

    }


    .scholarship-crud .page-header p {

        margin: 0;

        color: rgba(255, 255, 255, 0.9);

        line-height: 1.6;

    }


    /* ============================
   CARD GRID
============================ */

    .scholarship-crud .scholarship-container {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));

        gap: 25px;

    }



    /* ============================
   SCHOLARSHIP CARD
============================ */


    .scholarship-crud .scholarship-card {

        background: white;

        border-radius: 15px;

        overflow: hidden;

        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.10);

        border: 1px solid #e5e5e5;

        transition: 0.3s ease;

    }


    .scholarship-crud .scholarship-card:hover {

        transform: translateY(-5px);

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);

    }



    /* HEADER */


    .scholarship-crud .scholarship-card-header {

        background: #f3faf6;

        padding: 20px;

        display: flex;

        justify-content: space-between;

        align-items: center;

    }


    .scholarship-crud .scholarship-card-header h3 {

        margin: 0;

        color: #0b6b3a;

        font-size: 20px;

    }



    /* STATUS */


    .scholarship-crud .status-badge {

        background: #0b6b3a;

        color: white;

        padding: 6px 14px;

        border-radius: 20px;

        font-size: 13px;

        font-weight: 600;

    }



    /* BODY */


    .scholarship-crud .scholarship-card-body {

        padding: 20px;

        min-height: 120px;

    }


    .scholarship-crud .scholarship-card-body p {

        margin: 0;

        color: #555;

        line-height: 1.7;

    }



    /* FOOTER */


    .scholarship-crud .scholarship-card-footer {

        padding: 20px;

        border-top: 1px solid #eee;

    }



    /* BUTTON */


    .scholarship-crud .btn-view {

        display: inline-flex;

        align-items: center;

        gap: 8px;

        background: #0b6b3a;

        color: white;

        padding: 10px 18px;

        border-radius: 8px;

        text-decoration: none;

        font-weight: 600;

        transition: .3s;

    }


    .scholarship-crud .btn-view:hover {

        background: #09552f;

    }



    /* EMPTY STATE */


    .scholarship-crud .no-scholarships {

        background: white;

        border-radius: 15px;

        padding: 50px;

        text-align: center;

        box-shadow: 0 5px 15px rgba(0, 0, 0, .1);

    }


    .scholarship-crud .no-scholarships i {

        font-size: 50px;

        color: #0b6b3a;

    }


    .scholarship-crud .no-scholarships h3 {

        margin-top: 20px;

        color: #333;

    }


    .scholarship-crud .no-scholarships p {

        color: #666;

    }
</style>



<div class="scholarship-crud">


    <!-- Page Header -->

    <div class="page-header">

        <div class="header-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>


        <div>

            <h2>
                Available Scholarships
            </h2>


            <p>
                Browse scholarship programs offered by
                Holy Trinity College of General Santos City.
                View details, requirements, and application information.
            </p>

        </div>

    </div>



    <!-- Scholarship Cards -->

    <div class="scholarship-container">


        <?php if (!empty($scholarships)): ?>


            <?php foreach ($scholarships as $scholarship): ?>


                <div class="scholarship-card">


                    <div class="scholarship-card-header">


                        <h3>
                            <?= h($scholarship->scholarship_name) ?>
                        </h3>


                        <span class="status-badge">

                            <?= ucfirst(h($scholarship->status)) ?>

                        </span>


                    </div>



                    <div class="scholarship-card-body">


                        <p>
                            <?= nl2br(h($scholarship->description)) ?>
                        </p>


                    </div>



                    <div class="scholarship-card-footer">


                        <?= $this->Html->link(

                            '<i class="bi bi-eye"></i> View Details',

                            [
                                'action' => 'view',
                                $scholarship->id
                            ],

                            [
                                'class' => 'btn-view',
                                'escape' => false
                            ]

                        ) ?>


                    </div>


                </div>


            <?php endforeach; ?>


        <?php else: ?>


            <div class="no-scholarships">


                <i class="bi bi-folder-x"></i>


                <h3>
                    No Scholarships Available
                </h3>


                <p>
                    There are currently no active scholarship programs available.
                    Please check again later.
                </p>


            </div>


        <?php endif; ?>


    </div>


</div>