<?php
/* Smarty version 4.3.0, created on 2023-05-28 16:36:19
  from 'C:\xampp\htdocs\projekt\templates\navigacija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_647366e30affb2_79391110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf2618bf5a6ec92ddb7716c394c9bb8455249424' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\navigacija.tpl',
      1 => 1685284571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647366e30affb2_79391110 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="izbornik"><nav>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Kampanje</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/korisnici.php">Korisnici</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/autentikacija.php">Autentikacija</a>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4) {?>
        <?php }?>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 3) {?>
        <?php }?>

        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] == 1) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/proizvodiPopis.php">Proizvodi</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/popisSvihKorisnika.php">Admin</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/dnevnik.php">Dnevnik</a>
        <?php }?>
        <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/profil.php">Profil</a>
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/o_autoru.php">O autoru</a>
        <?php if ((isset($_SESSION['uloga']))) {?>
            <a href='?odjava=da'><button type='button' class='odjava-button'>Odjava</button></a>
        <?php }?>
        </nav>
        </div><?php }
}
