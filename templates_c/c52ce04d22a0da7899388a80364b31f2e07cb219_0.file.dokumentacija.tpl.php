<?php
/* Smarty version 4.3.0, created on 2023-05-30 23:06:10
  from 'C:\xampp\htdocs\projekt\templates\dokumentacija.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64766542c27f64_39624717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c52ce04d22a0da7899388a80364b31f2e07cb219' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt\\templates\\dokumentacija.tpl',
      1 => 1685480769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64766542c27f64_39624717 (Smarty_Internal_Template $_smarty_tpl) {
?><main>
      <div class="sekcije">
          <h1 class="naslov-o-autoru">Opis projektnog zadatka</h1>
          <p>Sustav služi za upravljanje marketinškom kampanjom proizvoda. Potrebno je kreirati web stranicu koja će omogućiti registraciju korisnika, kreiranje kampanje, proizvoda te kupovinu istih. </p>
          <br/><br/>
          <h1 class="naslov-o-autoru">Opis projektnog rješenja</h1>
          <p style="text-align: center;">Kreirana je web stranica koja ima sljedeće mogućnosti: Registracija, prijava, odjava, kreiranje kampanje, pregled kampanja, sortiranje i filtriranje kampanja, kreiranje proizvoda, kupovinu proizvoda, kreiranje profila, pregled korisničkog profila, pregled proizvoda koje je korisnik kupio, uređivanje korisnika, pregled raznih statistika proizvoda i kampanja… Kako bih kreirao web stranicu, koristio sam programske jezike PHP, HTML, CSS, JavaScript te SQL za kreiranje baze podataka. </p>
          <br/><br/>
          <h1 class="naslov-o-autoru">ERA model</h1>
          <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/gpenava_era_model.png" alt="ERA model" height=900 width=1750 />
          <br/><br/>
          <h1 class="naslov-o-autoru">Navigacijski dijagram</h1>
          <br/>
          <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/gpenava_navigacijski_dijagram.png" alt="Navigacijski dijagram" height=900 width=1750 />
          <h1 class="naslov-o-autoru">Popis korištenih tehnologija i alata</h1>
          <p style="text-align: center;"> Visual studio code – tekstualni editor koji nam omogućuje da 
razvijamo svoje programsko rješenje. </p>
<p style="text-align: center;">XAMPP – program koji nam omogućuje pokretanje Apache web servera i MySQL baze podataka. </p>
<p style="text-align: center;">FileZilla – Program koji nam omogućuje prijenos datoteka s jednog računala na poslužitelj (u našem 
slučaju na barku).</p>
<p style="text-align: center;">GitHub – Kako bih osigurao svoj programski kod od gubitka koristio sam GitHub na koji sam povremeno 
„pushao“ svoje rješenje. </p>
<p style="text-align: center;">Windows PowerShell – windows terminal koji sam koristio za pristup poslužitelju barka kako bih mijenjao 
vidljivost (pristup) – chmod.</p>
          <br/><br/>
          <h1 class="naslov-o-autoru">Popis i opis vanjskih modula/biblioteka</h1>
          <p style="text-align: center;">  Smarty – PHP template engine koji nam omogućuje ponovno 
korištenje predložaka (npr. Više sam puta koristio predložak navigacija.tpl). </p>
<p style="text-align: center;">Google recaptcha – Google rješenje koje nam omogućuje da provjerimo da stvarno čovjek pristupa našoj 
web stranici (odnosno, onemogućuje da automatizirane skripte kreiraju korisničke račune). </p>
          <br/><br/>
      </div>
    </main><?php }
}
