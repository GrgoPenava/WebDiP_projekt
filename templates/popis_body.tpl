<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
  {if $podaciTablice}
  {foreach from=$podaciTablice item=redak}
  {if $redak.ID_status == 0}
      <tr style="background-color:#ffdd80">
      {else}
      <tr>
      {/if}

      <td style="cursor:pointer;" onclick="otvoriPoruku({$redak.ID_poruke})">{$redak.ID_poruke}</td>
      <td>{$redak.posiljatelj}</td>
      <td>{$redak.primatelj}</td>
      <td>{$redak.naslov}</td>
      <td>{$redak.kategorija}</td>
      <td>{$redak.sadrzaj}</td>
      <td>{$redak.datum_i_vrijeme}</td>
      <td>{$redak.kontakt}</td>
      <td>{$redak.url}</td>
      {if $redak.ID_status == 0}
      <td>Nije pročitano</td>
      {else}
      <td>Pročitano</td>
      {/if}
      {if $redak.kategorija == "smece"}
      <td style="cursor:pointer;" onclick="obrisiRedak({$redak.ID_poruke})">Obriši</td>
      {/if}
    </tr>
  {/foreach}
{else}
  <tr>
    <td colspan="10" style="font-size:20px;color:red;font-weight:bold">Ne postoje podaci za prijavljenog korisnika!</td>
  </tr>
{/if}
              </tbody>
              <tfoot>
              {if $brojZapisa >0}
                <tr class="footertablice">
                  <td colspan="10">Ukupno zapisa: {$brojZapisa}</td>
                </tr>
                {/if}
              </tfoot>
            </table>
          </div>
        </section>

        <script>
           function obrisiRedak(idPoruke) {
    console.log("radi", idPoruke);
    $.ajax({
      url: '../privatnoo/brisanjeRedaTablice.php',
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
        </script>