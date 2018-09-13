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
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
     <li class="heading"><?= __('Menu') ?></li>
    <li><a href="/notas/users">Gestionar Usuarios</a></li>
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
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editar Usuario') ?></legend>
        <p style="margin-top:10px;">Rol de usuario</p>
        <?php
     echo $this->Form->select('cod_rol', [
         '1' => 'Alumno',
         '2' => 'Profesor',
         '3' => 'Jefe de Departamento',
         '4' => 'Jefe de Estudios',
         '5' => 'Administrador',

     ]);
                   echo $this->Form->control('cod_user' ,[
                                                            'label' => 'DNI'
                                                        ]);
                    echo $this->Form->control('Nombre');
                     echo $this->Form->control('Apellidos');
                  echo $this->Form->control('password');
        ?>
    </fieldset>
    <?echo $this->Form->button('Guardar'); ?>
    <?= $this->Form->end() ?>
</div>
