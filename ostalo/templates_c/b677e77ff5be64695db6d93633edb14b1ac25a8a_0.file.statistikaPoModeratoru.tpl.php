<?php
/* Smarty version 4.3.0, created on 2023-05-26 19:19:27
  from 'C:\xampp\htdocs\projekt\templates\statistikaPoModeratoru.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6470ea1fe30953_39609037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b677e77ff5be64695db6d93633edb14b1ac25a8a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\statistikaPoModeratoru.tpl',
      1 => 1685121567,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6470ea1fe30953_39609037 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['korisnici']->value) {?>
<div style="display:flex; justify-content: center; margin-top:10rem;">
<table>
              <thead>
                <tr>
                <th>ID moderatora</th>
                  <th>Username</th>
                  <th>Broj prodanih proizvoda</th>
                </tr>
              </thead>
              <tbody>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['korisnici']->value, 'redak');
$_smarty_tpl->tpl_vars['redak']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['redak']->value) {
$_smarty_tpl->tpl_vars['redak']->do_else = false;
?>
      <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_korisnik'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['username'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['broj_prodanih_proizvoda'];?>
</td>
    </tr>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </tbody>
              <tfoot>
              <?php if ($_smarty_tpl->tpl_vars['brojacZapisa']->value > 0) {?>
                <tr class="footertablice">
                  <td colspan="10">Ukupno zapisa: <?php echo $_smarty_tpl->tpl_vars['brojacZapisa']->value;?>
</td>
                </tr>
                <?php }?>
              </tfoot>
            </table>
            </div>
<?php }?>
<div style="min-height:29rem; min-width:98vw;"></div><?php }
}
