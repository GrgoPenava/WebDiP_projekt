<?php
/* Smarty version 4.3.0, created on 2023-05-27 17:29:51
  from 'C:\xampp\htdocs\projekt\templates\popisSvihKorisnika.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_647221ef5c0d79_86488273',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52e1c6fe3b9db45cf24e47f046f34945329ddc7a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\popisSvihKorisnika.tpl',
      1 => 1685201390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647221ef5c0d79_86488273 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="usernameButton" style="align-items:center"/>
              </form>
  </div>
  <div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Prezime:</label>
                <input type="text" id="username" name="prezime" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="prezimeButton" style="align-items:center"/>
              </form>
  </div>
<?php if ($_smarty_tpl->tpl_vars['korisnici']->value) {?>
<div style="display:flex; align-items:center; justify-content:center; gap:2rem; padding-bottom:2rem;">
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuAZ()">Username (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuZA()">Username (Z-A)</button>
</div>
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuBrojAZ()">Ime (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuBrojZA()">Ime (Z-A)</button>
</div>
</div>
<h1 style="display:flex; justify-content: center;">Popis korisnika koji imaju kreiran profil</h1>
<div style="display:flex; justify-content: center;">
<table id="mojaTablica">
              <thead>
                <tr>
                <th>Email</th>
                  <th>Username</th>
                  <th>Ime</th>
                  <th>Prezime</th>
                  <th>Datum registracije</th>
                  <th>Broj bodova</th>
                  <th>Aktiviran račun</th>
                  <th>Zaključan račun</th>
                <?php if ((isset($_smarty_tpl->tpl_vars['uloga']->value)) && $_smarty_tpl->tpl_vars['uloga']->value == 1) {?>
                <th></th>
                <?php }?>
                </tr>
              </thead>
              <tbody>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['korisnici']->value, 'redak');
$_smarty_tpl->tpl_vars['redak']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['redak']->value) {
$_smarty_tpl->tpl_vars['redak']->do_else = false;
?>
      <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['email'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['username'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['ime'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['prezime'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['datum_registracije'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['broj_bodova'];?>
</td>
      <td><?php if ($_smarty_tpl->tpl_vars['redak']->value['aktiviran_racun'] == 0) {?>
        Nije aktiviran
      <?php } elseif ($_smarty_tpl->tpl_vars['redak']->value['aktiviran_racun'] == 1) {?>
        Aktiviran
      <?php } else { ?>
        -
      <?php }?></td>
      <td><?php if ($_smarty_tpl->tpl_vars['redak']->value['blokiran'] == 0) {?>
        Nije zaključan
      <?php } elseif ($_smarty_tpl->tpl_vars['redak']->value['blokiran'] == 1) {?>
        Zaključan
      <?php } else { ?>
        -
      <?php }?></td>
      <?php if ((isset($_smarty_tpl->tpl_vars['uloga']->value)) && $_smarty_tpl->tpl_vars['uloga']->value == 1 && $_smarty_tpl->tpl_vars['redak']->value['blokiran'] == 0) {?>
      <td id="urediUlogu"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/popisSvihKorisnika.php?korisnikZakljucaj=<?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_korisnik'];?>
" class="card-button-red">Zaključaj</a></td>
      <?php }?>
      <?php if ((isset($_smarty_tpl->tpl_vars['uloga']->value)) && $_smarty_tpl->tpl_vars['uloga']->value == 1 && $_smarty_tpl->tpl_vars['redak']->value['blokiran'] == 1) {?>
      <td id="urediUlogu"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/popisSvihKorisnika.php?korisnikOtkljucaj=<?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_korisnik'];?>
" class="card-button">Otključaj</a></td>
      <?php }?>
    </tr>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </tbody>
              <tfoot>
              <?php if ($_smarty_tpl->tpl_vars['brojacZapisa']->value > 0) {?>
                <tr class="footertablice">
                  <td colspan="10">Ukupno zapisa: <?php echo $_smarty_tpl->tpl_vars['brojacZapisa']->value;?>
</td>
                </tr>
                <?php }?>
              </tfoot>
            </table>
</div>
<?php } else { ?>
<p style="display:flex; justify-content: center; font-size:large; font-weight:bolder;">Nema korisnika u bazi podataka.</p>
<?php }?>
<div style="min-height:29rem; min-width:98vw;"></div>

<?php echo '<script'; ?>
 type="text/javascript">
  function sortirajTablicuAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[1];
        y = redovi[i + 1].getElementsByTagName("TD")[1];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
          promjena = true;
          break;
        }
      }
    }
  }

  function sortirajTablicuZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[1];
      y = redovi[i + 1].getElementsByTagName("TD")[1];
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
        promjena = true;
        break;
      }
    }
  }
}
  function sortirajTablicuBrojAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[2];
        y = redovi[i + 1].getElementsByTagName("TD")[2];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
          promjena = true;
          break;
        }
      }
    }
  }

  function sortirajTablicuBrojZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[2];
      y = redovi[i + 1].getElementsByTagName("TD")[2];
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
        promjena = true;
        break;
      }
    }
  }
}

<?php echo '</script'; ?>
><?php }
}
