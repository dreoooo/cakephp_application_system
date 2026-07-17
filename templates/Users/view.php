<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="profile-container">

    <div class="profile-card">


        <!-- Profile Header -->

        <div class="profile-header">

            <div class="profile-avatar">
                <i class="bi bi-person-fill"></i>
            </div>


            <div class="profile-info">

                <h1>
                    <?= h($user->first_name . ' ' . $user->last_name) ?>
                </h1>

                <p>
                    Student Profile
                </p>

            </div>

        </div>



        <!-- Profile Details -->

        <div class="profile-details">


            <div class="detail-item">

                <div class="detail-icon">
                    <i class="bi bi-person"></i>
                </div>

                <div>
                    <span>First Name</span>
                    <strong>
                        <?= h($user->first_name) ?>
                    </strong>
                </div>

            </div>



            <div class="detail-item">

                <div class="detail-icon">
                    <i class="bi bi-person"></i>
                </div>

                <div>
                    <span>Last Name</span>
                    <strong>
                        <?= h($user->last_name) ?>
                    </strong>
                </div>

            </div>



            <div class="detail-item">

                <div class="detail-icon">
                    <i class="bi bi-envelope"></i>
                </div>

                <div>
                    <span>Email Address</span>
                    <strong>
                        <?= h($user->email) ?>
                    </strong>
                </div>

            </div>



            <div class="detail-item">

                <div class="detail-icon">
                    <i class="bi bi-card-heading"></i>
                </div>

                <div>
                    <span>ID Number</span>
                    <strong>
                        <?= h($user->id_number) ?>
                    </strong>
                </div>

            </div>


        </div>



        <!-- Action -->

        <div class="profile-actions">

            <?= $this->Html->link(
                '<i class="bi bi-pencil-square"></i> Edit Profile',
                ['action' => 'edit'],
                [
                    'class' => 'profile-button',
                    'escape' => false
                ]
            ) ?>

        </div>


    </div>


</div>