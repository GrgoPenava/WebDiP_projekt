<?php
/* Smarty version 4.3.0, created on 2023-05-23 21:15:12
  from 'C:\xampp\htdocs\projekt\templates\profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646d10c010bef6_25958327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2093183f14d20d6ad3541fbb88a68731b4bf4ff6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\profil.tpl',
      1 => 1684869310,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646d10c010bef6_25958327 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
  <main>
    <section>
      <div>
      <div style="min-height:40rem; min-width:98vw;">
<div class="card" style="max-width:20rem;">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['korisnik']->value['prezime'];?>
</h3>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['email'];?>
</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['username'];?>
 proizvoda.</p>
                </div>
            </div>
            </div>
            </div>
            </div>

<p>Ime: <?php echo $_smarty_tpl->tpl_vars['korisnik']->value['ime'];?>
</p>
<?php }
}
