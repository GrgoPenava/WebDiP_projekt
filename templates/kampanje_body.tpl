<div class="wrapper">
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
  {if isset($smarty.session.uloga)&& $smarty.session.uloga <= 2}
    <div style="display:flex; gap:1rem;">
                <a href="{$putanja}/ostalo/statistikaKampanja.php" class="card-button" style="font-weight:bolder;">Statistika kampanja</a>
                <a href="{$putanja}/obrasci/kreirajKampanju.php" class="card-button" style="font-weight:bolder;">Kreiraj kampanju</a>
    </div>
  {/if}
</div>


      <h1>Više od 200 proizvoda</h1>
          <div class="card-grid">
          {assign var="brojac" value=0}
         {foreach $kampanje as $kampanja}
         {if $kampanja['broj_proizvoda'] > 200}
         {assign var="brojac" value=$brojac+1}
            <div class="card">
                <div class="card-content">
                <h3 class="card-title">{$kampanja['naziv']}</h3>
                <p class="card-description">{$kampanja['opis']}</p>
                <p class="card-description">{$kampanja['broj_proizvoda']} proizvoda.</p>
                <p class="card-description">{$kampanja['datum_i_vrijeme_pocetka']} - {$kampanja['datum_i_vrijeme_zavrsetka']}</p>
                <p class="card-description">Moderator: {$kampanja['ime']} {$kampanja['prezime']}</p>
                {if isset($smarty.session.uloga)&& $smarty.session.uloga < 4}
                <a href="{$putanja}/proizvodi.php?kampanja={$kampanja['ID_kampanja']}" class="card-button">Odaberi</a>
                {/if}
                {if isset($smarty.session.uloga)&& $smarty.session.uloga <= 2 && isset({$IDTrenutnogKorisnika}) && {$IDTrenutnogKorisnika} == {$kampanja["ID_korisnik"]} || {$UlogaTrenutnogKorisnika} == 1}
                <a href="{$putanja}/obrasci/urediKampanju.php?kampanja={$kampanja['ID_kampanja']}" class="card-button">Uredi</a>
                {/if}
                </div>
            </div>
            {/if}
        {/foreach}
        {if $brojac==0}
        <p style="font-size:large; font-weight:bolder;">Nema takvih zapisa.</p>
        {/if}
          </div>

      <h1>100-200 proizvoda</h1>
          <div class="card-grid">
          {assign var="brojac2" value=0}
         {foreach $kampanje as $kampanja}
         {if $kampanja['broj_proizvoda'] > 100 && $kampanja['broj_proizvoda'] <= 200}
         {assign var="brojac2" value=$brojac2+1}
            <div class="card">
                <div class="card-content">
                <h3 class="card-title">{$kampanja['naziv']}</h3>
                <p class="card-description">{$kampanja['opis']}</p>
                <p class="card-description">{$kampanja['broj_proizvoda']} proizvoda.</p>
                <p class="card-description">{$kampanja['datum_i_vrijeme_pocetka']} - {$kampanja['datum_i_vrijeme_zavrsetka']}</p>
                <p class="card-description">Moderator: {$kampanja['ime']} {$kampanja['prezime']}</p>
                {if isset($smarty.session.uloga)&& $smarty.session.uloga < 4}
                <a href="{$putanja}/proizvodi.php?kampanja={$kampanja['ID_kampanja']}" class="card-button">Odaberi</a>
                {/if}
                {if isset($smarty.session.uloga)&& $smarty.session.uloga <= 2 && isset({$IDTrenutnogKorisnika}) && {$IDTrenutnogKorisnika} == {$kampanja["ID_korisnik"]} || {$UlogaTrenutnogKorisnika} == 1}
                <a href="{$putanja}/obrasci/urediKampanju.php?kampanja={$kampanja['ID_kampanja']}" class="card-button">Uredi</a>
                {/if}
                </div>
            </div>
            {/if}
        {/foreach}
        {if $brojac2==0}
        <p style="font-size:large; font-weight:bolder;">Nema takvih zapisa.</p>
        {/if}
          </div>

          <h1>50-100 proizvoda</h1>
          <div class="card-grid">
          {assign var="brojac3" value=0}
         {foreach $kampanje as $kampanja}
         {if $kampanja['broj_proizvoda'] > 50 && $kampanja['broj_proizvoda'] <= 100}
         {assign var="brojac3" value=$brojac3+1}
            <div class="card">
                <div class="card-content">
                <h3 class="card-title">{$kampanja['naziv']}</h3>
                <p class="card-description">{$kampanja['opis']}</p>
                <p class="card-description">{$kampanja['broj_proizvoda']} proizvoda.</p>
                <p class="card-description">{$kampanja['datum_i_vrijeme_pocetka']} - {$kampanja['datum_i_vrijeme_zavrsetka']}</p>
                <p class="card-description">Moderator: {$kampanja['ime']} {$kampanja['prezime']}</p>
                {if isset($smarty.session.uloga)&& $smarty.session.uloga < 4}
                <a href="{$putanja}/proizvodi.php?kampanja={$kampanja['ID_kampanja']}" class="card-button">Odaberi</a>
                {/if}
                {if isset($smarty.session.uloga)&& $smarty.session.uloga <= 2 && isset({$IDTrenutnogKorisnika}) && {$IDTrenutnogKorisnika} == {$kampanja["ID_korisnik"]} || {$UlogaTrenutnogKorisnika} == 1}
                <a href="{$putanja}/obrasci/urediKampanju.php?kampanja={$kampanja['ID_kampanja']}" class="card-button">Uredi</a>
                {/if}
                </div>
            </div>
            {/if}
        {/foreach}
        {if $brojac3==0}
        <p style="font-size:large; font-weight:bolder;">Nema takvih zapisa.</p>
        {/if}
          </div>

          <h1>Manje od 50 proizvoda</h1>
          <div class="card-grid">
          {assign var="brojac4" value=0}
         {foreach $kampanje as $kampanja}
         {if $kampanja['broj_proizvoda'] <= 50}
         {assign var="brojac4" value=$brojac4+1}
            <div class="card">
                <div class="card-content">
                <h3 class="card-title">{$kampanja['naziv']}</h3>
                <p class="card-description">{$kampanja['opis']}</p>
                <p class="card-description">{$kampanja['broj_proizvoda']} proizvoda.</p>
                <p class="card-description">{$kampanja['datum_i_vrijeme_pocetka']} - {$kampanja['datum_i_vrijeme_zavrsetka']}</p>
                <p class="card-description">Moderator: {$kampanja['ime']} {$kampanja['prezime']}</p>
                {if isset($smarty.session.uloga)&& $smarty.session.uloga < 4}
                <a href="{$putanja}/proizvodi.php?kampanja={$kampanja['ID_kampanja']}" class="card-button">Odaberi</a>
                {/if}
                {if isset($smarty.session.uloga)&& $smarty.session.uloga <= 2 && isset({$IDTrenutnogKorisnika}) && {$IDTrenutnogKorisnika} == {$kampanja["ID_korisnik"]} || {$UlogaTrenutnogKorisnika} == 1}
                <a href="{$putanja}/obrasci/urediKampanju.php?kampanja={$kampanja['ID_kampanja']}" class="card-button">Uredi</a>
                {/if}
                </div>
            </div>
            {/if}
        {/foreach}
        {if $brojac4==0}
        <p style="font-size:large; font-weight:bolder;">Nema takvih zapisa.</p>
        {/if}
          </div>
      </div>