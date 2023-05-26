<?php
/* Smarty version 4.3.0, created on 2023-05-26 19:14:41
  from 'C:\xampp\htdocs\projekt\templates\proizvodiPopis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6470e901099256_18570625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ad21289862a4d5f39d53b081c474e00158391e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\proizvodiPopis.tpl',
      1 => 1685121004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6470e901099256_18570625 (Smarty_Internal_Template $_smarty_tpl) {
?><div style="display:flex; justify-items:end; justify-content:end; margin-right: 2rem; margin-top:2rem; gap:1rem;">
<a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/kreirajProizvod.php" class="card-button">Kreiraj proizvod</a>
<a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/statistikaPoModeratoru.php" class="card-button">Statistika po moderatoru</a>
</div>
<div class="datumform" style="padding-bottom:0.5rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="moderator">Moderator:</label>
                <input type="text" id="moderator" name="moderator" ><br/>
              </div>
                <input id="moderatorButton" type="submit" value="Filtriraj" name="usernameButton" style="align-items:center"/>
              </form>
  </div>
  <div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="naziv">Naziv:</label>
                <input type="text" id="naziv" name="naziv" ><br/>
              </div>
                <input id="moderatorButton" type="submit" value="Filtriraj" name="nazivButton" style="align-items:center"/>
              </form>
  </div>
<?php if ($_smarty_tpl->tpl_vars['proizvodi']->value) {?>
<div style="display:flex; align-items:center; justify-content:center; gap:2rem; padding-bottom:2rem;">
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuKolicinaAZ()">Količina (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuKolicinaZA()">Količina (Z-A)</button>
</div>
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuModeratorAZ()">Moderator (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuModeratorZA()">Moderator (Z-A)</button>
</div>
</div>
<div style="display:flex; justify-content: center;">
<table id="mojaTablica">
              <thead>
                <tr>
                <th></th>
                <th>ID</th>
                  <th>Naziv</th>
                  <th>Kolicina</th>
                  <th>Cijena</th>
                  <th>Cijena u bodovima</th>
                  <th>Bodovi za kupnju</th>
                  <th>Status</th>
                  <th>Moderator</th>
                </tr>
              </thead>
              <tbody>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['proizvodi']->value, 'redak');
$_smarty_tpl->tpl_vars['redak']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['redak']->value) {
$_smarty_tpl->tpl_vars['redak']->do_else = false;
?>
      <tr>
      <td id="urediProizvod"><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/urediCijeliProizvod.php?proizvod=<?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_proizvod'];?>
" class="card-button">Uredi</a></td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_proizvod'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['naziv'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['kolicina'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['cijena'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['cijena_u_bodovima'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['bodovi_za_kupovinu'];?>
</td>
      <td>
      <?php if ($_smarty_tpl->tpl_vars['redak']->value['id_status_proizvoda'] == 1) {?>
        Raspoloživo
      <?php } elseif ($_smarty_tpl->tpl_vars['redak']->value['id_status_proizvoda'] == 2) {?>
        Nije raspoloživo
      <?php } else { ?>
        Nepoznato
      <?php }?>
    </td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['username'];?>
</td>
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
<p style="display:flex; justify-content: center; font-size:large; font-weight:bolder;">Nema proizvoda u bazi podataka.</p>
<?php }?>
<div style="min-height:29rem; min-width:98vw;"></div>

<?php echo '<script'; ?>
 type="text/javascript">
  function sortirajTablicuKolicinaAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[3];
        y = redovi[i + 1].getElementsByTagName("TD")[3];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
          promjena = true;
          break;
        }
      }
    }
  }

  function sortirajTablicuKolicinaZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[3];
      y = redovi[i + 1].getElementsByTagName("TD")[3];
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
        promjena = true;
        break;
      }
    }
  }
}

function sortirajTablicuModeratorAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[8];
        y = redovi[i + 1].getElementsByTagName("TD")[8];
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
          promjena = true;
          break;
        }
      }
    }
  }

  function sortirajTablicuModeratorZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[8];
      y = redovi[i + 1].getElementsByTagName("TD")[8];
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
