<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Scholarships Controller
 *
 * @property \App\Model\Table\ScholarshipsTable $Scholarships
 */
class ScholarshipsController extends AppController
{
    /**
     * Before Filter
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Use the student layout for scholarship pages
        $this->viewBuilder()->setLayout('student');
    }

    /**
     * Scholarship Listing
     */
    public function index()
    {
        $query = $this->Scholarships
            ->find()
            ->where([
                'Scholarships.status' => 'Open',
            ])
            ->orderBy([
                'Scholarships.scholarship_name' => 'ASC',
            ]);

        $scholarships = $this->paginate($query);

        $this->set(compact('scholarships'));
    }

    /**
     * Scholarship Details
     */
    public function view($id = null)
    {
        $scholarship = $this->Scholarships->get(
            $id,
            contain: ['Requirements']
        );

        $this->set(compact('scholarship'));
    }

    /**
     * Add Scholarship
     */
    public function add()
    {
        $scholarship = $this->Scholarships->newEmptyEntity();

        if ($this->request->is('post')) {

            $scholarship = $this->Scholarships->patchEntity(
                $scholarship,
                $this->request->getData(),
                [
                    'associated' => ['Requirements'],
                ]
            );

            if ($this->Scholarships->save($scholarship)) {

                $this->Flash->success('The scholarship has been saved.');

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('The scholarship could not be saved.');
        }

        $requirements = $this->Scholarships
            ->Requirements
            ->find('list')
            ->orderBy([
                'Requirements.requirement_name' => 'ASC',
            ])
            ->all();

        $this->set(compact(
            'scholarship',
            'requirements'
        ));
    }

    /**
     * Edit Scholarship
     */
    public function edit($id = null)
    {
        $scholarship = $this->Scholarships->get(
            $id,
            contain: ['Requirements']
        );

        if ($this->request->is(['patch', 'post', 'put'])) {

            $scholarship = $this->Scholarships->patchEntity(
                $scholarship,
                $this->request->getData(),
                [
                    'associated' => ['Requirements'],
                ]
            );

            if ($this->Scholarships->save($scholarship)) {

                $this->Flash->success('The scholarship has been updated.');

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('The scholarship could not be updated.');
        }

        $requirements = $this->Scholarships
            ->Requirements
            ->find('list')
            ->orderBy([
                'Requirements.requirement_name' => 'ASC',
            ])
            ->all();

        $this->set(compact(
            'scholarship',
            'requirements'
        ));
    }

    /**
     * Delete Scholarship
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $scholarship = $this->Scholarships->get($id);

        if ($this->Scholarships->delete($scholarship)) {

            $this->Flash->success('The scholarship has been deleted.');
        } else {

            $this->Flash->error('The scholarship could not be deleted.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
