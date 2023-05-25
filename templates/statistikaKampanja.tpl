<div class="datumform" style="padding-bottom:2rem;">
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Naziv:</label>
                <input type="text" id="username" name="naziv" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="nazivButton" style="align-items:center"/>
              </form>
              <form id="formDatum" method="POST" name="form3" novalidate>
              <div style="display:flex; align-items:center; gap:0.2rem;">
                <label for="username">Broj proizvoda:</label>
                <input type="text" id="username" name="brojproizvodakojisetrazi" ><br/>
              </div>
                <input id="datumButton" type="submit" value="Filtriraj" name="proizvodiButton" style="align-items:center"/>
              </form>
  </div>
{if $sveKampanje}
<div style="display:flex; align-items:center; justify-content:center; gap:2rem; padding-bottom:2rem;">
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuAZ()">Proizvodi (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuZA()">Proizvodi (Z-A)</button>
</div>
<div style="display:flex; flex-direction:column; gap: 0.3rem">
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuNazivAZ()">Naziv (A-Z)</button>
<button id="datumButton" style="align-items:center; cursor:pointer;" onclick="sortirajTablicuNazivZA()">Naziv (Z-A)</button>
</div>
</div>
<div style="display:flex; justify-content: center;">
<table id="mojaTablica2">
              <thead>
                <tr>
                <th>ID</th>
                  <th>Naziv</th>
                  <th>Opis</th>
                  <th>Broj kupljenih proizvoda</th>
                </tr>
              </thead>
              <tbody>
  {foreach from=$sveKampanje item=redak}
  {if $Ulogakorisnika == 1 || $redak.ID_korisnik == $Idkorisnika}
    <tr>
      <td>{$redak.ID_kampanja}</td>
      <td>{$redak.naziv}</td>
      <td>{$redak.opis}</td>
      <td>{$redak.broj_kupljenih_proizvoda}</td>
    </tr>
  {/if}
{/foreach}
              </tbody>
              <tfoot>
              {if $brojacZapisa >0}
                <tr class="footertablice">
                  <td colspan="10">Ukupno zapisa: {$brojacZapisa}</td>
                </tr>
                {/if}
              </tfoot>
            </table>
</div>
{else}
<p style="display:flex; justify-content: center; font-size:large; font-weight:bolder;">Nemate kampanje kojima ste moderator.</p>
{/if}
<div style="min-height:29rem; min-width:98vw;">
<canvas id="grafCanvas" width="400" height="300"></canvas>
</div>

<script type="text/javascript">
  function sortirajTablicuAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica2");
    promjena = true;
    while (promjena) {
      promjena = false;
      redovi = tabl.rows;
      for (i = 1; i < (redovi.length - 1); i++) {
        x = redovi[i].getElementsByTagName("TD")[3];
        y = redovi[i + 1].getElementsByTagName("TD")[3];
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
  tabl = document.getElementById("mojaTablica2");
  promjena = true;
  while (promjena) {
    promjena = false;
    redovi = tabl.rows;
    for (i = 1; i < (redovi.length - 1); i++) {
      x = redovi[i].getElementsByTagName("TD")[3];
      y = redovi[i + 1].getElementsByTagName("TD")[3];
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
        promjena = true;
        break;
      }
    }
  }
}

function sortirajTablicuNazivAZ() {
    var tabl, redovi, promjena, i, x, y;
    tabl = document.getElementById("mojaTablica2");
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

  function sortirajTablicuNazivZA() {
  var tabl, redovi, promjena, i, x, y;
  tabl = document.getElementById("mojaTablica2");
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

var kampanje = {$sveKampanjeEncode};
console.log(kampanje);
</script>