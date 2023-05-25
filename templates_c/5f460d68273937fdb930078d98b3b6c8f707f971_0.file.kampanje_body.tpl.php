<?php
/* Smarty version 4.3.0, created on 2023-05-25 20:03:06
  from 'C:\xampp\htdocs\projekt\templates\kampanje_body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646fa2da0e82f6_81514903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f460d68273937fdb930078d98b3b6c8f707f971' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\kampanje_body.tpl',
      1 => 1685037784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646fa2da0e82f6_81514903 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="wrapper">
  <main>
    <section>
      <div>
      <div style="min-height:40rem; min-width:98vw;">
        <div class="datumform">
  <form id="formDatum" method="POST" name="form3" novalidate>
    <div style="display:flex; align-items:center; gap:0.2rem;">
      <label for="prvidatum">Početak:</label>
      <input type="date" id="prvidatum" name="prvidatum"><br/>
    </div>
    <div style="display:flex; align-items:center; gap:0.2rem;">
      <label for="drugidatum">Završetak:</label>
      <input type="date" id="drugidatum" name="drugidatum">
    </div>
    <input id="datumButton" type="submit" value="Filtriraj" name="datumButton" style="align-items:center"/>
  </form>
</div>
<div style="display: flex; justify-content: flex-end; margin-right:1rem;">
  <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] <= 2) {?>
    <div style="display:flex; gap:1rem;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/ostalo/statistikaKampanja.php" class="card-button" style="font-weight:bolder;">Statistika kampanja</a>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/kreirajKampanju.php" class="card-button" style="font-weight:bolder;">Kreiraj kampanju</a>
    </div>
  <?php }?>
</div>


      <h1>Više od 200 proizvoda</h1>
          <div class="card-grid">
          <?php $_smarty_tpl->_assignInScope('brojac', 0);?>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kampanje']->value, 'kampanja');
$_smarty_tpl->tpl_vars['kampanja']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kampanja']->value) {
$_smarty_tpl->tpl_vars['kampanja']->do_else = false;
?>
         <?php if ($_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'] > 200) {?>
         <?php $_smarty_tpl->_assignInScope('brojac', $_smarty_tpl->tpl_vars['brojac']->value+1);?>
            <div class="card">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['naziv'];?>
</h3>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['opis'];?>
</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'];?>
 proizvoda.</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_pocetka'];?>
 - <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_zavrsetka'];?>
</p>
                <p class="card-description">Moderator: <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['prezime'];?>
</p>
                <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/proizvodi.php?kampanja=<?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ID_kampanja'];?>
" class="card-button">Odaberi</a>
                <?php }?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['IDTrenutnogKorisnika']->value;
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['IDTrenutnogKorisnika']->value;
$_prefixVariable2 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['kampanja']->value["ID_korisnik"];
$_prefixVariable3 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['UlogaTrenutnogKorisnika']->value;
$_prefixVariable4 = ob_get_clean();
if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] <= 2 && (isset($_prefixVariable1)) && $_prefixVariable2 == $_prefixVariable3 || $_prefixVariable4 == 1) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/urediKampanju.php?kampanja=<?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ID_kampanja'];?>
" class="card-button">Uredi</a>
                <?php }?>
                </div>
            </div>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['brojac']->value == 0) {?>
        <p style="font-size:large; font-weight:bolder;">Nema takvih zapisa.</p>
        <?php }?>
          </div>

      <h1>100-200 proizvoda</h1>
          <div class="card-grid">
          <?php $_smarty_tpl->_assignInScope('brojac2', 0);?>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kampanje']->value, 'kampanja');
$_smarty_tpl->tpl_vars['kampanja']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kampanja']->value) {
$_smarty_tpl->tpl_vars['kampanja']->do_else = false;
?>
         <?php if ($_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'] > 100 && $_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'] <= 200) {?>
         <?php $_smarty_tpl->_assignInScope('brojac2', $_smarty_tpl->tpl_vars['brojac2']->value+1);?>
            <div class="card">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['naziv'];?>
</h3>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['opis'];?>
</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'];?>
 proizvoda.</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_pocetka'];?>
 - <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_zavrsetka'];?>
</p>
                <p class="card-description">Moderator: <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['prezime'];?>
</p>
                <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/proizvodi.php?kampanja=<?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ID_kampanja'];?>
" class="card-button">Odaberi</a>
                <?php }?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['IDTrenutnogKorisnika']->value;
$_prefixVariable5 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['IDTrenutnogKorisnika']->value;
$_prefixVariable6 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['kampanja']->value["ID_korisnik"];
$_prefixVariable7 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['UlogaTrenutnogKorisnika']->value;
$_prefixVariable8 = ob_get_clean();
if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] <= 2 && (isset($_prefixVariable5)) && $_prefixVariable6 == $_prefixVariable7 || $_prefixVariable8 == 1) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/urediKampanju.php?kampanja=<?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ID_kampanja'];?>
" class="card-button">Uredi</a>
                <?php }?>
                </div>
            </div>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['brojac2']->value == 0) {?>
        <p style="font-size:large; font-weight:bolder;">Nema takvih zapisa.</p>
        <?php }?>
          </div>

          <h1>50-100 proizvoda</h1>
          <div class="card-grid">
          <?php $_smarty_tpl->_assignInScope('brojac3', 0);?>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kampanje']->value, 'kampanja');
$_smarty_tpl->tpl_vars['kampanja']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kampanja']->value) {
$_smarty_tpl->tpl_vars['kampanja']->do_else = false;
?>
         <?php if ($_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'] > 50 && $_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'] <= 100) {?>
         <?php $_smarty_tpl->_assignInScope('brojac3', $_smarty_tpl->tpl_vars['brojac3']->value+1);?>
            <div class="card">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['naziv'];?>
</h3>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['opis'];?>
</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'];?>
 proizvoda.</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_pocetka'];?>
 - <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_zavrsetka'];?>
</p>
                <p class="card-description">Moderator: <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['prezime'];?>
</p>
                <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/proizvodi.php?kampanja=<?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ID_kampanja'];?>
" class="card-button">Odaberi</a>
                <?php }?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['IDTrenutnogKorisnika']->value;
$_prefixVariable9 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['IDTrenutnogKorisnika']->value;
$_prefixVariable10 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['kampanja']->value["ID_korisnik"];
$_prefixVariable11 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['UlogaTrenutnogKorisnika']->value;
$_prefixVariable12 = ob_get_clean();
if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] <= 2 && (isset($_prefixVariable9)) && $_prefixVariable10 == $_prefixVariable11 || $_prefixVariable12 == 1) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/urediKampanju.php?kampanja=<?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ID_kampanja'];?>
" class="card-button">Uredi</a>
                <?php }?>
                </div>
            </div>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['brojac3']->value == 0) {?>
        <p style="font-size:large; font-weight:bolder;">Nema takvih zapisa.</p>
        <?php }?>
          </div>

          <h1>Manje od 50 proizvoda</h1>
          <div class="card-grid">
          <?php $_smarty_tpl->_assignInScope('brojac4', 0);?>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kampanje']->value, 'kampanja');
$_smarty_tpl->tpl_vars['kampanja']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['kampanja']->value) {
$_smarty_tpl->tpl_vars['kampanja']->do_else = false;
?>
         <?php if ($_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'] <= 50) {?>
         <?php $_smarty_tpl->_assignInScope('brojac4', $_smarty_tpl->tpl_vars['brojac4']->value+1);?>
            <div class="card">
                <div class="card-content">
                <h3 class="card-title"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['naziv'];?>
</h3>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['opis'];?>
</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['broj_proizvoda'];?>
 proizvoda.</p>
                <p class="card-description"><?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_pocetka'];?>
 - <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['datum_i_vrijeme_zavrsetka'];?>
</p>
                <p class="card-description">Moderator: <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ime'];?>
 <?php echo $_smarty_tpl->tpl_vars['kampanja']->value['prezime'];?>
</p>
                <?php if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] < 4) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/proizvodi.php?kampanja=<?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ID_kampanja'];?>
" class="card-button">Odaberi</a>
                <?php }?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['IDTrenutnogKorisnika']->value;
$_prefixVariable13 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['IDTrenutnogKorisnika']->value;
$_prefixVariable14 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['kampanja']->value["ID_korisnik"];
$_prefixVariable15 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['UlogaTrenutnogKorisnika']->value;
$_prefixVariable16 = ob_get_clean();
if ((isset($_SESSION['uloga'])) && $_SESSION['uloga'] <= 2 && (isset($_prefixVariable13)) && $_prefixVariable14 == $_prefixVariable15 || $_prefixVariable16 == 1) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/urediKampanju.php?kampanja=<?php echo $_smarty_tpl->tpl_vars['kampanja']->value['ID_kampanja'];?>
" class="card-button">Uredi</a>
                <?php }?>
                </div>
            </div>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['brojac4']->value == 0) {?>
        <p style="font-size:large; font-weight:bolder;">Nema takvih zapisa.</p>
        <?php }?>
          </div>
      </div><?php }
}
