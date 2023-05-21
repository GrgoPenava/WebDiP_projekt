<?php
/* Smarty version 4.3.0, created on 2023-05-21 16:57:22
  from 'C:\xampp\htdocs\projekt\templates\navigacija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646a315205c459_82252731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2308c9a2e5648bbc3d742cc975289fc346b6a481' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\navigacija.tpl',
      1 => 1684434352,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646a315205c459_82252731 (Smarty_Internal_Template $_smarty_tpl) {
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
