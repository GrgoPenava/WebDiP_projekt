{if $korisnici}
<div style="display:flex; justify-content: center; margin-top:10rem;">
<table>
              <thead>
                <tr>
                <th>ID moderatora</th>
                  <th>Username</th>
                  <th>Broj prodanih proizvoda</th>
                </tr>
              </thead>
              <tbody>
  {foreach from=$korisnici item=redak}
      <tr>
      <td>{$redak.ID_korisnik}</td>
      <td>{$redak.username}</td>
      <td>{$redak.broj_prodanih_proizvoda}</td>
    </tr>
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
{/if}
<div style="min-height:29rem; min-width:98vw;"></div>