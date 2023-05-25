<?php
/* Smarty version 4.3.0, created on 2023-05-25 20:55:11
  from 'C:\xampp\htdocs\projekt\templates\urediProizvod.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646faf0fd3a474_45538265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40592a4b32acbe5821c18813b8ab572dfa5da9f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\urediProizvod.tpl',
      1 => 1685040627,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646faf0fd3a474_45538265 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
    <section class="centeredsection" style="height: 50rem;">
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
        <form id="kreirajKampanju" method="post" name="urediProizvod" action="" novalidate>
          <fieldset>
            <legend>Proizvod:</legend>
            <label for="bodovizakupovinu">Bodovi za kupovinu (koje korisnik dobije): </label>
            <input type="text" id="bodovizakupovinu" name="bodovi_za_kupovinu" placeholder="5" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["bodovi_za_kupovinu"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["bodovi_za_kupovinu"];?>
"<?php }?> /><br />
            <label for="cijena_u_bodovima">Cijena u bodovima: </label>
            <input type="text" id="cijena_u_bodovima" name="cijena_u_bodovima" placeholder="50" required="required" oninput="provjera()" <?php if ((isset($_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["cijena_u_bodovima"]))) {?> value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["cijena_u_bodovima"];?>
"<?php }?> /><br />
            <input type="hidden" name="ID_proizvod" value="<?php echo $_smarty_tpl->tpl_vars['proizvodZaUrediti']->value["ID_proizvod"];?>
">
            <div style="display:flex; justify-items:center;">
            <input id="submit" name="urediProizvod" type="submit" value="Uredi" style="cursor:pointer;"  />
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
    if(provjeriBodoviZaKupovinu() && provjeriCijenaUbodovima()){
      uredi.disabled = false;
    }else{
      uredi.disabled = true;
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

function provjeriCijenaUbodovima(){
  let naziv = document.getElementById('cijena_u_bodovima').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}
<?php echo '</script'; ?>
><?php }
}
