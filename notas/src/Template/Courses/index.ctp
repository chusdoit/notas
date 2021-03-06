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
         <li><?= $this->Html->link(__('-- Nuevo Curso'), ['action' => 'add']) ?></li>
          <li><a href="/notas/subjects">Gestionar Asignaturas</a></li>
          <li><a href="/notas/dpts/listado">Gestionar Departamentos</a></li>

           <li><a href="/notas/rols">Gestionar Roles</a></li>
        <li><a href="/notas/marks">Ver Calificaciones</a></li></li>
<li><a href="/notas/cargardistancia">Cargar Calificaciones</a></li></li>
         <li><a href="/notas/cargardistancia/cargausuarios">Cargar Alumnos</a></li></li>                 <li style="margin-top:80px;"><a href="/notas/users/logout" style="color:black !important;" class="btn btn-primary">Desconectarse</a></li></li>

    </ul>
</nav>


<div class="users index large-9 medium-8 columns content">

<h3> Cursos</h3>

<table class=" table-hover" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">CÓDIGO</th>
            <th scope="col">DESCRIPCIÓN</th>
           <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rols as $rols): ?>


        <tr>
            <td>
                   <?= $rols->cod_course ?>

            </td>
            <td>
                    <?= $rols->desc_course ?>
            </td>
            <td>
                <?= $this->Html->Link('Editar',['action'=>'edit',$rols->cod_course],['class' => 'btn btn-primary']) ?>
                <?= $this->Form->postLink('Borrar',['action'=>'delete',$rols->cod_course],
                                 ['class' => 'btn btn-danger','confirm' => 'Estas seguro que quiere eliminar el curso ' . $rols->desc_course . '?']) ?>

            </td>
        </tr>
     <?php endforeach; ?>
    </tbody>


</table>

</div>