<?php
/* Smarty version 4.3.0, created on 2023-05-26 21:57:50
  from 'C:\xampp\htdocs\projekt\templates\urediKorisnika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64710f3e132069_25278291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43fdae408387c4d6d933aab6a58f7f80576c214b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\urediKorisnika.tpl',
      1 => 1685130998,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64710f3e132069_25278291 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
    <section class="centeredsection" style="height: 50rem;">
      <div style="margin-top:5rem;">
        <p class="dodavanjenoveporuke">Uređivanje uloge korisnika</p>
        <?php if ((isset($_smarty_tpl->tpl_vars['porukaGreske']->value))) {?>
        <p class="dodavanjenoveporuke" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['porukaGreske']->value;?>
</p>
        <?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['porukaUspjeha']->value))) {?>
        <p class="dodavanjenoveporuke" style="color:green;"><?php echo $_smarty_tpl->tpl_vars['porukaUspjeha']->value;?>
</p>
        <?php }?>
        <form id="kreirajKampanju" method="post" name="urediProizvod" action="" novalidate>
          <fieldset>
            <legend>Korisnik:</legend>
            <label for="bodovizakupovinu">Ime i prezime: </label>
            <input disabled type="text" id="bodovizakupovinu" name="bodovi_za_kupovinu" placeholder="5" required="required" <?php if ((isset($_smarty_tpl->tpl_vars['korisnikZaUrediti']->value["ime"])) && (isset($_smarty_tpl->tpl_vars['korisnikZaUrediti']->value["prezime"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['korisnikZaUrediti']->value["ime"];?>
 <?php echo $_smarty_tpl->tpl_vars['korisnikZaUrediti']->value["prezime"];?>
"<?php }?> /><br />
            <label for="status_proizvoda">Uloga korisnika:</label>
            <select id="status_proizvoda" name="uloga" style="width:14rem;">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sveUloge']->value, 'uloga');
$_smarty_tpl->tpl_vars['uloga']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['uloga']->value) {
$_smarty_tpl->tpl_vars['uloga']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['uloga']->value['ID_uloga'];?>
" <?php if ((isset($_smarty_tpl->tpl_vars['korisnikZaUrediti']->value["ID_uloga"])) && $_smarty_tpl->tpl_vars['uloga']->value['ID_uloga'] == $_smarty_tpl->tpl_vars['korisnikZaUrediti']->value["ID_uloga"]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['uloga']->value['naziv_uloga'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <br/>
            <input type="hidden" name="ID_korisnik" value="<?php echo $_smarty_tpl->tpl_vars['korisnikZaUrediti']->value["ID_korisnik"];?>
">
            <div style="display:flex; justify-items:center;">
            <input id="submit" name="urediUloguKorisnika" type="submit" value="Uredi" style="cursor:pointer;"  />
            </div>
          </fieldset>
        </form>
      </div>
    </section>
  </main>
<?php }
}
