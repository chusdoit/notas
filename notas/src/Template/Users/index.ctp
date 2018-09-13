<?
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
?>


<?php

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
     <li class="heading"><?= __('Menu') ?></li>
    <li><a href="#">Gestionar Usuarios</a></li>
        <li><?= $this->Html->link(__('-- Nuevo Usuario'), ['action' => 'add']) ?></li>
        <li><a href="/notas/courses/">Gestionar Cursos</a></li>
          <li><a href="/notas/subjects">Gestionar Asignaturas</a></li>
          <li><a href="/notas/dpts/listado">Gestionar Departamentos</a></li>
           <li><a href="/notas/rols">Gestionar Roles</a></li>
        <li><a href="/notas/marks">Ver Calificaciones</a></li></li>
<li><a href="/notas/cargardistancia">Cargar Calificaciones</a></li></li>
         <li><a href="/notas/cargardistancia/cargausuarios">Cargar Alumnos</a></li></li>
                          <li style="margin-top:80px;"><a href="/notas/users/logout" style="color:black !important;" class="btn btn-primary">Desconectarse</a></li></li>

    </ul>
</nav>

<? if ($this->Session->read('Auth.User.id') == 2 ) {
    echo '<a href="#">hola</a>';
    }?>

<div class="users index large-9 medium-8 columns content">

    <h3><?= __('Usuarios') ?></h3>


    <table class="table-hover">
        <thead>
        <tr>

            <th scope="col"><?= $this->Paginator->sort('DNI') ?></th>
              <th scope="col"><?= $this->Paginator->sort('ROL') ?></th>
            <th scope="col"><?= $this->Paginator->sort('NOMBRE') ?></th>
             <th scope="col"><?= $this->Paginator->sort('APELLIDOS') ?></th>

           <th scope="col" style="text-align:center;"><?= $this->Paginator->sort('ACCIONES') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>

                <td><?= h($user->cod_user) ?></td>
                 <td><?= h($user->cod_rol) ?></td>
                <td><?= h($user->Nombre) ?></td>
                 <td ><?= h($user->Apellidos) ?></td>


                <td class="actions" >
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id],['class' => 'btn btn-primary']) ?>

                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger','confirm' => __('¿Seguro que quiere borrar el usuario # {0}?', $user->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
