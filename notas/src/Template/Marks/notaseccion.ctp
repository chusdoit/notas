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

        <li><a href="/notas/SubjectMangements/">Volver</a></li>

                 <li style="margin-top:80px;"><a href="/notas/users/logout" style="color:black;font-weight:bold;">Desconectarse</a></li></li>

    </ul>
</nav>


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
             <td>
                   <?= $rols->cod_user ?>
              </td>
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