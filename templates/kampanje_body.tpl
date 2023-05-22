<div class="wrapper">
  <main>
    <section>
      <div>
      <div style="min-height:40rem; min-width:98vw;">
      <p>Kampanje </p>
          <div class="card-grid">
         {foreach $kampanje as $kampanja}
            <div class="card">
                <div class="card-content">
                <h3 class="card-title">{$kampanja['naziv']}</h3>
                <p class="card-description">{$kampanja['opis']}</p>
                <p class="card-description">{$kampanja['broj_proizvoda']} proizvoda.</p>
                <p class="card-description">{$kampanja['datum_i_vrijeme_pocetka']} - {$kampanja['datum_i_vrijeme_zavrsetka']}</p>
                <p class="card-description">Moderator: {$kampanja['ime']} {$kampanja['prezime']}</p>
                <a href="#" class="card-button">Odaberi</a>
                </div>
            </div>
        {/foreach}
            </div>
      </div>