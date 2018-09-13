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



  <div class="related">
        <h3>Seleccione la asignatura</h3>

        <table class="table-hover">
            <tr>
                <th scope="col"><?= __('Curso') ?></th>

                <th scope="col"><?= __('Asignatura') ?></th>

            </tr>
            <?php foreach ($rol as $posts): ?>
            <tr> <td><?= h($posts->desc_course) ?></td>

            <? $urlsec = "/marks/notasasignatura/" . $posts->cod_subject ?>
                               <td>   <a href="<?= $this->Url->Build($urlsec)?>"> <?= $posts->cod_subject ?> </a></td>





            </tr>
            <?php endforeach; ?>
        </table>

    </div>

   </div>