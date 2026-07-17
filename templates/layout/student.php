<!DOCTYPE html>
<html>

<head>

    <?= $this->Html->charset() ?>

    <title>HTC Scholarship Portal</title>

    <?= $this->Html->css('student') ?>

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <!-- Header -->
    <?= $this->element('student_header') ?>

    <div class="student-wrapper">

        <!-- Sidebar -->
        <aside class="sidebar">

            <!-- Logo Section -->


            <!-- Menu -->
            <nav class="sidebar-menu">

                <?= $this->Html->link(
                    '<i class="bi bi-house-door"></i>
                    <span>Home</span>',
                    [
                        'controller' => 'Users',
                        'action' => 'home'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>

                <?= $this->Html->link(
                    '<i class="bi bi-person"></i>
                    <span>Profile</span>',
                    [
                        'controller' => 'Users',
                        'action' => 'view',
                        $this->request->getSession()->read('Auth.id')
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>

                <?= $this->Html->link(
                    '<i class="bi bi-mortarboard"></i>
                    <span>Scholarships</span>',
                    [
                        'controller' => 'Scholarships',
                        'action' => 'index'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>

                <?= $this->Html->link(
                    '<i class="bi bi-file-earmark-text"></i>
                    <span>Application Status</span>',
                    [
                        'controller' => 'Applications',
                        'action' => 'index'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>

            </nav>

            <!-- Logout -->
            <div class="sidebar-footer">

                <?= $this->Html->link(
                    '<i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>',
                    [
                        'controller' => 'Users',
                        'action' => 'logout'
                    ],
                    [
                        'escape' => false
                    ]
                ) ?>

            </div>

        </aside>

        <!-- Main Content -->
        <main class="main-content">

            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>

        </main>

    </div>

    <!-- Footer -->
    <?= $this->element('student_footer') ?>

</body>

</html>