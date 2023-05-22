<?php
/* Smarty version 4.3.0, created on 2023-05-21 18:11:25
  from 'C:\xampp\htdocs\projekt\templates\kampanje_body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646a42ad930b77_78903604',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f460d68273937fdb930078d98b3b6c8f707f971' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\kampanje_body.tpl',
      1 => 1684685484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646a42ad930b77_78903604 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
  <main>
    <section>
      <div>
      <div style="min-height:40rem; min-width:98vw;">
      <p>Kampanje </p>
          <div class="card-grid">
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kampanje']->value, 'kampanja');
$_smarty_tpl->tpl_vars['kampanja']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kampanja']->value) {
$_smarty_tpl->tpl_vars['kampanja']->do_else = false;
?>
            <div class="card">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['naziv'];?>
</h3>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['opis'];?>
</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'];?>
 proizvoda.</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_pocetka'];?>
 - <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_zavrsetka'];?>
</p>
                <p class="card-description">Moderator: <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['prezime'];?>
</p>
                <a href="#" class="card-button">Odaberi</a>
                </div>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
      </div><?php }
}
