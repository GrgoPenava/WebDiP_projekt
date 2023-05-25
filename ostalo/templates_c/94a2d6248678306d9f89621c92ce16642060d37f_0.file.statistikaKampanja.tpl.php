<?php
/* Smarty version 4.3.0, created on 2023-05-25 20:55:34
  from 'C:\xampp\htdocs\projekt\templates\statistikaKampanja.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646faf26b808b7_75377838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94a2d6248678306d9f89621c92ce16642060d37f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\statistikaKampanja.tpl',
      1 => 1685036218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646faf26b808b7_75377838 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Naziv:</label>
                <input type="text" id="username" name="naziv" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="nazivButton" style="align-items:center"/>
              </form>
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Broj proizvoda:</label>
                <input type="text" id="username" name="brojproizvodakojisetrazi" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="proizvodiButton" style="align-items:center"/>
              </form>
  </div>
<?php if ($_smarty_tpl->tpl_vars['sveKampanje']->value) {?>
<div style="display:flex; align-items:center; justify-content:center; gap:2rem; padding-bottom:2rem;">
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuAZ()">Proizvodi (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuZA()">Proizvodi (Z-A)</button>
</div>
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuNazivAZ()">Naziv (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuNazivZA()">Naziv (Z-A)</button>
</div>
</div>
<div style="display:flex; justify-content: center;">
<table id="mojaTablica2">
              <thead>
                <tr>
                <th>ID</th>
                  <th>Naziv</th>
                  <th>Opis</th>
                  <th>Broj kupljenih proizvoda</th>
                </tr>
              </thead>
              <tbody>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sveKampanje']->value, 'redak');
$_smarty_tpl->tpl_vars['redak']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['redak']->value) {
$_smarty_tpl->tpl_vars['redak']->do_else = false;
?>
  <?php if ($_smarty_tpl->tpl_vars['Ulogakorisnika']->value == 1 || $_smarty_tpl->tpl_vars['redak']->value['ID_korisnik'] == $_smarty_tpl->tpl_vars['Idkorisnika']->value) {?>
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_kampanja'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['naziv'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['opis'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['broj_kupljenih_proizvoda'];?>
</td>
    </tr>
  <?php }
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
<p style="display:flex; justify-content: center; font-size:large; font-weight:bolder;">Nemate kampanje kojima ste moderator.</p>
<?php }?>
<div style="min-height:29rem; min-width:98vw;">
<canvas id="grafCanvas" width="400" height="300"></canvas>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
  function sortirajTablicuAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica2");
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

  function sortirajTablicuZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica2");
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

function sortirajTablicuNazivAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica2");
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

  function sortirajTablicuNazivZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica2");
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

var kampanje = <?php echo $_smarty_tpl->tpl_vars['sveKampanjeEncode']->value;?>
;
console.log(kampanje);
<?php echo '</script'; ?>
><?php }
}
