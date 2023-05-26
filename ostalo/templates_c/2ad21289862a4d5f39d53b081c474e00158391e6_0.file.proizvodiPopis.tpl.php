<?php
/* Smarty version 4.3.0, created on 2023-05-26 13:14:46
  from 'C:\xampp\htdocs\projekt\templates\proizvodiPopis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_647094a69c7d59_38706395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ad21289862a4d5f39d53b081c474e00158391e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\proizvodiPopis.tpl',
      1 => 1685099684,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_647094a69c7d59_38706395 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" ><br/>
              </div>
                <input id="usernameButton" type="submit" value="Filtriraj" name="usernameButton" style="align-items:center"/>
              </form>
  </div>
<?php if ($_smarty_tpl->tpl_vars['proizvodi']->value) {?>
<div style="display:flex; align-items:center; justify-content:center; gap:0.2rem; padding-bottom:2rem;">
<button id="usernameButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuAZ()">A-Z</button>
<button id="usernameButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuZA()">Z-A</button>
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
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['id_status_proizvoda'];?>
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
<?php echo '</script'; ?>
><?php }
}
