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

class SubjectMangementsController extends AppController
{
    public function index()

    {
        $dni = $this->Auth->User('cod_user');
        $rol = $this->SubjectMangements->findByTeacher($dni);
        $rol->select(['desc_course','cod_subject','desc_subject'])
        ->distinct(['desc_subject']);

        $this->set('rol', $rol);
    }

    public function add()
    {
        $post = $this->SubjectMangements->newEntity();

        if($this->request->is('post'))
        {
            $post = $this->SubjectMangements->patchEntity($post, $this->request->getData());


            if($this->SubjectMangements->save($post))
            {
                $this->Flash->success('Nuevo Registro guardada correctamente' );

                return $this->redirect(['action'=>'index']);
            }
        }

        $this->set('post', $post);
    }

}