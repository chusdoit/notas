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
                 <li style="margin-top:80px;"><a href="/notas/users/logout" style="color:black !important;" class="btn btn-primary">Desconectarse</a></li></li>

    </ul>
</nav>

<div class="users view large-9 medium-8 columns content">

 <h4 style="color:#4d8f97;border-color:#4d8f97;"><?= __('Datos del Alumno') ?></h4>
    <table class="vertical-table">
        <tr>
            <th scope="row" style="width:10%;"><?= __('Nombre') ?></th>
           <td style="text-align:left;"> <?= $this->Session->read('Auth.User.Nombre'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellidos') ?></th>
             <td style="text-align:left;"> <?= $this->Session->read('Auth.User.Apellidos'); ?></td>

        </tr>
        <tr>
            <th scope="row"><?= __('D.N.I') ?></th>
              <td style="text-align:left;"> <?= $this->Session->read('Auth.User.cod_user'); ?></td>

        </tr>
         <tr>
                    <th scope="row"><?= __('Email') ?></th>
                  <td style="text-align:left;"> <?= $this->Session->read('Auth.User.email'); ?></td>

                </tr>

    </table>


  <div class="related">
        <h4><?= __('Mis Calificaciones') ?></h4>

        <table cellpadding="0" cellspacing="0">
            <tr>

                <th scope="col"><?= __('Asignatura') ?></th>
                <th scope="col"><?= __('Nota Distancia') ?></th>
                <th scope="col"><?= __('Nota Presencia') ?></th>
                <th scope="col"><?= __('Nota Final') ?></th>

            </tr>
            <?php foreach ($rol as $posts): ?>
            <tr> <td><?= h($posts->cod_subject) ?></td>
                <td><?= h($posts->distance) ?></td>
                <td><?= h($posts->presence) ?></td>
                <td><?= (h($posts->distance) + h($posts->presence))/2 ?></td>


            </tr>
            <?php endforeach; ?>
        </table>

    </div>

   </div>