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

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
    <li class="heading"><?= __('Menu') ?></li>
    <li><a href="/notas/users/">Gestionar Usuarios</a></li>

        <li><a href="/notas/courses/">Gestionar Cursos</a></li>
          <li><a href="/notas/subjects">Gestionar Asignaturas</a></li>
           <li><a href="/notas/dpts/listado">Gestionar Departamentos</a></li>
           <li><?= $this->Html->link(__('-- Nuevo Dpto'), ['action' => 'add']) ?></li>
           <li><a href="/notas/rols">Gestionar Roles</a></li>

        <li><a href="/notas/marks">Ver Calificaciones</a></li></li>
<li><a href="/notas/cargardistancia">Cargar Calificaciones</a></li></li>
         <li><a href="/notas/cargardistancia/cargausuarios">Cargar Alumnos</a></li></li>                 <li style="margin-top:80px;"><a href="/notas/users/logout" style="color:black !important;" class="btn btn-primary">Desconectarse</a></li></li>

    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">

<h3> Agregar un nuevo Departamento</h3>

<?php

echo $this->Form->create($post);


echo $this->Form->control('curso',[
                                           'label' => 'Curso'
                                       ]);
echo $this->Form->control('cod_dep',[
                                            'label' => 'Código del Departamento'
                                        ]);
echo $this->Form->control('desc_dep',[
                                            'label' => 'Descripción del Departamento'
                                        ]);
echo $this->Form->control('cod_subject',[
                                            'label' => 'Código de la Asignatura'
                                        ]);
echo $this->Form->control('jefe_dep',[
                                            'label' => 'Jefe de Departamento'
                                        ]);
echo $this->Form->button('Guardar');


echo $this->Form->end();

?>

</div>