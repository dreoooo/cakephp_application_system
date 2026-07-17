<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */

?>

<style>
    .application-details {

        max-width: 900px;

        margin: 40px auto;

        padding: 0 20px;

    }



    .details-header {

        background: white;

        padding: 30px;

        border-radius: 20px;

        margin-bottom: 30px;

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);

    }



    .details-header h1 {

        margin: 0;

        color: #006633;

        font-size: 30px;

        font-weight: 700;

    }



    .details-card {

        background: white;

        padding: 35px;

        border-radius: 18px;

        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);

    }



    .details-card h2 {

        margin-top: 0;

        color: #006633;

        font-size: 26px;

        font-weight: 700;

    }



    .status-section {

        margin: 20px 0;

    }



    .application-status {

        display: inline-block;

        background: #e8f5ee;

        color: #006633;

        padding: 8px 18px;

        border-radius: 20px;

        font-size: 14px;

        font-weight: 700;

        margin-left: 10px;

    }



    .details-card h3 {

        color: #006633;

        margin-top: 25px;

        margin-bottom: 15px;

    }



    .info-row {

        margin: 12px 0;

        color: #555;

    }



    .info-row strong {

        color: #222;

        margin-right: 8px;

    }



    .details-actions {

        margin-top: 30px;

    }



    .details-button {

        display: inline-flex;

        background: #006633;

        color: white;

        padding: 12px 22px;

        border-radius: 10px;

        text-decoration: none;

        font-weight: 600;

    }



    .details-button:hover {

        background: #004d26;

        color: white;

    }
</style>




<div class="application-details">


    <div class="details-header">

        <h1>
            Application Details
        </h1>

    </div>



    <div class="details-card">



        <h2>

            <?= $application->hasValue('scholarship')
                ? h($application->scholarship->scholarship_name)
                : 'Scholarship Application'
            ?>

        </h2>




        <!-- Status -->

        <div class="status-section">

            <strong>Status:</strong>


            <span class="application-status">

                <?= h(
                    $application->status ?: 'Pending'
                ) ?>

            </span>


        </div>




        <hr>




        <h3>
            Applicant Information
        </h3>




        <div class="info-row">

            <strong>Name:</strong>

            <?= $application->hasValue('user')
                ? h(
                    $application->user->first_name . ' ' .
                        $application->user->last_name
                )
                : 'N/A'
            ?>

        </div>




        <div class="info-row">

            <strong>ID Number:</strong>

            <?= $application->hasValue('user')
                ? h($application->user->id_number)
                : 'N/A'
            ?>

        </div>




        <div class="info-row">

            <strong>Email:</strong>

            <?= $application->hasValue('user')
                ? h($application->user->email)
                : 'N/A'
            ?>

        </div>





        <hr>





        <h3>
            Submission Information
        </h3>




        <div class="info-row">

            <strong>Submitted:</strong>

            <?= $application->submitted_at
                ? $application->submitted_at->format('F d, Y h:i A')
                : 'Not Available'
            ?>

        </div>




        <div class="info-row">

            <strong>Created:</strong>

            <?= $application->created
                ? $application->created->format('F d, Y h:i A')
                : 'Not Available'
            ?>

        </div>





        <div class="details-actions">


            <?= $this->Html->link(
                'Back to Applications',
                [
                    'action' => 'index'
                ],
                [
                    'class' => 'details-button'
                ]
            ) ?>


        </div>



    </div>


</div>