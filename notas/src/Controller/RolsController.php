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

class RolsController extends AppController
{

    public function index()
    {
        // ORM OBJECT RELATIONAL MAPPING
        $rols = $this->Rols->find();
        //    var_dump($posts);

        $this->set(compact('rols'));
    }

    public function view($slug = null)
    {
        $rol = $this->Rols->findByCod_rol($slug)->firstOrFail();

        $this->set('rol', $rol);
    }

    public function add()
    {
        $post = $this->Rols->newEntity();

        if($this->request->is('post'))
        {
            $post = $this->Rols->patchEntity($post, $this->request->getData());


            if($this->Rols->save($post))
            {
                $this->Flash->success('Nuevo Rol guardado correctamente' );

                return $this->redirect(['action'=>'index']);
            }
        }

        $this->set('post', $post);
    }

    public function edit($rol)
    {
        $post = $this->Rols->findByCod_rol($rol)->firstOrFail();

        if($this->request->is(['post','put']))
        {
            $post = $this->Rols->patchEntity($post, $this->request->getData());


            if($this->Rols->save($post))
            {
                $this->Flash->success('Rol editado correctamente' );

                return $this->redirect(['action'=>'index']);
            } else{
                $this->Flash->error('No se ha podido guardar');
            }
        }

        $this->set('post', $post);
    }

    public function delete($slug)
    {
        if($this->request->is(['post','put']))
        {
            $post = $this->Rols->findByCod_rol($slug)->firstOrFail();

            if($this->Rols->delete($post))
            {
                $this->Flash->success('Rol eliminado correctamente' );

                return $this->redirect(['action'=>'index']);
            } else{
                $this->Flash->error('No se ha podido eliminar');
            }
        }
    }

}