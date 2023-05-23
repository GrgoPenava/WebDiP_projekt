<?php
/* Smarty version 4.3.0, created on 2023-05-23 17:15:55
  from 'C:\xampp\htdocs\projekt\templates\podnozje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646cd8ab462685_06409416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3896a2625501c4cbb1be8a432f18eae17c5e9a8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\podnozje.tpl',
      1 => 1683577354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646cd8ab462685_06409416 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <div class="povijest">
  <h2>Povijest pregledavanja</h2>
  <div class="povijestuflex">
    <aside title="Početna stranica">
      <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">
        <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/bmw-logo2.png" id="pocetnastranicaslika" alt="bmw logo" width="100" height="100" />
      </a>
    </aside>
    <aside title="Autentikacija">
      <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/autentikacija.php">
        <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/autentikacija.png" id="autentikacijaslika" alt="autentikacija" width="100" height="100" />
      </a>
    </aside>
    <aside title="Obrazac">
      <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/obrazac.php">
        <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/obrasci.png" id="obrascislika" alt="obrasci" width="100" height="100" />
      </a>
    </aside>
    <aside title="Popis">
      <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/popis.php">
        <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/popis.png" id="popisslika" alt="popis" width="100" height="100" />
      </a>
    </aside>
    <aside title="Multimedija">
      <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/multimedija.php">
        <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/multimedija.png" id="multimedijaslika" alt="multimedija" width="100" height="100" />
      </a>
    </aside>
    <aside title="O autoru">
      <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/o_autoru.php">
        <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/grgopenava.jpeg" id="oautoruslika" alt="o autoru" width="100" height="100" />
      </a>
    </aside>
  </div>
  <footer>
      <a href="http://validator.w3.org/check?uri=https://barka.foi.hr/WebDiP/2022/zadaca_01/gpenava/index.html">
        <img class="html5-picture" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/HTML5.png" alt="HTML5 validacija" />
      </a>

      <a href="https://jigsaw.w3.org/css-validator/validator?uri=http://barka.foi.hr/WebDiP/2022/zadaca_01/gpenava/css/gpenava.css">
        <img class="css-picture" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/CSS3.png" alt="CSS3 validacija" />
      </a>

      <div class="copyright-licenca">
        <img class="licenca-slika" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/licenca-CC-BY-NC-ND.png" alt="licenca C BY-NC-ND" />

        <p>2023. &copy; G.Penava</p>
      </div>

      <select name="privole" id="privole">
        <option value="Osnovno">Osnovno</option>
        <option value="bez prikupljanja">Bez prikupljanja</option>
        <option value="Sve">Sve</option>
      </select>
    </footer>
</div>
</section>
</main>
</div>
</body>

</html><?php }
}
