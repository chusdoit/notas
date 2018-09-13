<?php

/**
 * Copyright (C) 2018 Jesus MARTÍN ABAD - Universidad Internacional de la Rioja
 * Curso de Adaptación a Grado en Ingeniería Informática

 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option) any
 * later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

namespace App\Controller;

use App\Controller\AppController;


class UsersController extends AppController
{




    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

    }


    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Posts']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }


    public function viewnotes()
    {

        $id = $this->Auth->User('id');
        $user = $this->Users->get($id, [
            'contain' => ['Marks']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }


    public function add()
    {
        $post = $this->Users->newEntity();

        if($this->request->is('post'))
        {
            $post = $this->Users->patchEntity($post, $this->request->getData());


            if($this->Users->save($post))
            {
                $this->Flash->success('Nuevo usuario guardada correctamente' );

                return $this->redirect(['action'=>'index']);
            }
        }

        $this->set('post', $post);
    }



    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario se ha guardado correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido guaardar el usuario. Intentelo más tarde'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }



    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario se haa borrado correctamente'));
        } else {
            $this->Flash->error(__('El usuario no se ha podido borrar. Inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);

             // return $this->redirect($this->Auth->redirectUrl());
                $rol = $this->Auth->User('cod_rol');

                if ($rol == 1){
                $url = '/marks/misnotas' ;
                }else if ($rol == 2){

                    $url = '/SubjectMangements/' ;
                }
                else if ($rol == 3) {
                    $url = '/dpts/' ;
                }
                else  if ($rol == 4) {
                    $url = '/marks/' ;
                }
                else{
                    $url = '/users/';
                }
               return $this->redirect($url);



            }

            $this->Flash->error('Usuario o contraseña incorrectos :(');
        }
    }

    public function logout()
    {
        $this->Flash->success('Desconectado Correctamente.');
        return $this->redirect($this->Auth->logout());
    }
}
