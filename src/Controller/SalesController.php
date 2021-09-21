<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\SalesTable;
use App\Model\Table\SellersTable;
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
        $sales = $this->paginate(
            $this->Sales->find('all', ['contain' => ['Sellers']])
        );

        $this->set(compact('sales'));
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
            'contain' => ['Sellers'],
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

        $seller = $table->find()->select(array('id', 'name'))->toArray();
        
        $sellers = (new Collection($seller))->combine('id', 'name')->toArray();

        $sale = $this->Sales->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            $sale->comission = number_format($sale->value * SalesTable::comission, 2);

            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('Venda realizada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A venda não foi realizada, Porfavor, tente novamente.'));
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
            'contain' => ['Sellers'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            $sale->comission = $sale->value * SalesTable::comission;
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('Alteração feita com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A venda não foi alterada, Porfavor, tente novamente.'));
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
            $this->Flash->success(__('Venda deletada com sucesso.'));
        } else {
            $this->Flash->error(__('A venda não foi deletada, Porfavor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
