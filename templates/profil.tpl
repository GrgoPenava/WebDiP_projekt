<div class="wrapper">
  <main>
    <section>
      <div style="min-height:40rem; min-width:98vw;">
      <div style="display:flex; flex-direction:row; align-items:center; justify-content:center; margin-top:5rem;gap:3rem;">
      <div class="card" style="max-width:40rem;">
                <div class="card-content">
                <h3 class="card-title">{$korisnik['ime']} {$korisnik['prezime']}</h3>
                <p class="card-description">Email: {$korisnik['email']}</p>
                <p class="card-description">Username: {$korisnik['username']}</p>
                <p class="card-description">Spol: {$korisnik['spol']}</p>
                <p class="card-description">Datum i vrijeme registracije: {$korisnik['datum_registracije']}</p>
                <p class="card-description">Broj bodova za kupnju: {$korisnik['broj_bodova']}</p>
                </div>
      </div>
      {assign var="slikaConvert" value=$korisnik['slika']|base64_encode}
      <div><img src="data:image/jpeg;base64,{$slikaConvert}" height=250 width=250 /></div>
      </div>
      <div style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
        <h1>Kupljeni proizvodi</h1>
      </div>
          {assign var="brojac" value=0}
        {if isset($kupljeniproizvodi)}
        <div class="card-grid">
         {foreach $kupljeniproizvodi as $kupljeniproizvod}
         {assign var="brojac" value=$brojac+1}
            <div class="card">
                <div class="card-content">
                <h3 class="card-title">{$kupljeniproizvod['naziv']}</h3>
                <p class="card-description">{$kupljeniproizvod['opis']}</p>
                <p class="card-description">Datum kupnje: {$kupljeniproizvod['datum_kupnje']}</p>
                <p class="card-description">Cijena: {$kupljeniproizvod['cijena']} kn.</p>
                </div>
            </div>
        {/foreach}
          </div>
        {/if}
        {if $brojac==0}
        <p style="font-size:large; font-weight:bolder; display:flex; flex-direction:column; align-items:center; justify-content:center;">Nema kupljenih proizvoda.</p>
        {else}
        <p style="font-size:large; font-weight:bolder; display:flex; flex-direction:column; align-items:center; justify-content:center;">Ukupno kupljenih proizvoda: {$brojac}</p>
        {/if}
      </div>
</div>