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
use Cake\Core\Configure;

class CoursesController extends AppController
{

    public function index()
    {

        // ORM OBJECT RELATIONAL MAPPING
        $rols = $this->Courses->find();
        //    var_dump($posts);

        $this->set(compact('rols'));

    }

    public function add()
    {
        $post = $this->Courses->newEntity();

        if($this->request->is('post'))
        {
            $post = $this->Courses->patchEntity($post, $this->request->getData());


            if($this->Courses->save($post))
            {
                $this->Flash->success('Nuevo curso guardada correctamente' );

                return $this->redirect(['action'=>'index']);
            }
        }

        $this->set('post', $post);
    }


    public function delete($slug)
    {
        if($this->request->is(['post','put']))
        {
            $post = $this->Courses->findByCod_course($slug)->firstOrFail();

            if($this->Courses->delete($post))
            {
                $this->Flash->success('Curso eliminado correctamente' );

                return $this->redirect(['action'=>'index']);
            } else{
                $this->Flash->error('No se ha podido eliminar');
            }
        }
    }


    public function edit($rol)
    {
        $post = $this->Courses->findByCod_course($rol)->firstOrFail();

        if($this->request->is(['post','put']))
        {
            $post = $this->Courses->patchEntity($post, $this->request->getData());


            if($this->Courses->save($post))
            {
                $this->Flash->success('Curso editado correctamente' );

                return $this->redirect(['action'=>'index']);
            } else{
                $this->Flash->error('No se ha podido guardar');
            }
        }

        $this->set('post', $post);
    }

    public function dni()
    {
        Configure :: write ( 'Company', '47489536');

        $user = Configure :: read ( 'Company');



        $this->set('user', $user);
    }


}
