<?php
/* Smarty version 4.3.0, created on 2023-05-26 16:45:54
  from 'C:\xampp\htdocs\projekt\templates\urediCijeliProizvod.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6470c622679d95_15470756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c269dc1b3a9e49f39000aee20920330a6183af1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\urediCijeliProizvod.tpl',
      1 => 1685112350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6470c622679d95_15470756 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
    <section class="centeredsection" style="height: 60rem;">
      <div style="margin-top:5rem;">
        <p class="dodavanjenoveporuke">Uređivanje proizvoda</p>
        <?php if ((isset($_smarty_tpl->tpl_vars['porukaGreske']->value))) {?>
        <p class="dodavanjenoveporuke" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['porukaGreske']->value;?>
</p>
        <?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['porukaUspjeha']->value))) {?>
        <p class="dodavanjenoveporuke" style="color:green;"><?php echo $_smarty_tpl->tpl_vars['porukaUspjeha']->value;?>
</p>
        <?php }?>
        <form id="kreirajKampanju" method="post" name="urediProizvod" action="" novalidate enctype="multipart/form-data">
          <fieldset>
            <legend>Proizvod:</legend>
            <label for="naziv">Naziv: </label>
            <input type="text" id="naziv" name="naziv" placeholder="naziv" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["naziv"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["naziv"];?>
"<?php }?> /><br />
            <label for="naziv_eng">Naziv (eng): </label>
            <input type="text" id="naziv_eng" name="naziv_eng" placeholder="naziv(eng)" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["naziv_eng"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["naziv_eng"];?>
"<?php }?> /><br />
            <label for="opis">Opis: </label>
            <textarea cols=30 rows=5 id="opis" name="opis" placeholder="opis" oninput="provjera()"><?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["opis"]))) {
echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["opis"];
}?></textarea><br/>
            <label for="opis_eng">Opis (eng): </label>
            <textarea cols=30 rows=5 id="opis_eng" name="opis_eng" placeholder="opis(eng)" oninput="provjera()"><?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["opis_eng"]))) {
echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["opis_eng"];
}?></textarea><br/>
            <label for="kolicina">Kolicina: </label>
            <input type="text" id="kolicina" name="kolicina" placeholder="20" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["kolicina"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["kolicina"];?>
"<?php }?> /><br />
            <label for="cijena">Cijena: </label>
            <input type="text" id="cijena" name="cijena" placeholder="100" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["cijena"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["cijena"];?>
"<?php }?> /><br />
            <label for="cijena_eng">Cijena(eng): </label>
            <input type="text" id="cijena_eng" name="cijena_eng" placeholder="100" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["cijena_eng"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["cijena_eng"];?>
"<?php }?> /><br />
            <label for="cijena_u_bodovima">Cijena u bodovima: </label>
            <input type="text" id="cijena_u_bodovima" name="cijena_u_bodovima" placeholder="50" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["cijena_u_bodovima"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["cijena_u_bodovima"];?>
"<?php }?> /><br />
            <label for="bodovizakupovinu">Bodovi za kupovinu (koje korisnik dobije): </label>
            <input type="text" id="bodovizakupovinu" name="bodovizakupovinu" placeholder="5" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["bodovi_za_kupovinu"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["bodovi_za_kupovinu"];?>
"<?php }?> /><br />
            <label for="status_proizvoda">Status proizvoda:</label>
            <select id="status_proizvoda" name="status_proizvoda" onchange="provjera()">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sviStatusi']->value, 'status');
$_smarty_tpl->tpl_vars['status']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['status']->value['id_status_proizvoda'];?>
" onchange="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["id_status_proizvoda"])) && $_smarty_tpl->tpl_vars['status']->value['id_status_proizvoda'] == $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["id_status_proizvoda"]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['status']->value['naziv'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <br/>
            <label for="Tip_proizvoda">Tip proizvoda:</label>
            <select id="tip_proizvoda" name="tip_proizvoda" onchange="provjera()">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sviTipoviProizvoda']->value, 'tip');
$_smarty_tpl->tpl_vars['tip']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tip']->value) {
$_smarty_tpl->tpl_vars['tip']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['tip']->value['ID_tip_proizvoda'];?>
" onchange="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["ID_tip_proizvoda"])) && $_smarty_tpl->tpl_vars['tip']->value['ID_tip_proizvoda'] == $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["ID_tip_proizvoda"]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tip']->value['naziv'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <br/>
            <label for="id_korisnik">Moderator:</label>
            <select id="id_korisnik" name="id_korisnik" onchange="provjera()">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sviKorisnici']->value, 'korisnik');
$_smarty_tpl->tpl_vars['korisnik']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['korisnik']->value) {
$_smarty_tpl->tpl_vars['korisnik']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['korisnik']->value['ID_korisnik'];?>
" onchange="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["ID_korisnik"])) && $_smarty_tpl->tpl_vars['korisnik']->value['ID_korisnik'] == $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["ID_korisnik"]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['korisnik']->value['username'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <br/>
            <label for="slika">Slika: </label>
            <input type="file" id="slika" name="slika" oninput="provjera()" accept="image/*"/><br />
            <input type="hidden" name="ID_proizvod" value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["ID_proizvod"];?>
">
            <div style="display:flex; justify-items:center;">
            <input disabled id="submit" name="urediProizvod" type="submit" value="Uredi" style="cursor:pointer;"  />
            </div>
          </fieldset>
        </form>
      </div>
    </section>
  </main>

<?php echo '<script'; ?>
 type="text/javascript">

function provjera(){
  let uredi = document.getElementById('submit');
    if(provjeriNaziv() && provjeriKolicinu() && provjeriNazivEng() && provjeriOpis() && provjeriOpisEng() && provjeriCijenu() && provjeriCijenuEng() && provjeriCijenuBodovi() && provjeriBodoviZaKupovinu() && provjeriStatus() && provjeriTip() && provjeriModeratora() && provjeraSlike()){
      uredi.disabled = false;
    }else{
      uredi.disabled = true;
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

function provjeriKolicinu(){
  let naziv = document.getElementById('kolicina').value;
  if(naziv.length>0 && !isNaN(naziv)){
    if(naziv == 0){
      let raspoloziv = document.getElementById('status_proizvoda');
      raspoloziv.value = 2;
      raspoloziv.setAttribute('selected', 'selected');
    }
    return true;
  }else{
    return false;
  }
}

function provjeriCijenu(){
  let naziv = document.getElementById('cijena').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriCijenuEng(){
  let naziv = document.getElementById('cijena_eng').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriCijenuBodovi(){
  let naziv = document.getElementById('cijena_u_bodovima').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriBodoviZaKupovinu(){
  let naziv = document.getElementById('bodovizakupovinu').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriStatus(){
  let naziv = document.getElementById('status_proizvoda').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriTip(){
  let naziv = document.getElementById('tip_proizvoda').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriModeratora(){
  let naziv = document.getElementById('id_korisnik').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeraSlike(){
let datoteka = document.getElementById('slika').files[0].name;
let splitaninaziv = datoteka.split(".");
if(splitaninaziv[1] === "png"){
    return true;
}else{
    return false;
}
}

<?php echo '</script'; ?>
><?php }
}
