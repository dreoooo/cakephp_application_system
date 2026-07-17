<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ScholarshipRequirements Controller
 *
 * @property \App\Model\Table\ScholarshipRequirementsTable $ScholarshipRequirements
 */
class ScholarshipRequirementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ScholarshipRequirements->find()
            ->contain(['Scholarships', 'Requirements']);
        $scholarshipRequirements = $this->paginate($query);

        $this->set(compact('scholarshipRequirements'));
    }

    /**
     * View method
     *
     * @param string|null $id Scholarship Requirement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scholarshipRequirement = $this->ScholarshipRequirements->get($id, contain: ['Scholarships', 'Requirements']);
        $this->set(compact('scholarshipRequirement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scholarshipRequirement = $this->ScholarshipRequirements->newEmptyEntity();
        if ($this->request->is('post')) {
            $scholarshipRequirement = $this->ScholarshipRequirements->patchEntity($scholarshipRequirement, $this->request->getData());
            if ($this->ScholarshipRequirements->save($scholarshipRequirement)) {
                $this->Flash->success(__('The scholarship requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scholarship requirement could not be saved. Please, try again.'));
        }
        $scholarships = $this->ScholarshipRequirements->Scholarships->find('list', limit: 200)->all();
        $requirements = $this->ScholarshipRequirements->Requirements->find('list', limit: 200)->all();
        $this->set(compact('scholarshipRequirement', 'scholarships', 'requirements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scholarship Requirement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scholarshipRequirement = $this->ScholarshipRequirements->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scholarshipRequirement = $this->ScholarshipRequirements->patchEntity($scholarshipRequirement, $this->request->getData());
            if ($this->ScholarshipRequirements->save($scholarshipRequirement)) {
                $this->Flash->success(__('The scholarship requirement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scholarship requirement could not be saved. Please, try again.'));
        }
        $scholarships = $this->ScholarshipRequirements->Scholarships->find('list', limit: 200)->all();
        $requirements = $this->ScholarshipRequirements->Requirements->find('list', limit: 200)->all();
        $this->set(compact('scholarshipRequirement', 'scholarships', 'requirements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scholarship Requirement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scholarshipRequirement = $this->ScholarshipRequirements->get($id);
        if ($this->ScholarshipRequirements->delete($scholarshipRequirement)) {
            $this->Flash->success(__('The scholarship requirement has been deleted.'));
        } else {
            $this->Flash->error(__('The scholarship requirement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
