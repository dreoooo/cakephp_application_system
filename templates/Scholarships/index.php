<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Scholarship> $scholarships
 */
?>

<div class="scholarship-page">


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