<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scholarship $scholarship
 * @var \Cake\Collection\CollectionInterface $requirements
 */
?>

<style>
    .scholarship-crud {
        max-width: 1000px;
        margin: auto;
        padding: 25px;
    }


    /* ===========================
   PAGE HEADER
=========================== */

    .scholarship-crud .page-header {

        background: white;

        border-radius: 18px;

        padding: 30px;

        margin-bottom: 25px;

        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);

    }


    .scholarship-crud .page-header h2 {

        margin: 0;

        color: #166534;

        font-size: 30px;

        font-weight: 700;

    }


    .scholarship-crud .page-header p {

        margin-top: 10px;

        color: #666;

        font-size: 15px;

    }



    /* ===========================
   CARD
=========================== */


    .scholarship-crud .form-card {

        background: white;

        border-radius: 18px;

        padding: 30px;

        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);

        margin-bottom: 25px;

    }


    .scholarship-crud .card-title {

        color: #166534;

        font-size: 22px;

        font-weight: bold;

        margin-bottom: 25px;

    }



    /* ===========================
   CAKEPHP INPUT FIX
=========================== */


    .scholarship-crud .form-group {

        margin-bottom: 25px;

    }


    .scholarship-crud .form-group label {

        display: block;

        margin-bottom: 8px;

        font-weight: 600;

        color: #166534;

    }



    /* CakePHP generates .input wrapper */

    .scholarship-crud .input {

        margin: 0;

    }


    .scholarship-crud .input input,
    .scholarship-crud .input textarea,
    .scholarship-crud .input select {


        width: 100%;

        border: 1px solid #dcdcdc;

        border-radius: 12px;

        padding: 14px 15px;

        font-size: 15px;

        background: white;

        transition: .3s;

    }


    .scholarship-crud .input textarea {

        resize: vertical;

        min-height: 140px;

    }


    .scholarship-crud .input input:focus,
    .scholarship-crud .input textarea:focus,
    .scholarship-crud .input select:focus {

        border-color: #16a34a;

        outline: none;

        box-shadow: 0 0 0 4px rgba(22, 163, 74, .12);

    }



    /* ===========================
   REQUIREMENTS
=========================== */


    .scholarship-crud .requirements-grid {

        display: grid;

        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));

        gap: 15px;

    }


    .scholarship-crud .requirement-item {


        background: #f8fafc;

        border: 2px solid #e5e7eb;

        border-radius: 14px;

        padding: 15px;

        transition: .25s;

    }


    .scholarship-crud .requirement-item:hover {


        border-color: #16a34a;

        background: #f0fdf4;

    }


    .scholarship-crud .requirement-item label {


        display: flex;

        align-items: center;

        gap: 12px;

        cursor: pointer;

        margin: 0;

        font-weight: 600;

        color: #166534;

    }


    .scholarship-crud .requirement-item input[type=checkbox] {


        width: 20px;

        height: 20px;

        accent-color: #16a34a;

    }



    /* ===========================
   BUTTONS
=========================== */


    .scholarship-crud .button-group {


        display: flex;

        justify-content: flex-end;

        gap: 15px;

        margin-top: 35px;

    }



    .scholarship-crud .btn {


        display: inline-block;

        padding: 13px 28px;

        border-radius: 30px;

        text-decoration: none;

        font-weight: 700;

        border: none;

        cursor: pointer;

        transition: .3s;

    }



    .scholarship-crud .btn-back {


        background: #e5e7eb;

        color: #374151;

    }



    .scholarship-crud .btn-back:hover {


        background: #d1d5db;

    }



    .scholarship-crud .btn-save {


        background: #166534;

        color: white;

    }



    .scholarship-crud .btn-save:hover {


        background: #15803d;

    }



    @media(max-width:768px) {

        .scholarship-crud .button-group {

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


        <h2> <i class="bi bi-plus-circle-fill"></i>
            Add Scholarship
        </h2>

        <p>
            Create a scholarship program and assign its required documents.
        </p>

    </div>



    <?= $this->Form->create($scholarship) ?>



    <div class="form-card">


        <div class="card-title">

            Scholarship Information

        </div>



        <div class="form-group">


            <?= $this->Form->label(
                'scholarship_name',
                'Scholarship Name'
            ) ?>


            <?= $this->Form->control(
                'scholarship_name',
                [
                    'label' => false,
                    'placeholder' => 'Enter scholarship name...'
                ]
            ) ?>


        </div>




        <div class="form-group">


            <?= $this->Form->label(
                'description',
                'Description'
            ) ?>


            <?= $this->Form->control(
                'description',
                [
                    'label' => false,
                    'placeholder' => 'Provide a brief description of this scholarship...'
                ]
            ) ?>


        </div>




        <div class="form-group">


            <?= $this->Form->label(
                'status',
                'Status'
            ) ?>


            <?= $this->Form->control(
                'status',
                [
                    'label' => false,
                    'options' => [
                        'Open' => 'Open',
                        'Closed' => 'Closed'
                    ]
                ]
            ) ?>


        </div>


    </div>





    <div class="form-card">


        <div class="card-title">

            Required Documents

        </div>



        <p style="color:#6b7280;margin-bottom:25px;">

            Select all documentary requirements that applicants must submit for
            this scholarship.

        </p>




        <div class="requirements-grid">


            <?php foreach ($requirements as $id => $name): ?>


                <div class="requirement-item">


                    <label>


                        <?= $this->Form->checkbox(
                            'requirements._ids[]',
                            [
                                'value' => $id,
                                'hiddenField' => false,
                            ]
                        ) ?>


                        <span>
                            <?= h($name) ?>
                        </span>


                    </label>


                </div>


            <?php endforeach; ?>


        </div>


    </div>





    <div class="button-group">


        <?= $this->Html->link(
            'Cancel',
            ['action' => 'index'],
            [
                'class' => 'btn btn-back'
            ]
        ) ?>



        <?= $this->Form->button(
            'Save Scholarship',
            [
                'class' => 'btn btn-save'
            ]
        ) ?>


    </div>




    <?= $this->Form->end() ?>


</div>