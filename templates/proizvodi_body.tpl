<div class="wrapper">
  <main>
    <section>
      <div>
      <div style="min-height:40rem; min-width:98vw; margin-top:3rem;">

          <div class="card-grid">
          {assign var="brojac" value=0}
          {if isset($proizvodi)}
         {foreach $proizvodi as $proizvod}
         {assign var="brojac" value=$brojac+1}
            <div class="card">
                <div class="card-content">
                <h3 class="card-title">{$proizvod['naziv']}</h3>
                <p class="card-description">Opis: {$proizvod['opis']}</p>
                <p class="card-description">Ukupno proizvoda: {$proizvod['kolicina']} proizvoda.</p>
                <p class="card-description">Cijena u bodovima: {$proizvod['cijena_u_bodovima']}</p>
                <p class="card-description">Cijena: {$proizvod['cijena']} kn.</p>
                <p class="card-description">Kupnjom ovog proizvoda dobijete {$proizvod['bodovi_za_kupovinu']} bodova</p>
                {if isset($smarty.session.uloga) && $smarty.session.uloga < 4 && isset($imaprofil) && {$proizvod['kolicina']} > 0}
                <form id="kupinovcem" method="POST" name="kupinovcem" action="" novalidate>
                <input type="hidden" name="id_proizvod" value="{$proizvod['ID_proizvod']}">
                <input type="hidden" name="id_kampanje_iz_smarty" value="{$idkampanje}">
                <div style="display:flex;gap:0.5rem; margin-bottom:1rem;">
                <input type="text" id="unesenavrijednost" name="unesenavrijednost" /><br />
                <input class="card-button" style="cursor:pointer;" type="submit" value="Kupi" name="kupinovcem"/>
                </div>
                </form>
                <form id="kupibodovima" method="POST" name="kupibodovima" action="" novalidate>
                <input type="hidden" name="id_proizvod" value="{$proizvod['ID_proizvod']}">
                <input type="hidden" name="id_kampanje_iz_smarty" value="{$idkampanje}">
                <div style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                <input class="card-button" style="cursor:pointer;" type="submit" value="Kupi bodovima" name="kupibodovima"/>
                {if $IdModeratora == $IDTrenutnogKorisnika || $UlogaTrenutnogKorisnika == 1}
                <a href="{$putanja}/obrasci/urediProizvod.php?proizvod={$proizvod['ID_proizvod']}" class="card-button">Uredi bodove</a>
                {/if}
                </div>
                </form>
                {/if}
                </div>
            </div>
        {/foreach}
        {/if}
          </div>
        {if $brojac==0}
        <p style="font-size:large; font-weight:bolder;display:flex; flex-direction:column; align-items:center; justify-content:center;">Nema proizvoda.</p>
        {else}
        <p style="font-size:large; font-weight:bolder;display:flex; flex-direction:column; align-items:center; justify-content:center;">Ima ukupno {$brojac} različitih proizvoda.</p>
        {/if}
      </div>


<script type="text/javascript">


</script>