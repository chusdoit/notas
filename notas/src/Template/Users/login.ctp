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

<div style="margin:0 auto;width:30%;margin-top:200px;">

<h3 style="text-align:center;">Acceder a la aplicacion</h3>
<?= $this->Form->create() ?>
<div class="form-group">
    <?= $this->Form->control('cod_user', ['class' => 'form-control','label' => 'Nombre de Usuario']) ?>
</div>
<div class="form-group">
    <?= $this->Form->control('password', ['class' => 'form-control']) ?>
</div>
<?= $this->Form->button('Aceptar', ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>

</div>