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

class MarksController extends AppController
{



    public function index()
    {
        // ORM OBJECT RELATIONAL MAPPING
        // VER LAS OPCIONES DEL ORDENAMIENTO
        $options = array(

            'order' => array('Marks.cod_user ASC','Marks.cod_subject DESC'),
        );
        $rols = $this->Marks->find("all", $options);
        //    var_dump($posts);

        $this->set(compact('rols'));

    }




    public function view()
    {



        $user = Configure::read('Company');


        $rol = $this->Marks->findByCod_user($user);

        $this->set('rol', $rol);
    }


    public function mnotas()
    {
        // $this->jma = 47489534;

/*
        $user = $this->Marks->get('all', [
            'contain' => ['Courses']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);

*/

        $options['joins'] = array(
            array('table' => 'marks',
                'alias' => 'marks',
                'type' => 'inner',
                'foreignKey' => true,
                'conditions' => array(
                    'marks.cod_curso = courses.cod_course'
                )
            )

        );

        $books = $this->Marks->find('all', $options);
        var_dump($options);
        $this->set('user', $books);


    }

    public function courses ()
    {

        $id = $this->Auth->User('id');
        $user = $this->Marks->get($id, [
            'contain' => ['Courses']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);


    }

    public function misnotas (){
        $dni = $this->Auth->User('cod_user');
        $rol = $this->Marks->findByCod_user($dni);

        $this->set('rol', $rol);
    }

    public function notaseccion ($seccion){
        $dni = $this->Auth->User('cod_user');
        $rol = $this->Marks->find('all',  [
            'conditions' => ['marks.sec =' => $seccion]]);

        $this->set('rols', $rol);
    }

    public function notasasignatura ($asignatura){
        $dni = $this->Auth->User('cod_user');
        $rol = $this->Marks->find('all',  [
            'conditions' => ['marks.cod_subject =' => $asignatura]]);

        $this->set('rols', $rol);
    }

    public function notasuser ($usuario){
        $rol = $this->Marks->findByCod_user($usuario);

        $this->set('rol', $rol);
    }
    public function notasuseradm ($usuario){
        $rol = $this->Marks->findByCod_user($usuario);

        $this->set('rol', $rol);
    }
}