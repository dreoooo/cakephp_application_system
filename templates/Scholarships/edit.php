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
   HEADER
=========================== */


    .scholarship-crud .page-header {

        background: white;

        padding: 30px;

        border-radius: 18px;

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

        line-height: 1.6;

    }



    /* ===========================
   CARD
=========================== */


    .scholarship-crud .form-card {

        background: #fff;

        border-radius: 18px;

        padding: 30px;

        margin-bottom: 25px;

        box-shadow: 0 8px 20px rgba(0, 0, 0, .08);

    }



    .scholarship-crud .card-title {

        color: #166534;

        font-size: 22px;

        font-weight: bold;

        margin-bottom: 25px;

    }



    /* ===========================
   FORM INPUTS
=========================== */


    .scholarship-crud .form-group {

        margin-bottom: 25px;

    }


    .scholarship-crud .form-group label {

        display: block;

        margin-bottom: 8px;

        color: #166534;

        font-weight: 600;

    }



    /* CakePHP wrapper */

    .scholarship-crud .input {

        margin: 0;

    }



    .scholarship-crud .input input,
    .scholarship-crud .input textarea,
    .scholarship-crud .input select {


        width: 100%;

        padding: 14px 16px;

        border: 1px solid #d1d5db;

        border-radius: 12px;

        font-size: 15px;

        transition: .3s;

    }



    .scholarship-crud .input textarea {

        resize: vertical;

        min-height: 150px;

    }



    .scholarship-crud .input input:focus,
    .scholarship-crud .input textarea:focus,
    .scholarship-crud .input select:focus {


        outline: none;

        border-color: #16a34a;

        box-shadow: 0 0 0 4px rgba(22, 163, 74, .15);

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


        background: #f9fafb;

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



    .scholarship-crud .requirement-item input {


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


        border: none;

        padding: 13px 28px;

        border-radius: 30px;

        text-decoration: none;

        cursor: pointer;

        font-weight: 700;

        transition: .3s;

    }



    .scholarship-crud .btn-back {


        background: #e5e7eb;

        color: #374151;

    }



    .scholarship-crud .btn-back:hover {

        background: #d1d5db;

    }



    .scholarship-crud .btn-delete {


        background: #dc2626;

        color: white;

    }



    .scholarship-crud .btn-delete:hover {


        background: #b91c1c;

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


        <h2>
            Edit Scholarship
        </h2>


        <p>

            Update the scholarship information and manage
            its required documents.

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
                    'placeholder' => 'Provide a brief description...'
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

            Select the documentary requirements that students must submit for this scholarship.

        </p>




        <div class="requirements-grid">


            <?php

            $selectedRequirements = [];


            if (!empty($scholarship->requirements)) {

                foreach ($scholarship->requirements as $requirement) {

                    $selectedRequirements[] = $requirement->id;
                }
            }

            ?>



            <?php foreach ($requirements as $id => $name): ?>


                <div class="requirement-item">


                    <label>


                        <?= $this->Form->checkbox(
                            'requirements._ids[]',
                            [
                                'value' => $id,
                                'checked' => in_array($id, $selectedRequirements),
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




        <?= $this->Form->postLink(
            'Delete',
            ['action' => 'delete', $scholarship->id],
            [
                'confirm' => 'Are you sure you want to delete this scholarship?',
                'class' => 'btn btn-delete'
            ]
        ) ?>




        <?= $this->Form->button(
            'Update Scholarship',
            [
                'class' => 'btn btn-save'
            ]
        ) ?>



    </div>




    <?= $this->Form->end() ?>



</div>