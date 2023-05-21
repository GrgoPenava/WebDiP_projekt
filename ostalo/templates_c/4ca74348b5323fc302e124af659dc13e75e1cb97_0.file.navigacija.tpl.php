<?php
/* Smarty version 4.3.0, created on 2023-05-18 20:36:05
  from 'C:\xampp\htdocs\moje_datoteke\templates\navigacija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6466701591c283_78914142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ca74348b5323fc302e124af659dc13e75e1cb97' => 
    array (
      0 => 'C:\\xampp\\htdocs\\moje_datoteke\\templates\\navigacija.tpl',
      1 => 1684434352,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6466701591c283_78914142 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="izbornik"><nav>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Početna stranica</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/o_autoru.php">O autoru</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/autentikacija.php">Autentikacija</a>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/obrazac.php">Obrazac</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/popis.php">Popis</a>
        <?php }?>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 3) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/multimedija.php">Multimedija</a>
        <?php }?>

        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] === 1) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/obrazac.php">Obrazac</a>
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/plan.html">Plan</a>
        <?php if ((isset($_SESSION['uloga']))) {?>
            <a href='?odjava=da'><button type='button' class='odjava-button'>Odjava</button></a>
        <?php }?>
        </nav>
        </div><?php }
}
