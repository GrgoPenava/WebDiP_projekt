<?php
/* Smarty version 4.3.0, created on 2023-05-23 19:18:14
  from 'C:\xampp\htdocs\projekt\templates\obrazac_body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646cf556c34323_31982295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a497ff787a9db1aa73c187bf891edd6d344c521' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\obrazac_body.tpl',
      1 => 1684350145,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646cf556c34323_31982295 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
    <section class="centeredsection" style="height: 45rem;">
      <div class="obrazacapsolutan">
        <p class="dodavanjenoveporuke">Dodavanje nove poruke</p>
        <?php if ((isset($_smarty_tpl->tpl_vars['porukaGreske']->value))) {?>
        <p class="dodavanjenoveporuke" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['porukaGreske']->value;?>
</p>
        <?php }?>
        <?php if ((isset($_smarty_tpl->tpl_vars['porukaUspjeha']->value))) {?>
        <p class="dodavanjenoveporuke" style="color:green;"><?php echo $_smarty_tpl->tpl_vars['porukaUspjeha']->value;?>
</p>
        <?php }?>
        <form id="obrazacForm" method="post" name="obrazacForm" action="../obrasci/obrazac.php" novalidate>
          <fieldset>
            <legend>Adrese:</legend>
            <label for="posiljatelj">Pošiljatelj: </label>
            <input type="email" id="posiljatelj" name="posiljatelj" placeholder="naziv@nazivposluzitelja.xxx" value=<?php echo $_smarty_tpl->tpl_vars['posiljateljIzPrijave']->value;?>
 required="required" /><br />
            <label for="primatelj">Primatelj: </label>
            <input type="email" id="primatelj" name="primatelj" placeholder="naziv@nazivposluzitelja.xxx" required="required" /><br />
            <label for="naslov">Naslov: </label>
            <input type="naslov" id="naslov" name="naslov" required="required" /><br />
          </fieldset>
          <fieldset>
            <legend>Poruka:</legend>
            <label for="pristigla">Kategorija poruke: </label>
            <input type="checkbox" id="pristigla" name="pristigla" checked />
            <label for="pristigla">pristigla </label>
            <input type="checkbox" id="poslana" name="poslana" />
            <label for="poslana">poslana </label>
            <input type="checkbox" id="nacrt" name="nacrt" />
            <label for="nacrt">nacrt</label>
            <input type="checkbox" id="smece" name="smece" />
            <label for="smece">smeće</label>
            <input type="checkbox" id="nezeljena" name="nezeljena" checked />
            <label for="nezeljena">neželjena</label>
            <input type="checkbox" id="vazno" name="vazno" />
            <label for="vazno">važno</label><br />
            <div class="sadrzajdiv">
              <label for="sadrzaj">Sadržaj:</label>
              <textarea id="sadrzaj" name="sadrzaj" rows="5" required="required"></textarea>
            </div>
            <br />
            <label for="broj">Kontakt:</label>
            <input type="tel" id="broj" name="broj" required="required" />
            <br />
            <label for="url">URL:</label>
            <input type="url" id="url" name="url" required="required" />
            <br />
            <input id="submit" name="submitObrasca" type="submit" value="Pošalji"  />
          </fieldset>
        </form>
      </div>
    </section>
  </main>
<?php }
}
