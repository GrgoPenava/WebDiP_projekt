<?php
/* Smarty version 4.3.0, created on 2023-05-23 19:18:14
  from 'C:\xampp\htdocs\projekt\templates\navigacija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646cf55615d6c4_05430085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bee550306f0c3e99bc096fb9d3fe582eb24188a7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\navigacija.tpl',
      1 => 1684862266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646cf55615d6c4_05430085 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="izbornik"><nav>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Kampanje</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/o_autoru.php">O autoru</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/autentikacija.php">Autentikacija</a>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/obrazac.php">Obrazac</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/korisnici.php">Korisnici</a>
        <?php }?>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 3) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/multimedija.php">Multimedija</a>
        <?php }?>

        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] === 1) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/obrazac.php">Obrazac</a>
        <?php }?>
        <?php if ((isset($_SESSION['uloga']))) {?>
            <a href='?odjava=da'><button type='button' class='odjava-button'>Odjava</button></a>
        <?php }?>
        </nav>
        </div><?php }
}
