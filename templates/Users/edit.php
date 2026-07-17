<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="profile-container">

    <div class="profile-card">


        <!-- Header -->

        <div class="profile-header">

            <div class="profile-avatar">
                <i class="bi bi-pencil-square"></i>
            </div>


            <div class="profile-info">

                <h1>
                    Edit Profile
                </h1>

                <p>
                    Update your personal information
                </p>

            </div>

        </div>



        <!-- Form -->

        <div class="profile-form">


            <?= $this->Form->create($user) ?>


            <div class="form-group">

                <?= $this->Form->control('first_name', [
                    'label' => 'First Name',
                    'class' => 'form-input'
                ]) ?>

            </div>



            <div class="form-group">

                <?= $this->Form->control('last_name', [
                    'label' => 'Last Name',
                    'class' => 'form-input'
                ]) ?>

            </div>



            <div class="form-group">

                <?= $this->Form->control('email', [
                    'label' => 'Email Address',
                    'class' => 'form-input'
                ]) ?>

            </div>



            <div class="profile-actions">


                <button type="submit" class="profile-button">
                    <i class="bi bi-check-circle"></i>
                    Save Changes
                </button>


                <?= $this->Html->link(
                    '<i class="bi bi-x-circle"></i> Cancel',
                    ['action' => 'view'],
                    [
                        'class' => 'profile-button secondary',
                        'escape' => false
                    ]
                ) ?>


            </div>


            <?= $this->Form->end() ?>


        </div>


    </div>


</div>