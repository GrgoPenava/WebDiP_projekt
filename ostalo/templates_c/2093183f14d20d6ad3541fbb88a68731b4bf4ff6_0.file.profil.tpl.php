<?php
/* Smarty version 4.3.0, created on 2023-05-24 21:54:03
  from 'C:\xampp\htdocs\projekt\templates\profil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646e6b5b8f26c7_52939859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2093183f14d20d6ad3541fbb88a68731b4bf4ff6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\profil.tpl',
      1 => 1684958042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646e6b5b8f26c7_52939859 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
  <main>
    <section>
      <div style="min-height:40rem; min-width:98vw;">
      <div style="display:flex; flex-direction:row; align-items:center; justify-content:center; margin-top:5rem;gap:3rem;">
      <div class="card" style="max-width:40rem;">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['korisnik']->value['prezime'];?>
</h3>
                <p class="card-description">Email: <?php echo $_smarty_tpl->tpl_vars['korisnik']->value['email'];?>
</p>
                <p class="card-description">Username: <?php echo $_smarty_tpl->tpl_vars['korisnik']->value['username'];?>
</p>
                <p class="card-description">Spol: <?php echo $_smarty_tpl->tpl_vars['korisnik']->value['spol'];?>
</p>
                <p class="card-description">Datum i vrijeme registracije: <?php echo $_smarty_tpl->tpl_vars['korisnik']->value['datum_registracije'];?>
</p>
                <p class="card-description">Broj bodova za kupnju: <?php echo $_smarty_tpl->tpl_vars['korisnik']->value['broj_bodova'];?>
</p>
                </div>
      </div>
      <?php $_smarty_tpl->_assignInScope('slikaConvert', base64_encode($_smarty_tpl->tpl_vars['korisnik']->value['slika']));?>
      <div><img src="data:image/jpeg;base64,<?php echo $_smarty_tpl->tpl_vars['slikaConvert']->value;?>
" height=250 width=250 /></div>
      </div>
      <div style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
        <h1>Kupljeni proizvodi</h1>
      </div>
          <?php $_smarty_tpl->_assignInScope('brojac', 0);?>
        <?php if ((isset($_smarty_tpl->tpl_vars['kupljeniproizvodi']->value))) {?>
        <div class="card-grid">
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kupljeniproizvodi']->value, 'kupljeniproizvod');
$_smarty_tpl->tpl_vars['kupljeniproizvod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kupljeniproizvod']->value) {
$_smarty_tpl->tpl_vars['kupljeniproizvod']->do_else = false;
?>
         <?php $_smarty_tpl->_assignInScope('brojac', $_smarty_tpl->tpl_vars['brojac']->value+1);?>
            <div class="card">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['kupljeniproizvod']->value['naziv'];?>
</h3>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kupljeniproizvod']->value['opis'];?>
</p>
                <p class="card-description">Datum kupnje: <?php echo $_smarty_tpl->tpl_vars['kupljeniproizvod']->value['datum_kupnje'];?>
</p>
                <p class="card-description">Cijena: <?php echo $_smarty_tpl->tpl_vars['kupljeniproizvod']->value['cijena'];?>
 kn.</p>
                </div>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['brojac']->value == 0) {?>
        <p style="font-size:large; font-weight:bolder; display:flex; flex-direction:column; align-items:center; justify-content:center;">Nema kupljenih proizvoda.</p>
        <?php } else { ?>
        <p style="font-size:large; font-weight:bolder; display:flex; flex-direction:column; align-items:center; justify-content:center;">Ukupno kupljenih proizvoda: <?php echo $_smarty_tpl->tpl_vars['brojac']->value;?>
</p>
        <?php }?>
      </div>
</div><?php }
}
