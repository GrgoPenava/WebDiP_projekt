<?php
/* Smarty version 4.3.0, created on 2023-05-25 20:17:41
  from 'C:\xampp\htdocs\projekt\templates\urediKampanju_body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646fa6455490e8_43215284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60eaf2a35539b6648f37b37733d14b117271e923' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\urediKampanju_body.tpl',
      1 => 1685037596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646fa6455490e8_43215284 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
    <section class="centeredsection" style="height: 50rem;">
      <div style="margin-top:5rem;">
        <p class="dodavanjenoveporuke">Uređivanje</p>
        <?php if ((isset($_smarty_tpl->tpl_vars['porukaGreske']->value))) {?>
        <p class="dodavanjenoveporuke" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['porukaGreske']->value;?>
</p>
        <?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['porukaUspjeha']->value))) {?>
        <p class="dodavanjenoveporuke" style="color:green;"><?php echo $_smarty_tpl->tpl_vars['porukaUspjeha']->value;?>
</p>
        <?php }?>
        <form id="kreirajKampanju" method="post" name="kreirajKampanju" action="" novalidate>
          <fieldset>
            <legend>Kampanja:</legend>
            <label for="naziv">Naziv: </label>
            <input type="text" id="naziv" name="naziv" placeholder="Snizenje 50%" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["naziv"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["naziv"];?>
"<?php }?> /><br />
            <label for="naziv_eng">Naziv (eng): </label>
            <input type="text" id="naziv_eng" name="naziv_eng" placeholder="Discount 50%" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["naziv_eng"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["naziv_eng"];?>
"<?php }?> /><br />
            <div class="sadrzajdiv">
              <label for="opis">Opis:</label>
              <textarea id="opis" name="opis" rows="5" required="required" oninput="provjera()"><?php if ((isset($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["opis"]))) {
echo $_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["opis"];
}?></textarea>
            </div>
            <br />
            <div class="sadrzajdiv">
              <label for="opis_eng">Opis (eng):</label>
              <textarea id="opis_eng" name="opis_eng" rows="5" required="required" oninput="provjera()" ><?php if ((isset($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["opis_eng"]))) {
echo $_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["opis_eng"];
}?></textarea>
            </div>
            <br />
            <label for="datum_i_vrijeme_pocetka">Datum i vrijeme pocetka:</label>
            <input type="datetime-local" id="datum_i_vrijeme_pocetka" name="datum_i_vrijeme_pocetka" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["datum_i_vrijeme_pocetka"]))) {?> value="<?php echo date_format(date_create($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["datum_i_vrijeme_pocetka"]),'Y-m-d\TH:i');?>
"<?php }?> />
            <br />
            <label for="datum_i_vrijeme_zavrsetka">Datum i vrijeme zavrsetka:</label>
            <input type="datetime-local" id="datum_i_vrijeme_zavrsetka" name="datum_i_vrijeme_zavrsetka" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["datum_i_vrijeme_zavrsetka"]))) {?> value="<?php echo date_format(date_create($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["datum_i_vrijeme_zavrsetka"]),'Y-m-d\TH:i');?>
"<?php }?>/>
            <br />
            <label for="Tip kampanje">Tip kampanje:</label>
            <select id="tip_kampanje" name="tip_kampanje" onchange="provjera()">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sviTipoviKampanje']->value, 'tip');
$_smarty_tpl->tpl_vars['tip']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tip']->value) {
$_smarty_tpl->tpl_vars['tip']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['tip']->value['ID_tip_kampanje'];?>
" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["ID_tip_kampanje"])) && $_smarty_tpl->tpl_vars['tip']->value['ID_tip_kampanje'] == $_smarty_tpl->tpl_vars['kampanjaZaUrediti']->value["ID_tip_kampanje"]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tip']->value['naziv'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <br/>
            <label for="Tip kampanje">Proizvodi:</label>
            <select id="proizvodi" name="proizvodi[]" multiple onchange="provjera()">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sviProizvodi']->value, 'proizvod');
$_smarty_tpl->tpl_vars['proizvod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['proizvod']->value) {
$_smarty_tpl->tpl_vars['proizvod']->do_else = false;
?>
              <?php if (in_array($_smarty_tpl->tpl_vars['proizvod']->value['ID_proizvod'],array_column($_smarty_tpl->tpl_vars['popisProizvoda']->value,'ID_proizvod'))) {?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['proizvod']->value['ID_proizvod'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['proizvod']->value['naziv'];?>
</option>
              <?php } else { ?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['proizvod']->value['ID_proizvod'];?>
"><?php echo $_smarty_tpl->tpl_vars['proizvod']->value['naziv'];?>
</option>
              <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <br/>
            <input type="hidden" name="ID_korisnik" value="<?php echo $_smarty_tpl->tpl_vars['ID_korisnika']->value;?>
">
            <div style="display:flex; justify-items:center;">
            <input id="submit" name="urediKampanju" type="submit" value="Uredi"  />
            <input id="brisiButton" name="obrisiKampanju" type="submit" value="Obrisi"  />
            </div>
          </fieldset>
        </form>
      </div>
    </section>
  </main>

<?php echo '<script'; ?>
 type="text/javascript">

function provjera(){
  let kreiraj = document.getElementById('submit');
    if(provjeriNaziv() && provjeriNazivEng() && provjeriOpis() && provjeriOpisEng() && provjeriDatumPocetak() && provjeriDatumZavrsetak() && provjeriTipKampanje() && provjeriProizvod()){
      kreiraj.disabled = false;
    }else{
      kreiraj.disabled = true;
    }
}

function provjeriNaziv(){
  let naziv = document.getElementById('naziv').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriNazivEng(){
  let naziv = document.getElementById('naziv_eng').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriOpis(){
  let naziv = document.getElementById('opis').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriOpisEng(){
  let naziv = document.getElementById('opis_eng').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriDatumPocetak(){
  let naziv = document.getElementById('datum_i_vrijeme_pocetka').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriDatumZavrsetak(){
  let naziv = document.getElementById('datum_i_vrijeme_zavrsetka').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriTipKampanje(){
  let naziv = document.getElementById('tip_kampanje').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriProizvod(){
  let naziv = document.getElementById('proizvodi').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

<?php echo '</script'; ?>
><?php }
}
