<?php
/* Smarty version 4.3.0, created on 2023-05-23 17:15:55
  from 'C:\xampp\htdocs\projekt\templates\popis_body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646cd8ab39c217_70734460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec8f310eff8863089d69a5f0dd6477ea8381b4ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\popis_body.tpl',
      1 => 1684832636,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646cd8ab39c217_70734460 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>

<section id="sectionTable">
          <div class="tablewrapper">
            <table>
              <thead>
                <tr>
                <th>ID poruke</th>
                  <th>Pošiljatelj</th>
                  <th>Primatelj</th>
                  <th>Naslov</th>
                  <th>Kategorija poruke</th>
                  <th>Sadržaj</th>
                  <th>Datum i vrijeme</th>
                  <th>Kontakt</th>
                  <th>URL</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
  <?php if ($_smarty_tpl->tpl_vars['podaciTablice']->value) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['podaciTablice']->value, 'redak');
$_smarty_tpl->tpl_vars['redak']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['redak']->value) {
$_smarty_tpl->tpl_vars['redak']->do_else = false;
?>
  <?php if ($_smarty_tpl->tpl_vars['redak']->value['ID_status'] == 0) {?>
      <tr style="background-color:#ffdd80">
      <?php } else { ?>
      <tr>
      <?php }?>

      <td style="cursor:pointer;" onclick="otvoriPoruku(<?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_poruke'];?>
)"><?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_poruke'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['posiljatelj'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['primatelj'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['naslov'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['kategorija'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['sadrzaj'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['datum_i_vrijeme'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['kontakt'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['redak']->value['url'];?>
</td>
      <?php if ($_smarty_tpl->tpl_vars['redak']->value['ID_status'] == 0) {?>
      <td>Nije pročitano</td>
      <?php } else { ?>
      <td>Pročitano</td>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['redak']->value['kategorija'] == "smece") {?>
      <td style="cursor:pointer;" onclick="obrisiRedak(<?php echo $_smarty_tpl->tpl_vars['redak']->value['ID_poruke'];?>
)">Obriši</td>
      <?php }?>
    </tr>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
  <tr>
    <td colspan="10" style="font-size:20px;color:red;font-weight:bold">Ne postoje podaci za prijavljenog korisnika!</td>
  </tr>
<?php }?>
              </tbody>
              <tfoot>
              <?php if ($_smarty_tpl->tpl_vars['brojZapisa']->value > 0) {?>
                <tr class="footertablice">
                  <td colspan="10">Ukupno zapisa: <?php echo $_smarty_tpl->tpl_vars['brojZapisa']->value;?>
</td>
                </tr>
                <?php }?>
              </tfoot>
            </table>
          </div>
        </section>

        <?php echo '<script'; ?>
>
           function obrisiRedak(idPoruke) {
    console.log("radi", idPoruke);
    $.ajax({
      url: '../privatno/brisanjeRedaTablice.php',
      type: 'POST',
      dataType: 'json',
      data: { idPorukeIzTablice: idPoruke },
      success: function(result) {
        location.reload();
      }
    });
  }

  function otvoriPoruku(idPoruke) {
    console.log("ude");
    $.ajax({
      url: '../obrasci/obrazac.php',
      type: 'POST',
      dataType: 'json',
      data: { idPorukeIzTablice: idPoruke },
      success: function(result) {
        
      }
    });
  }
        <?php echo '</script'; ?>
><?php }
}
