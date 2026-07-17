<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Application> $applications
 */

?>


<style>
    /* ==========================
   APPLICATION PAGE LAYOUT
========================== */

    .application-page {

        max-width: 1200px;

        margin: 40px auto;

        padding: 0 20px;

    }



    /* ==========================
   HEADER
========================== */


    .application-page-header {

        display: flex;

        align-items: center;

        gap: 20px;

        background: white;

        padding: 30px;

        border-radius: 20px;

        margin-bottom: 35px;

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);

    }



    /* HEADER ICON */

    .header-icon {

        width: 70px;

        height: 70px;

        display: flex;

        justify-content: center;

        align-items: center;

        background: #e8f5ee;

        color: #006633;

        border-radius: 50%;

        font-size: 35px;

        flex-shrink: 0;

    }



    .application-page-header h2 {

        margin: 0;

        color: #006633;

        font-size: 30px;

        font-weight: 700;

    }



    .application-page-header p {

        margin-top: 8px;

        color: #666;

        line-height: 1.6;

    }





    /* ==========================
   APPLICATION CARD
========================== */


    .application-card {

        background: white;

        padding: 35px;

        border-radius: 18px;

        margin-bottom: 25px;

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);

        transition: 0.3s ease;

    }



    .application-card:hover {

        transform: translateY(-3px);

    }



    .application-card h3 {

        margin-top: 0;

        margin-bottom: 25px;

        color: #006633;

        font-size: 24px;

        font-weight: 700;

    }



    .application-card p {

        color: #555;

        font-size: 15px;

        margin: 18px 0;

        line-height: 1.8;

    }





    /* ==========================
   STATUS
========================== */


    .application-status {

        display: inline-block;

        background: #e8f5ee;

        color: #006633;

        padding: 8px 18px;

        border-radius: 20px;

        font-size: 14px;

        font-weight: 700;

        margin-left: 8px;

    }





    /* ==========================
   FOOTER
========================== */


    .application-footer {

        margin-top: 30px;

        padding-top: 20px;

        border-top: 1px solid #eee;

    }





    /* ==========================
   BUTTON
========================== */


    .application-btn {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        background: #006633;

        color: white;

        padding: 12px 22px;

        border-radius: 10px;

        text-decoration: none;

        font-weight: 600;

        transition: 0.3s ease;

    }



    .application-btn:hover {

        background: #004d26;

        color: white;

    }





    /* ==========================
   EMPTY CARD
========================== */


    .empty-card {

        background: white;

        padding: 40px;

        border-radius: 20px;

        text-align: center;

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);

    }



    .empty-card h3 {

        color: #006633;

        margin-bottom: 15px;

    }



    .empty-card p {

        color: #666;

        margin-bottom: 25px;

    }
</style>





<div class="application-page">



    <div class="application-page-header">


        <div class="header-icon">

            <i class="bi bi-file-earmark-check"></i>

        </div>



        <div>

            <h2>
                Application Status
            </h2>


            <p>
                View the status of your scholarship applications submitted to
                Holy Trinity College of General Santos City.
            </p>


        </div>


    </div>






    <?php if (!empty($applications)): ?>



        <?php foreach ($applications as $application): ?>



            <div class="application-card">



                <h3>

                    <?= h($application->scholarship->scholarship_name) ?>

                </h3>





                <p>

                    <strong>Status:</strong>


                    <span class="application-status">

                        <?= h($application->status ?: 'Pending') ?>

                    </span>


                </p>





                <p>

                    <strong>Submitted:</strong>


                    <?= $application->submitted_at
                        ? $application->submitted_at->format('F d, Y h:i A')
                        : 'Not Available'
                    ?>


                </p>





                <div class="application-footer">



                    <?= $this->Html->link(
                        'View Details',
                        [
                            'action' => 'view',
                            $application->id
                        ],
                        [
                            'class' => 'application-btn'
                        ]
                    ) ?>



                </div>




            </div>




        <?php endforeach; ?>





    <?php else: ?>




        <div class="empty-card">



            <h3>
                No Applications Yet
            </h3>



            <p>
                You have not submitted any scholarship applications.
            </p>




            <?= $this->Html->link(
                'Browse Scholarships',
                [
                    'controller' => 'Scholarships',
                    'action' => 'index'
                ],
                [
                    'class' => 'application-btn'
                ]
            ) ?>



        </div>





    <?php endif; ?>



</div>