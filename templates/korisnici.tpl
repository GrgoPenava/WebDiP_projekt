{if $korisnici}
<table>
              <thead>
                <tr>
                <th>Email</th>
                  <th>Username</th>
                  <th>Ime</th>
                  <th>Prezime</th>
                  <th>Lozinka</th>
                </tr>
              </thead>
              <tbody>
  {foreach from=$korisnici item=redak}
      <tr>
      <td>{$redak.email}</td>
      <td>{$redak.username}</td>
      <td>{$redak.ime}</td>
      <td>{$redak.prezime}</td>
      <td>{$redak.lozinka}</td>
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
{/if}