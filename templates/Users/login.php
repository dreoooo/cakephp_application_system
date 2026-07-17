<div class="login-container">

    <h2>
        Student Login
    </h2>

    <p class="login-description">
        Enter your institutional account to continue
    </p>


    <?= $this->Form->create() ?>


    <div class="form-group">

        <?= $this->Form->control('email', [
            'label' => 'Institutional Email',
            'type' => 'email',
            'placeholder' => 'example@online.htcgsc.edu.ph',
            'required' => true
        ]) ?>

    </div>


    <div class="form-group">

        <?= $this->Form->control('password', [
            'label' => 'Password',
            'type' => 'password',
            'placeholder' => 'Enter your password',
            'required' => true
        ]) ?>

    </div>


    <div class="login-button">

        <?= $this->Form->button('Login') ?>

    </div>


    <?= $this->Form->end() ?>


</div>