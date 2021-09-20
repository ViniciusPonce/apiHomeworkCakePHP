<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Collection\Collection;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventManagerInterface;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Sales;
use Seller;

/**
 * Sales Controller
 *
 * @method \App\Model\Entity\Sale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalesController extends AppController
{
    /**
     * @var \Cake\Datasource\RepositoryInterface|null
     */
    private $sale;
    private $data;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $sales = $this->Sales->find('all');
        // foreach ($sales as $sale) {
        //     $car = $sale;
        // }
        $tableSellers = $this->getTableLocator()->get('Sellers');

        $query = $this->Sales->find('all', ['contain' => ['Sellers']])->all();

        foreach ($query as $sale) {
            $sales = $sale;
        }
        // dd($data);
        // $sales = $this->paginate($this->data);

        $this->set(compact('sales', $this->paginate()));
    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $table = $this->getTableLocator()->get('Sellers');

        $sellers = $table->find('all')->extract('name')->toArray();

        $sale = $this->Sales->newEmptyEntity();
        // debug($sale->comission);
        if ($this->request->is('post')) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $this->set(compact('sale', 'sellers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $this->set(compact('sale'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
