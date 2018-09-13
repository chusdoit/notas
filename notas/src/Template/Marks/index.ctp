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

<? if ($this->Session->read('Auth.User.cod_rol') == 5 ){ ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
     <li class="heading"><?= __('Menu') ?></li>
    <li><a href="/notas/users">Gestionar Usuarios</a></li>
        <li><a href="/notas/courses/">Gestionar Cursos</a></li>
          <li><a href="/notas/subjects">Gestionar Asignaturas</a></li>
          <li><a href="/notas/dpts/listado">Gestionar Departamentos</a></li>
           <li><a href="/notas/rols">Gestionar Roles</a></li>
        <li><a href="/notas/marks">Ver Calificaciones</a></li></li>
<li><a href="/notas/cargardistancia">Cargar Calificaciones</a></li></li>
         <li><a href="/notas/cargardistancia/cargausuarios">Cargar Alumnos</a></li></li>                 <li style="margin-top:80px;"><a href="/notas/users/logout" style="color:black !important;" class="btn btn-primary">Desconectarse</a></li></li>

    </ul>
</nav>

<? }
 else {?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
     <li class="heading"><?= __('Menu') ?></li>

                 <li style="margin-top:80px;"><a href="/notas/users/logout" style="color:black !important;" class="btn btn-primary">Desconectarse</a></li></li>

    </ul>
</nav>


<? } ?>

<div class="users form large-9 medium-8 columns content">



<h3>Calificaciones </h3>



<table>
    <thead>
        <tr>

            <th>SECCIÓN</th>
            <th>NÚMERO</th>
            <th>DNI</th>
            <th>ASIGNATURA</th>
            <th>DISTANCIA</th>
             <th>PRESENCIA</th>
              <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($rols as $rols): ?>


        <tr>
            <td>
                   <?= $rols->sec ?>

            </td>
            <td>
                    <?= $rols->num ?>
            </td>

            <? if ($this->Session->read('Auth.User.cod_rol') == 5 ){ ?>


              <? $urlsec = "/marks/notasuseradm/" . $rols->cod_user ?>
              <td>   <a href="<?= $this->Url->Build($urlsec)?>"> <?= $rols->cod_user ?> </a></td>

             <? }else{ ?>
                <? $urlsec = "/marks/notasuser/" . $rols->cod_user ?>
              <td>   <a href="<?= $this->Url->Build($urlsec)?>"> <?= $rols->cod_user ?> </a></td>
              <? } ?>

               <td>
                   <?= $rols->cod_subject ?>
            </td>
            <td>
                    <?= $rols->distance ?>
             </td>
              <td>
                     <?= $rols->presence ?>
             </td>
             <td>
                                  <?= ($rols->distance + $rols->presence) /2?>
                          </td>

        </tr>
     <?php endforeach; ?>
    </tbody>


</table>

</div>