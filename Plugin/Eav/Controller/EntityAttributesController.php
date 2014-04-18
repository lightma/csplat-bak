<?php
App::uses('EavAppController', 'Eav.Controller');

class EntityAttributesController extends EavAppController
{
	/**
 * List the EntityAttributes
 *
 * @return void
 */
    public function admin_index() {
        $this->EntityAttribute->recursive = 0;
        $this->set('entityTypes', $this->paginate());
    }

/**
 * View an EntityAttribute
 *
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->EntityAttribute->id = $id;
        if (!$this->EntityAttribute->exists()) {
            throw new NotFoundException(__('Invalid EntityAttribute'));
        }
        $this->set('EntityAttribute', $this->EntityAttribute->read(null, $id));
    }

/**
 * Add a new EntityAttribute
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->EntityAttribute->create();
            if ($this->EntityAttribute->save($this->request->data)) {
                $this->Session->setFlash(__('The EntityAttribute has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The EntityAttribute could not be saved. Please, try again.'));
            }
        }
        $entityTypes = $this->EntityAttribute->EntityType->find('list');
        // $dataTypes = $this->EntityAttribute->DataType->find('list');
        $this->set(compact('entityTypes', 'dataTypes', 'userTypes'));
    }

/**
 * Edit an EntityAttribute
 *
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->EntityAttribute->id = $id;
        if (!$this->EntityAttribute->exists()) {
            throw new NotFoundException(__('Invalid EntityAttribute'));
        }
        if ($this->request->isPost() || $this->request->isPut()) {
            if ($this->EntityAttribute->save($this->request->data)) {
                $this->Session->setFlash(__('The EntityAttribute has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The EntityAttribute could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->EntityAttribute->read(null, $id);
        }
        $entityTypes = $this->EntityAttribute->EntityType->find('list');
        $dataTypes = $this->EntityAttribute->DataType->find('list');
        $this->set(compact('entityTypes', 'dataTypes', 'userTypes'));
    }

/**
 * Delete an EntityAttribute
 *
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->EntityAttribute->id = $id;
        if (!$this->EntityAttribute->exists()) {
            throw new NotFoundException(__('Invalid EntityAttribute'));
        }
        if ($this->EntityAttribute->delete()) {
            $this->Session->setFlash(__('EntityAttribute deleted'));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('EntityAttribute was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}