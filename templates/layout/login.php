<!DOCTYPE html>
<html>

<head>

    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>
        HTC Scholarship Portal
    </title>


    <?= $this->Html->css('login') ?>

</head>


<body>


    <div class="page-container">


        <!-- Header -->
        <header class="main-header">


            <div class="header-content">


                <?= $this->Html->image('logo.png', [
                    'alt' => 'HTC Logo',
                    'class' => 'school-logo'
                ]) ?>


                <div class="school-title">

                    <h1>
                        HTC Scholarship Portal
                    </h1>


                    <p>
                        Holy Trinity College of General Santos City
                    </p>

                </div>


            </div>


        </header>





        <!-- Background Area -->
        <section class="login-section">


            <div class="login-card">


                <?= $this->Flash->render() ?>


                <?= $this->fetch('content') ?>


            </div>


        </section>





        <!-- Footer -->
        <footer class="main-footer">


            © <?= date('Y') ?> Holy Trinity College of General Santos City. All rights reserved.


        </footer>



    </div>


</body>

</html>