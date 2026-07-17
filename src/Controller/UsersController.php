<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Display users
     */
    public function index()
    {
        if (!$this->request->getSession()->check('Auth')) {

            return $this->redirect([
                'action' => 'login'
            ]);
        }


        $query = $this->Users->find();

        $users = $this->paginate($query);


        $this->set(compact('users'));
    }



    /**
     * Student Home Dashboard
     */
    public function home()
    {
        if (!$this->request->getSession()->check('Auth')) {

            return $this->redirect([
                'action' => 'login'
            ]);
        }


        $auth = $this->request
            ->getSession()
            ->read('Auth');


        $this->viewBuilder()
            ->setLayout('student');


        $this->set([
            'auth' => $auth
        ]);
    }



    /**
     * Student Profile
     */
    /**
     * Student Profile
     */
    public function view()
    {
        if (!$this->request->getSession()->check('Auth')) {
            return $this->redirect([
                'action' => 'login'
            ]);
        }

        $this->viewBuilder()
            ->setLayout('student');

        $auth = $this->request
            ->getSession()
            ->read('Auth');

        $user = $this->Users->get(
            $auth['id'],
            contain: [
                'Applications'
            ]
        );

        $this->set(compact('user'));
    }



    /**
     * Register Student
     */
    public function add()
    {
        $this->viewBuilder()
            ->setLayout('login');


        $user = $this->Users->newEmptyEntity();



        if ($this->request->is('post')) {


            $data = $this->request->getData();


            // Default role
            $data['role'] = 'student';


            $user = $this->Users->patchEntity(
                $user,
                $data
            );


            if ($this->Users->save($user)) {


                $this->Flash->success(
                    'Registration successful. Please login.'
                );


                return $this->redirect([
                    'action' => 'login'
                ]);
            }


            $this->Flash->error(
                'Registration failed.'
            );
        }



        $this->set(compact('user'));
    }



    /**
     * Student Login
     */
    /**
     * Student Login
     */
    public function login()
    {

        $this->viewBuilder()
            ->setLayout('login');


        // Already logged in
        if ($this->request->getSession()->check('Auth')) {

            return $this->redirect([
                'action' => 'home'
            ]);
        }


        if ($this->request->is('post')) {


            $email = $this->request
                ->getData('email');


            $password = $this->request
                ->getData('password');


            // Find user
            $user = $this->Users
                ->find()
                ->where([
                    'email' => $email
                ])
                ->first();


            if ($user) {


                // Temporary password checking
                if ($password === $user->password) {


                    $this->request
                        ->getSession()
                        ->write('Auth', [

                            'id' => $user->id,

                            'id_number' => $user->id_number,

                            'first_name' => $user->first_name,

                            'last_name' => $user->last_name,

                            'email' => $user->email

                        ]);


                    return $this->redirect([
                        'action' => 'home'
                    ]);
                }
            }


            $this->Flash->error(
                'Invalid email or password.'
            );
        }
    }



    /**
     * Logout
     */
    public function logout()
    {

        $this->request
            ->getSession()
            ->destroy();



        $this->Flash->success(
            'You have been logged out.'
        );



        return $this->redirect([
            'action' => 'login'
        ]);
    }



    /**
     * Edit User
     */
    public function edit()
    {
        if (!$this->request->getSession()->check('Auth')) {
            return $this->redirect(['action' => 'login']);
        }

        $this->viewBuilder()->setLayout('student');

        $auth = $this->request->getSession()->read('Auth');

        $user = $this->Users->get($auth['id']);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();

            // Prevent editing these fields
            unset($data['id_number']);
            unset($data['role']);
            unset($data['password']);

            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {

                // Update session
                $auth['first_name'] = $user->first_name;
                $auth['last_name'] = $user->last_name;
                $auth['email'] = $user->email;

                $this->request->getSession()->write('Auth', $auth);

                $this->Flash->success('Profile updated successfully.');

                return $this->redirect(['action' => 'view']);
            }

            $this->Flash->error('Unable to update your profile.');
        }

        $this->set(compact('user'));
    }



    /**
     * Delete User
     */
    public function delete($id = null)
    {

        if (!$this->request->getSession()->check('Auth')) {

            return $this->redirect([
                'action' => 'login'
            ]);
        }



        $this->request->allowMethod([
            'post',
            'delete'
        ]);



        $user = $this->Users->get($id);



        if ($this->Users->delete($user)) {


            $this->Flash->success(
                'User deleted.'
            );
        } else {


            $this->Flash->error(
                'Unable to delete user.'
            );
        }



        return $this->redirect([
            'action' => 'index'
        ]);
    }
}
