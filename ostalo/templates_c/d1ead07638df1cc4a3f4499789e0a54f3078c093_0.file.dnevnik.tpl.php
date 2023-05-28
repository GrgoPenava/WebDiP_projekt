<?php
/* Smarty version 4.3.0, created on 2023-05-28 17:09:06
  from 'C:\xampp\htdocs\projekt\templates\dnevnik.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64736e922bf0c9_64500750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1ead07638df1cc4a3f4499789e0a54f3078c093' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\dnevnik.tpl',
      1 => 1685286543,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64736e922bf0c9_64500750 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['dnevnik']->value) {?>
<div class="datumform" style="padding-bottom:2rem;">
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
                <label for="username">Email:</label>
                <input type="text" id="username" name="email" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="emailButton" style="align-items:center"/>
              </form>
  </div>
<div style="display:flex; align-items:center; justify-content:center; gap:2rem; padding-bottom:2rem;">
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuAZ()">Username (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuZA()">Username (Z-A)</button>
</div>
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuBrojAZ()">Email (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuBrojZA()">Email (Z-A)</button>
</div>
</div>
<h1 style="display:flex; justify-content: center;">Dnevnik rada</h1>
<div style="display:flex; justify-content: center;">
<table id="mojaTablica">
              <thead>
                <tr>
                <th>ID radnje</th>
                  <th>ID korisnika</th>
                  <th>Datum i vrijeme</th>
                  <th>Radnja</th>
                  <th>Opis</th>
                  <th>Email</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dnevnik']->value, 'redak');
$_smarty_tpl->tpl_vars['redak']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['redak']->value) {
$_smarty_tpl->tpl_vars['redak']->do_else = false;
?>
      <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_radnje'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_korisnik'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['datum_i_vrijeme_zapisa'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['radnja'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['opis'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['email'];?>
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
<h1 style="display:flex; justify-content: center; font-size:large; font-weight:bolder; margin-top:10rem;">Nema zapisa u bazi podataka.</h1>
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
        x = redovi[i].getElementsByTagName("TD")[6];
        y = redovi[i + 1].getElementsByTagName("TD")[6];
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
      x = redovi[i].getElementsByTagName("TD")[6];
      y = redovi[i + 1].getElementsByTagName("TD")[6];
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
        x = redovi[i].getElementsByTagName("TD")[5];
        y = redovi[i + 1].getElementsByTagName("TD")[5];
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
      x = redovi[i].getElementsByTagName("TD")[5];
      y = redovi[i + 1].getElementsByTagName("TD")[5];
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
