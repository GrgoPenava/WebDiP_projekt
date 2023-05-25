<?php
/* Smarty version 4.3.0, created on 2023-05-25 11:28:36
  from 'C:\xampp\htdocs\projekt\templates\proizvodi_body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646f2a44962ad2_08738989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba8c40fc15cc8a5aa29d61ab45eac4b4607e19c6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\proizvodi_body.tpl',
      1 => 1685006915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646f2a44962ad2_08738989 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
  <main>
    <section>
      <div>
      <div style="min-height:40rem; min-width:98vw; margin-top:3rem;">

          <div class="card-grid">
          <?php $_smarty_tpl->_assignInScope('brojac', 0);?>
          <?php if ((isset($_smarty_tpl->tpl_vars['proizvodi']->value))) {?>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['proizvodi']->value, 'proizvod');
$_smarty_tpl->tpl_vars['proizvod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['proizvod']->value) {
$_smarty_tpl->tpl_vars['proizvod']->do_else = false;
?>
         <?php $_smarty_tpl->_assignInScope('brojac', $_smarty_tpl->tpl_vars['brojac']->value+1);?>
            <div class="card">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['proizvod']->value['naziv'];?>
</h3>
                <p class="card-description">Opis: <?php echo $_smarty_tpl->tpl_vars['proizvod']->value['opis'];?>
</p>
                <p class="card-description">Ukupno proizvoda: <?php echo $_smarty_tpl->tpl_vars['proizvod']->value['kolicina'];?>
 proizvoda.</p>
                <p class="card-description">Cijena u bodovima: <?php echo $_smarty_tpl->tpl_vars['proizvod']->value['cijena_u_bodovima'];?>
</p>
                <p class="card-description">Cijena: <?php echo $_smarty_tpl->tpl_vars['proizvod']->value['cijena'];?>
 kn.</p>
                <p class="card-description">Kupnjom ovog proizvoda dobijete <?php echo $_smarty_tpl->tpl_vars['proizvod']->value['bodovi_za_kupovinu'];?>
 bodova</p>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['proizvod']->value['kolicina'];
$_prefixVariable1 = ob_get_clean();
if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4 && (isset($_smarty_tpl->tpl_vars['imaprofil']->value)) && $_prefixVariable1 > 0) {?>
                <form id="kupinovcem" method="POST" name="kupinovcem" action="" novalidate>
                <input type="hidden" name="id_proizvod" value="<?php echo $_smarty_tpl->tpl_vars['proizvod']->value['ID_proizvod'];?>
">
                <input type="hidden" name="id_kampanje_iz_smarty" value="<?php echo $_smarty_tpl->tpl_vars['idkampanje']->value;?>
">
                <div style="display:flex;gap:0.5rem; margin-bottom:1rem;">
                <input type="text" id="unesenavrijednost" name="unesenavrijednost" /><br />
                <input class="card-button" style="cursor:pointer;" type="submit" value="Kupi" name="kupinovcem"/>
                </div>
                </form>
                <form id="kupibodovima" method="POST" name="kupibodovima" action="" novalidate>
                <input type="hidden" name="id_proizvod" value="<?php echo $_smarty_tpl->tpl_vars['proizvod']->value['ID_proizvod'];?>
">
                <input type="hidden" name="id_kampanje_iz_smarty" value="<?php echo $_smarty_tpl->tpl_vars['idkampanje']->value;?>
">
                <div style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                <input class="card-button" style="cursor:pointer;" type="submit" value="Kupi bodovima" name="kupibodovima"/>
                </div>
                </form>
                <?php }?>
                </div>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
          </div>
        <?php if ($_smarty_tpl->tpl_vars['brojac']->value == 0) {?>
        <p style="font-size:large; font-weight:bolder;display:flex; flex-direction:column; align-items:center; justify-content:center;">Nema proizvoda.</p>
        <?php } else { ?>
        <p style="font-size:large; font-weight:bolder;display:flex; flex-direction:column; align-items:center; justify-content:center;">Ima ukupno <?php echo $_smarty_tpl->tpl_vars['brojac']->value;?>
 različitih proizvoda.</p>
        <?php }?>
      </div>


<?php echo '<script'; ?>
 type="text/javascript">


<?php echo '</script'; ?>
><?php }
}
