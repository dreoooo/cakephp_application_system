<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Applications Controller
 *
 * @property \App\Model\Table\ApplicationsTable $Applications
 */
class ApplicationsController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        if (!$this->request->getSession()->check('Auth')) {

            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);
        }

        $this->viewBuilder()->setLayout('student');
    }



    /**
     * My Applications
     */
    public function index()
    {
        $auth = $this->request->getSession()->read('Auth');


        $applications = $this->Applications
            ->find()
            ->where([
                'Applications.user_id' => $auth['id']
            ])
            ->contain([
                'Scholarships'
            ])
            ->orderBy([
                'Applications.created' => 'DESC'
            ])
            ->all();



        // Default status fallback

        foreach ($applications as $application) {

            if (empty($application->status)) {

                $application->status = 'Pending';
            }
        }



        $this->set(compact('applications'));
    }





    /**
     * Application Form
     */
    public function add($scholarshipId = null)
    {

        if (!$scholarshipId) {

            return $this->redirect([
                'controller' => 'Scholarships',
                'action' => 'index'
            ]);
        }



        $auth = $this->request->getSession()->read('Auth');



        $scholarship = $this->Applications
            ->Scholarships
            ->get(
                $scholarshipId,
                contain: [
                    'ScholarshipRequirements' => [
                        'Requirements'
                    ]
                ]
            );





        // Prevent duplicate application

        $existing = $this->Applications
            ->find()
            ->where([
                'user_id' => $auth['id'],
                'scholarship_id' => $scholarshipId
            ])
            ->first();




        if ($existing) {

            $this->Flash->error(
                'You have already applied for this scholarship.'
            );


            return $this->redirect([
                'controller' => 'Scholarships',
                'action' => 'view',
                $scholarshipId
            ]);
        }





        $application = $this->Applications->newEmptyEntity();




        if ($this->request->is('post')) {


            $application = $this->Applications->patchEntity(
                $application,
                [

                    'user_id' => $auth['id'],

                    'scholarship_id' => $scholarshipId,

                    'status' => 'Pending',

                    'submitted_at' => FrozenTime::now()

                ]
            );




            if ($this->Applications->save($application)) {

                return $this->redirect([
                    'action' => 'index'
                ]);
            }




            $this->Flash->error(
                'Unable to submit application.'
            );
        }





        $this->set(compact(
            'application',
            'scholarship'
        ));
    }







    /**
     * View Application
     */
    public function view($id = null)
    {

        $auth = $this->request->getSession()->read('Auth');



        $application = $this->Applications
            ->find()
            ->where([

                'Applications.id' => $id,

                'Applications.user_id' => $auth['id']

            ])
            ->contain([

                'Scholarships',

                'Users'

            ])
            ->firstOrFail();





        // Default status

        if (empty($application->status)) {

            $application->status = 'Pending';
        }





        $this->set(compact('application'));
    }
}
