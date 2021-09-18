<?php
declare(strict_types=1);

namespace App\Controller;


/**
 * Sellers Controller
 *
 * @property \App\Model\Table\SellersTable $Sellers
 * @method \App\Model\Entity\Seller[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SellersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sellers = $this->paginate($this->Sellers);

        $this->set(compact('sellers'));
    }

    /**
     * View method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $seller = $this->Sellers->get($id, [
            'contain' => ['Sales'],
        ]);

        $this->set(compact('seller'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // dd($this->request);
        $seller = $this->Sellers->newEmptyEntity();
        if ($this->request->is('post')) {
            $seller = $this->Sellers->patchEntity($seller, $this->request->getData());
            if ($this->Sellers->save($seller)) {
                $this->Flash->success(__('Vendedor cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Vendedor não cadastrado, Por favor, tente novamente'));
        }
        $this->set(compact('seller'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $seller = $this->Sellers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $seller = $this->Sellers->patchEntity($seller, $this->request->getData());
            if ($this->Sellers->save($seller)) {
                $this->Flash->success(__('The seller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The seller could not be saved. Please, try again.'));
        }
        $this->set(compact('seller'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Seller id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $seller = $this->Sellers->get($id);
        if ($this->Sellers->delete($seller)) {
            $this->Flash->success(__('O vendedor foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O vendedor não foi deletado, Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
